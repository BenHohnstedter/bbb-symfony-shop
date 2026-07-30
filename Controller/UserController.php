<?php

namespace App\Controller;

use App\Interface\PrincipalInterface;
use App\Model\Image;
use App\Repository\UserRepo;
use App\Repository\WishlistRepo;
use App\Service\ImageCropSquareService;
use App\Service\ImageService;
use App\Service\LatLonService;
use App\Service\RedirectService;
use App\Service\UrlService;
use App\Template\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\Translator;
use Twig\Environment;

class UserController
{
    public function __construct(
        protected Request $request,
        protected UrlService $urlService,
        protected RedirectService $redirectService,
        protected Session $session,
        protected UserRepo $userRepo,
        protected WishlistRepo $wishlistRepo,
        protected Image $image,
        protected ImageService $imageService,
        protected LatLonService $latLonService,
        protected Translator $translator,
    ) {
    }

    // VIEW ACTIONS
    public function login(Environment $twig): Response|string
    {
        return $twig->render('User/login.html.twig', [
            'title' => 'Login',
        ]);
    }

    public function logout(PrincipalInterface $principal): void
    {
        $this->session->clear();

        $principalUsername = $this->translator->trans('logout_success', ['{{ username }}' => $principal->getUsername()]);
        $this->request->getSession()->getFlashBag()->add('success', $principalUsername);

        $this->redirectService->redirectToIndex();
    }

    public function register(Environment $twig): Response|string
    {
        return $twig->render('User/register.html.twig', [
            'title' => 'Register',
        ]);
    }

    public function detail(PrincipalInterface $principal, Environment $twig): Response|string
    {
        $selectedUser = $this->userRepo->findById($this->urlService->getId());

        if (!$selectedUser) {
            $this->request->getSession()->getFlashBag()->add('error', 'no_user.flash');

            $this->redirectService->redirectToIndex();
        }

        if (0 === $selectedUser->getUserType() && is_a($principal, 'AnonymousUser')
            || 0 === $selectedUser->getUserType() && $principal->getId() != $selectedUser->getId()) {
            $this->request->getSession()->getFlashBag()->add('error', 'no_public_user.flash');

            $this->redirectService->redirectToIndex();
        }

        $wishlist = $this->wishlistRepo->findByParam('user', $selectedUser->getId());

        return $twig->render('User/detail.html.twig', [
            'title' => 'User Detail',
            'user' => $selectedUser,
            'wishlist' => $wishlist,
        ]);
    }

    public function edit(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (is_a($principal, 'AnonymousUser')) {
            $this->request->getSession()->getFlashBag()->add('error', 'not_logged_in.flash');

            $this->redirectService->redirectToIndex();
        }

        return $twig->render('User/edit.html.twig', [
            'title' => 'Edit User',
        ]);
    }
    // VIEW ACTIONS

    public function create(): void
    {
        $submit = $this->request->get('submit');
        if (isset($submit)) {
            if ($this->request->get('password') !== $this->request->get('password-confirm')) {
                $this->request->getSession()->getFlashBag()->add('error', 'passwords_not_even.flash');

                $this->redirectService->redirect('user', 'signin');
            }

            if ('' === $this->request->get('username')
                || $this->userRepo->findByUsername($this->request->get('username'))) {
                $this->request->getSession()->getFlashBag()->add('error', 'username_forgiven.flash');

                $this->redirectService->redirect('user', 'signin');
            }

            $userType = $this->request->get('userType');
            if (1 != $userType) {
                $userType = 0;
            }

            $lanLon = $this->latLonService->getLanLonFromAddress(
                $this->request->get('street'),
                $this->request->get('houseNumber'),
                $this->request->get('city'),
                $this->request->get('postalCode'),
            );

            if (!$lanLon) {
                $this->request->getSession()->getFlashBag()->add('error', 'address_not_found.flash');

                $this->redirectService->redirect('user', 'signin');
            }

            $this->userRepo->createUser(
                $userType,
                $this->request->get('username'),
                $this->request->get('firstname'),
                $this->request->get('lastname'),
                $this->request->get('birthday'),
                $this->request->get('email'),
                $this->request->get('street'),
                $this->request->get('houseNumber'),
                $this->request->get('city'),
                $this->request->get('postalCode'),
                $lanLon,
                password_hash($this->request->get('password'), PASSWORD_BCRYPT),
            );
        }

        $this->request->getSession()->getFlashBag()->add('success', 'registry_success.flash');

        $this->redirectService->redirect('user', 'login');
    }

    public function update(PrincipalInterface $principal): void
    {
        if (is_a($principal, 'AnonymousUser')) {
            $this->request->getSession()->getFlashBag()->add('error', 'not_logged_in.flash');

            $this->redirectService->redirectToIndex();
        }

        $submit = $this->request->get('submit');
        if (isset($submit)) {
            $lanLon = $this->latLonService->getLanLonFromAddress(
                $this->request->get('street'),
                $this->request->get('houseNumber'),
                $this->request->get('city'),
                $this->request->get('postalCode'),
            );

            if (!$lanLon) {
                $this->request->getSession()->getFlashBag()->add('warning', 'address_not_found.flash');

                $this->redirectService->redirect('user', 'edit');
            }

            $imageName = $principal->getProfileImg();
            if ('' !== $this->image->getTmpName()) {
                if (!$this->imageService->validateImage()) {
                    $this->redirectService->redirect('user', 'edit');
                }

                $filePath = 'UserImg';
                $this->imageService->deleteImage($filePath, $imageName);

                $imageName = $this->imageService->uploadImage($filePath);
                $imageCrop = new ImageCropSquareService();
                $imageCrop->cropImage($filePath, $imageName);
            }

            $this->userRepo->editUser(
                $principal->getId(),
                $imageName,
                $this->request->get('street'),
                $this->request->get('houseNumber'),
                $this->request->get('city'),
                $this->request->get('postalCode'),
                $lanLon,
                $this->request->get('caption'),
            );
        }
        $this->request->getSession()->getFlashBag()->add('success', 'user_update_success.flash');

        $this->redirectService->redirect('user', 'detail', ['uid' => $principal->getId()]);
    }

    public function checkLogin(): void
    {
        if (null !== $this->request->get('submit')) {
            $userExists = $this->userRepo->findByUsername($this->request->get('username'));

            if (!$userExists) {
                $this->request->getSession()->getFlashBag()->add('error', 'login_fail.flash');

                $this->redirectService->redirect('user', 'login');
                return;
            }

            if (!password_verify($this->request->get('password'), $userExists->getPassword())) {
                $this->request->getSession()->getFlashBag()->add('error', 'login_fail.flash');

                $this->redirectService->redirect('user', 'login');
                return;
            }

            $this->session->set('id', $userExists->getId());
            $this->request->getSession()->getFlashBag()->add('success', 'login_success.flash');
        }
        $this->redirectService->redirectToIndex();
    }
}
