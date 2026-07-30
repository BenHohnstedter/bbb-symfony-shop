<?php

namespace App\Controller;

use App\Form\Type\ProductFormType;
use App\Interface\PrincipalInterface;
use App\Model\Image;
use App\Model\Product;
use App\Repository\CategoryRepo;
use App\Repository\CountingRepo;
use App\Repository\ProductRepo;
use App\Repository\ReviewRepo;
use App\Repository\WishlistRepo;
use App\Service\FilterService;
use App\Service\ImageService;
use App\Service\OrderingService;
use App\Service\RedirectService;
use App\Service\UrlService;
use App\Service\ValidateService;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ProductController
{
    public function __construct(
        protected Request $request,
        protected UrlService $urlService,
        protected RedirectService $redirectService,
        protected ProductRepo $productRepo,
        protected CategoryRepo $categoryRepo,
        protected ReviewRepo $reviewRepo,
        protected CountingRepo $countingRepo,
        protected WishlistRepo $wishlistRepo,
        protected Image $image,
        protected ImageService $imageService,
        protected FilterService $filterService,
        protected OrderingService $orderingService,
        protected ValidateService $validateService,
        protected FormFactoryInterface $formFactoryBuilder,
    ) {
    }

    // VIEW ACTIONS
    public function detail(PrincipalInterface $principal, Environment $twig): Response|string
    {
        $product = $this->productRepo->findById($this->urlService->getId());

        if (!$product) {
            $this->request->getSession()->getFlashBag()->add('error', 'no_product.flash');
            $this->redirectService->redirectToIndex();
        }

        if (!$principal->isBuyer()) {
            $userReviewToProduct = null;
            $isOnWishlist = null;
        } else {
            $userReviewToProduct = $this->reviewRepo->userReviewsFromProduct(
                $this->urlService->getId(),
                $principal->getId()
            );
            $isOnWishlist = $this->wishlistRepo->findByUserProductId(
                $this->urlService->getId(),
                $principal->getId()
            );
        }

        return $twig->render('Product/detail.html.twig', [
            'title' => 'Produkt Detail-Seite',
            'product' => $product,
            'userReviewToProduct' => $userReviewToProduct,
            'isOnWishlist' => $isOnWishlist,
            'isOrdered' => $this->orderingService->isOrdered(),
        ]);
    }

    public function home(Environment $twig): Response|string
    {
        $topProducts = $this->productRepo->findByTopStars(8);

        return $twig->render('home.html.twig', [
            'title' => 'BBB Start-Seite',
            'products' => $topProducts,
        ]);
    }

    public function list(Environment $twig): Response|string
    {
        if (!empty($this->request->get('filter', []))) {
            $products = $this->productRepo->findByFilter(
                $this->filterService->getAllQueries(),
                $this->filterService->gettingOrderByQuery()
            );
        } else {
            $products = $this->productRepo->findAll();
        }

        return $twig->render('Product/list.html.twig', [
            'title' => 'Product List',
            'products' => $products,
            'amounts' => $this->counting(),
            'filterArray' => $this->request->get('filter', []),
        ]);
    }

    public function new(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$principal->isSeller()) {
            $this->request->getSession()->getFlashBag()->add('error', 'seller_error.flash');

            $this->redirectService->redirectToIndex();
        }

        $product = new Product(0, $principal->getId(), 0, 0, 0, 0, 0, null, '', '', '', '');
        $categories = $this->categoryRepo->findAll();
        $form = $this->formFactoryBuilder->create(ProductFormType::class, $product, [
            'action' => sprintf('/index.php/%s/product/create', $this->urlService->getLocale()),
            'method' => 'POST',
        ]);

        return $twig->render('Product/new.html.twig', [
            'title' => 'Create Product',
            'createCategories' => $categories,
            'form' => $form->createView(),
        ]);
    }

    public function edit(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$this->isProductOwner($principal)) {
            $this->redirectService->redirectToIndex();
        }

        $product = $this->productRepo->findById($this->urlService->getId());
        $categories = $this->categoryRepo->findAll();
        $form = $this->formFactoryBuilder->create(ProductFormType::class, $product, [
            'action' => sprintf('/index.php/%s/product/update/%s', $this->urlService->getLocale(), $product->getId()),
            'method' => 'POST',
        ]);

        return $twig->render('Product/edit.html.twig', [
            'title' => 'Edit Product',
            'product' => $product,
            'createCategories' => $categories,
            'form' => $form->createView(),
        ]);
    }
    // VIEW ACTIONS

    public function create(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$principal->isSeller()) {
            $this->request->getSession()->getFlashBag()->add('error', 'seller_error.flash');

            $this->redirectService->redirectToIndex();

            return '';
        }

        $product = new Product(0, $principal->getId(), 0, 0, 0, 0, 0, null, '', '', '', '');
        $categories = $this->categoryRepo->findAll();
        $form = $this->formFactoryBuilder->create(ProductFormType::class, $product, [
            'action' => sprintf('/index.php/%s/product/create', $this->request->getLocale()),
            'method' => 'POST',
        ]);

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (null === $form['imagePath']->getData()) {
                $imageName = 'default-image.png';
            } else {
                $imageName = 'bbb-shop-'.uniqid('', true).'.webp';
                $directory = 'Resource/Img/ProductImg/';
                $file = $form['imagePath']->getData();

                $file->move($directory, $imageName);
            }

            $this->productRepo->createProduct($form->getData(), $imageName, $principal->getId());
            $this->request->getSession()->getFlashBag()->add('success', 'product_created.flash');
            $this->redirectService->redirect('product', 'list');

            return '';
        }

        return $twig->render('Product/new.html.twig', [
            'title' => 'Edit Product',
            'editCategories' => $categories,
            'form' => $form->createView(),
        ]);
    }

    public function update(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$this->isProductOwner($principal)) {
            $this->redirectService->redirectToIndex();

            return '';
        }

        /** @var Product $product */
        $product = $this->productRepo->findById($this->urlService->getId());
        $imageName = $product->getImagePath();
        $categories = $this->categoryRepo->findAll();

        $form = $this->formFactoryBuilder->create(ProductFormType::class, $product, [
            'action' => sprintf('/index.php/%s/product/update/%s', $this->request->getLocale(), $product->getId()),
            'method' => 'POST',
        ]);

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (null !== $form['imagePath']->getData()) {
                $directory = 'Resource/Img/ProductImg/';
                $this->imageService->deleteSymfonyImage($directory, $imageName);

                $file = $form['imagePath']->getData();
                $imageName = 'bbb-shop-'.uniqid('', true).'.webp';
                $file->move($directory, $imageName);
            }

            $this->productRepo->editProduct($form->getData(), $imageName);
            $this->request->getSession()->getFlashBag()->add('success', 'product_edited.flash');
            $this->redirectService->redirect('product', 'detail', [$this->urlService->getId()]);

            return '';
        }

        return $twig->render('Product/edit.html.twig', [
            'title' => 'Edit Product',
            'product' => $product,
            'editCategories' => $categories,
            'form' => $form->createView(),
        ]);
    }

    public function delete(PrincipalInterface $principal): void
    {
        if (!$this->isProductOwner($principal)) {
            $this->redirectService->redirectToIndex();
        }

        $deleteId = $this->urlService->getId();
        $product = $this->productRepo->findById($deleteId);

        // delete image
        $this->imageService->deleteImage('ProductImg', $product->getImagePath());

        // delete in database
        $this->productRepo->deleteItem('id', $deleteId);

        // delete reviews
        $this->reviewRepo->deleteProductReviews($deleteId);

        // delete wishlist
        $this->wishlistRepo->deleteItem('product', $deleteId);

        $this->redirectService->redirectToIndex();
    }

    public function counting(): array
    {
        return [
            'category' => $this->countingRepo->countFilterAmount(
                'category',
                'name',
                $this->filterService->getAllQueries('category')
            ),
            'city' => $this->countingRepo->countFilterAmount(
                'user',
                'city',
                $this->filterService->getAllQueries('city')
            ),
            'user' => $this->countingRepo->countFilterAmount(
                'user',
                'username',
                $this->filterService->getAllQueries('user')
            ),
        ];
    }

    public function isProductOwner(PrincipalInterface $principal): bool
    {
        $error = 0;
        if (!$principal->isSeller()) {
            $this->request->getSession()->getFlashBag()->add('error', 'seller_error.flash');

            $error = 1;
        }

        $product = $this->productRepo->findById($this->urlService->getId());
        if ('' == $this->urlService->getId() || !$product) {
            $this->request->getSession()->getFlashBag()->add('error', 'no_product.flash');

            $error = 1;
        }

        if (!$product || $principal->getId() !== $product->getUserObject()->getId()) {
            $this->request->getSession()->getFlashBag()->add('error', 'no_product_owner.flash');

            $error = 1;
        }

        if (1 === $error) {
            return false;
        }

        return true;
    }
}
