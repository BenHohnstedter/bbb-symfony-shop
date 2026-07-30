<?php

namespace App\Resolver;

use App\Interface\EnvironmentInterface;
use App\Service\TwigService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Twig\Environment;

class TwigEnvironmentResolver implements ValueResolverInterface
{
    public function __construct(
        protected Environment $twig,
    ) {
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $argumentType = $argument->getType();

        if (Environment::class === $argumentType || is_subclass_of($argumentType, Environment::class)) {
            return [
                $this->twig,
            ];
        }

        return [];
    }
}
