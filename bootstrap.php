<?php

use App\EventListener\MailingEventListener;
use App\EventListener\ProductAmountEventListener;
use App\EventListener\ResponseStringEventSubscriber;
use App\Service\CookiesService;
use App\Service\MailService;
use App\Service\OrderingService;
use App\Service\PdfService;
use App\Service\UrlService;
use DebugBar\DataCollector\ConfigCollector;
use DebugBar\DataCollector\MemoryCollector;
use DebugBar\DataCollector\PDO\PDOCollector;
use DebugBar\DataCollector\PhpInfoCollector;
use DebugBar\DataCollector\RequestDataCollector;
use DebugBar\DebugBar;
use DI\ContainerBuilder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Translator;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require_once __DIR__.'/vendor/autoload.php';

$environment = 'local';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/Config/dependency.php');

$container = $containerBuilder->build();

$container->get('setRegistryRepo');

$container->get(Translator::class)->addLoader('php', new PhpFileLoader());
$container->get(Translator::class)->addResource('php', __DIR__.'/Message/messages.'.$container->get('locale').'.php', $container->get('locale'));

// DISPATCHER
$container->get(EventDispatcher::class)->addSubscriber(
    new ResponseStringEventSubscriber()
);
$container->get(EventDispatcher::class)->addSubscriber(
    new CookiesService($container->get(UrlService::class)),
);
$container->get(EventDispatcher::class)->addListener(
    'ordering.checkout',
    new MailingEventListener(
        $container->get(PdfService::class),
        $container->get(MailService::class),
    )
);
$container->get(EventDispatcher::class)->addListener(
    'ordering.checkout',
    new ProductAmountEventListener($container->get(OrderingService::class)
    ),
);
// DISPATCHER

// DEBUG
$container->get(DebugBar::class)->addCollector(new PDOCollector($container->get(PDO::class)));
$container->get(DebugBar::class)->addCollector(new ConfigCollector($container->get('dbConfig')));
$container->get(DebugBar::class)->addCollector(new MemoryCollector());
$container->get(DebugBar::class)->addCollector(new PhpInfoCollector());
$container->get(DebugBar::class)->addCollector(new RequestDataCollector());

if ('local' === $environment) {
    $container->get(EventDispatcher::class)->addListener(KernelEvents::EXCEPTION, function (ExceptionEvent $event): void {
        $whoops = new Run();
        $whoops->allowQuit(false);
        $whoops->writeToOutput(false);
        $whoops->pushHandler(new PrettyPageHandler());
        $html = $whoops->handleException($event->getThrowable());

        $event->setResponse(new Response($html, 500));
    });
} else {
    $container->get(EventDispatcher::class)->addListener(KernelEvents::EXCEPTION, function (ExceptionEvent $event): void {
        $event->setResponse(new Response('An error has been occurred!', 500));
    });
}
// DEBUG

return $container->get(HttpKernel::class);
