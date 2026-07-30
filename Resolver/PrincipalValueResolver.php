<?php

namespace App\Resolver;

use App\Interface\PrincipalInterface;
use App\Service\PrincipalService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class PrincipalValueResolver implements ValueResolverInterface
{
    public function __construct(
        protected PrincipalService $principalService,
    ) {
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $argumentType = $argument->getType();

        if (PrincipalInterface::class === $argumentType || is_subclass_of($argumentType, PrincipalInterface::class)) {
            return [
                $this->principalService->getPrincipal(),
            ];
        }

        return [];
    }
}
