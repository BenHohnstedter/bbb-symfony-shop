<?php

namespace App\Controller;

use App\Interface\PrincipalInterface;
use App\Repository\OrderingItemRepo;
use App\Repository\OrderingRepo;
use App\Repository\ProductRepo;
use App\Service\OrderingService;
use App\Service\RedirectService;
use App\Service\UrlService;
use App\Template\View;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event;
use Twig\Environment;

class CheckoutController
{
    public function __construct(
        protected EventDispatcher  $dispatcher,
        protected Request          $request,
        protected UrlService       $urlService,
        protected RedirectService  $redirectService,
        protected ProductRepo      $productRepo,
        protected OrderingItemRepo $orderingItemRepo,
        protected OrderingRepo     $orderingRepo,
        protected OrderingService  $orderingService,
    )
    {
    }

    public function list(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$this->checkBuyerOrderingItems($principal)) {
            $this->redirectService->redirectToIndex();
        }

        $products = $this->orderingItemRepo->findAllFromUser($this->orderingService->lastUserOrderingId());

        return $twig->render('CheckOut/list.html.twig', [
            'title' => 'Your Basket',
            'products' => $products,
            'progress' => 0,
            'steps' => [true, false, false, false],
        ]);
    }

    public function checkAddress(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$this->checkBuyerOrderingItems($principal)) {
            $this->redirectService->redirectToIndex();
        }

        $order = $this->orderingItemRepo->findAllFromUser($this->orderingService->lastUserOrderingId());

        return $twig->render('CheckOut/check_address.html.twig', [
            'title' => 'Check Address',
            'order' => $order,
            'progress' => 33,
            'steps' => [false, true, false, false],
        ]);
    }

    public function confirmPurchase(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$this->checkBuyerOrderingItems($principal)) {
            $this->redirectService->redirectToIndex();
        }

        $orders = $this->orderingItemRepo->findAllFromUser($this->orderingService->lastUserOrderingId());

        return $twig->render('CheckOut/confirm_purchase.html.twig', [
            'title' => 'Confirm Purchase',
            'orders' => $orders,
            'progress' => 66,
            'steps' => [false, false, true, false],
        ]);
    }

    public function checkoutSuccess(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$this->checkBuyerOrderingItems($principal)) {
            $this->redirectService->redirectToIndex();
        }

        $this->dispatcher->dispatch(new Event(), 'ordering.checkout');

        return $twig->render('CheckOut/check_out_success.html.twig', [
            'title' => 'Purchase Success',
            'bill' => $this->orderingService->lastOrderedUserOrdering()->getPdf(),
            'progress' => 100,
            'steps' => [false, false, false, true],
        ]);
    }

    public function history(PrincipalInterface $principal, Environment $twig): Response|string
    {
        if (!$principal->isBuyer()) {
            $this->request->getSession()->getFlashBag()->add('error', 'buyer_error.flash');

            $this->redirectService->redirectToIndex();
        }

        $orders = $this->orderingRepo->getOrderedUserOrders($principal->getId());
        $i = 0;
        $userOrders = null;
        $orderProducts = null;
        foreach ($orders as $order) {
            $userOrders[$i] = $order;
            $orderProducts[$i] = $this->orderingItemRepo->findAllFromUser($order->getId());
            ++$i;
        }

        return $twig->render('CheckOut/history.html.twig', [
            'title' => 'Your Order History',
            'userOrders' => $userOrders,
            'orderProducts' => $orderProducts,
        ]);
    }

    public function add(PrincipalInterface $principal): void
    {
        if (!$principal->isBuyer()) {
            $this->request->getSession()->getFlashBag()->add('error', 'buyer_error.flash');

            $this->redirectService->redirectToIndex();
        }

        if ($this->request->get('amount') > 10
            or $this->request->get('amount') > $this->productRepo->findById($this->request->get('productid'))->getAmount()) {
            $this->request->getSession()->getFlashBag()->add('error', 'to_high_amount.flash');

            $this->redirectService->redirectToIndex();
        }

        $this->orderingItemRepo->addToOrderingItem(
            $this->orderingService->lastUserOrderingId(),
            $this->request->get('productid'),
            $this->request->get('amount'),
        );
        $this->redirectService->redirect('checkout', 'list');
    }

    public function delete(PrincipalInterface $principal): void
    {
        if (!$this->checkBuyerOrderingItems($principal)) {
            $this->redirectService->redirectToIndex();
        }

        if (!$this->productRepo->findById($this->urlService->getId())) {
            $this->request->getSession()->getFlashBag()->add('error', 'no_product.flash');

            $this->redirectService->redirectToIndex();
        }

        $this->orderingItemRepo->deleteOutOrderingItem(
            $this->orderingService->lastUserOrderingId(),
            $this->urlService->getId(),
        );

        $this->redirectService->redirect('checkout', 'list');
    }

    public function checkBuyerOrderingItems(PrincipalInterface $principal): bool
    {
        $error = 0;
        if (!$principal->isBuyer()) {
            $this->request->getSession()->getFlashBag()->add('error', 'buyer_error.flash');

            $error = 1;
        }

        if (0 == count(iterator_to_array($this->orderingItemRepo->findAllFromUser($this->orderingService->lastUserOrderingId()), false))) {
            $this->request->getSession()->getFlashBag()->add('error', 'empty_basket.flash');

            $error = 1;
        }

        if (1 === $error) {
            return false;
        }

        return true;
    }
}
