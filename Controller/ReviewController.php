<?php

namespace App\Controller;

use App\Interface\PrincipalInterface;
use App\Repository\ReviewRepo;
use App\Service\OrderingService;
use App\Service\RedirectService;
use App\Service\UrlService;
use Symfony\Component\HttpFoundation\Request;

class ReviewController
{
    public function __construct(
        protected Request $request,
        protected UrlService $urlService,
        protected RedirectService $redirectService,
        protected ReviewRepo $reviewRepo,
        protected OrderingService $orderingService,
    ) {
    }

    public function create(PrincipalInterface $principal): void
    {
        $submit = $this->request->get('submit');
        if ($this->orderingService->isOrdered()
            && empty($this->reviewRepo->userReviewsFromProduct($this->urlService->getId(), $principal->getId()))) {
            if (isset($submit)) {
                $stars = $this->request->get('stars');
                if ($stars > 5) {
                    $stars = 5;
                } elseif ($stars < 1) {
                    $stars = 1;
                }

                $this->reviewRepo->createReview(
                    $this->urlService->getId(),
                    $principal->getId(),
                    $stars,
                    $this->request->get('title'),
                    $this->request->get('comment')
                );
                $this->reviewRepo->updateReviewStars($this->urlService->getId());
            }
        }
        $this->redirectService->redirect('product', 'detail', ['id' => $this->urlService->getId()]);
    }
}
