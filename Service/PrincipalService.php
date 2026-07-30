<?php

namespace App\Service;

use App\Model\AnonymousUser;
use Symfony\Component\HttpFoundation\Session\Session;

class PrincipalService
{
    public function __construct(
        private Session $session,
        private \App\Repository\UserRepo $userRepo,
    ) {
    }

    public function getPrincipal(): \App\Interface\PrincipalInterface
    {
        if (!$this->session->has('id')) {
            return new AnonymousUser();
        }

        return $this->userRepo->findById($this->session->get('id')) ?: new AnonymousUser();
    }
}
