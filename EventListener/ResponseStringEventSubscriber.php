<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseStringEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => 'onView',
        ];
    }

    public function onView(ViewEvent $event)
    {
        $result = $event->getControllerResult();

        if (!is_string($result)) {
            return;
        }

        $event->setResponse(new Response($result));
    }
}
