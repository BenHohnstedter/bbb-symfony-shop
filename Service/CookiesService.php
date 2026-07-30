<?php

namespace App\Service;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class CookiesService implements EventSubscriberInterface
{
    public function __construct(
        protected UrlService $urlService,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'kernel.request' => ['onKernelRequest', 4048],
            'kernel.response' => 'onKernelResponse',
        ];
    }

    public function onKernelRequest(RequestEvent $requestEvent): void
    {
        $request = $requestEvent->getRequest();
        $cookieLocale = $request->cookies->get('locale');
        $urlLocale = $this->urlService->getLocale();
        $allowed = ['de_DE', 'en_US', 'fi_FI'];

        if (in_array($urlLocale, $allowed)) {
            $newLocale = $urlLocale;
        } elseif (in_array($cookieLocale, $allowed)) {
            $newLocale = $cookieLocale;
        } else {
            $newLocale = 'en_US';
        }
        $request->attributes->set('_locale', $newLocale);
    }

    public function onKernelResponse(ResponseEvent $responseEvent): void
    {
        $response = $responseEvent->getResponse();
        $response->headers->setCookie(
            new Cookie(
                'locale',
                $responseEvent->getRequest()->attributes->get('_locale'),
                time() + 36000
            )
        );
    }
}
