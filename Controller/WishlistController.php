<?php

namespace App\Controller;

use App\Interface\PrincipalInterface;
use App\Repository\WishlistRepo;
use App\Service\RedirectService;
use App\Service\UrlService;
use Symfony\Component\HttpFoundation\Request;

class WishlistController
{
    public function __construct(
        protected Request $request,
        protected UrlService $urlService,
        protected RedirectService $redirectService,
        protected WishlistRepo $wishlistRepo,
    ) {
    }

    public function add(PrincipalInterface $principal): void
    {
        if (!$principal->isBuyer()) {
            $this->request->getSession()->getFlashBag()->add('error', 'buyer_error.flash');
            $this->redirectService->redirectToIndex();
        }

        $this->wishlistRepo->addToWishlist($principal->getId(), $this->urlService->getId());
        $this->redirectService->redirect('product', 'detail', ['id' => $this->urlService->getId()]);
    }

    public function delete(PrincipalInterface $principal): void
    {
        if (!$principal->isBuyer()) {
            $this->request->getSession()->getFlashBag()->add('error', 'buyer_error.flash');
            $this->redirectService->redirectToIndex();
        }

        if (!$this->wishlistRepo->findByUserProductId($this->urlService->getId(), $principal->getId())) {
            $this->request->getSession()->getFlashBag()->add('error', 'not_wishlist.flash');
            $this->redirectService->redirectToIndex();
        }

        $this->wishlistRepo->deleteOutWishlist($principal->getId(), $this->urlService->getId());
        $this->redirectService->redirect('product', 'detail', ['id' => $this->urlService->getId()]);
    }
}
