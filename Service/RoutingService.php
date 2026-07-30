<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

class RoutingService implements ControllerResolverInterface
{
    public function __construct(
        public Request $request,
        public RedirectService $redirectService,
        public UrlService $urlService,
        private readonly array $routes = [],
        private readonly array $controllers = [],
    ) {
    }

    public function getController(Request $request): callable|false
    {
        if (!array_key_exists($controller = $this->urlService->getController(), $this->routes)) {
            $this->request->getSession()->getFlashBag()->add('error', 'controller_fail.flash');

            $this->redirectService->redirectToIndex();
        }

        if (!in_array($this->urlService->getAction(), $this->routes[$controller])) {
            $this->request->getSession()->getFlashBag()->add('error', 'action_fail.flash');

            $this->redirectService->redirectToIndex();
        }

        $className = 'App\Controller\\'.ucfirst($this->urlService->getController()).'Controller';
        $actionName = $this->urlService->getAction();

        $instance = $this->controllers[$className];

        return [$instance, $actionName];
    }
}
