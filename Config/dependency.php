<?php

namespace App\Config;

use App\Controller\CheckoutController;
use App\Controller\ProductController;
use App\Controller\ReviewController;
use App\Controller\UserController;
use App\Controller\WishlistController;
use App\Form\Type\ProductFormType;
use App\Model\Category;
use App\Model\Ordering;
use App\Model\Orderingitem;
use App\Model\Product;
use App\Model\Review;
use App\Model\User;
use App\Model\Wishlist;
use App\Repository\CategoryRepo;
use App\Repository\OrderingItemRepo;
use App\Repository\OrderingRepo;
use App\Repository\ProductRepo;
use App\Repository\Registry;
use App\Repository\ReviewRepo;
use App\Repository\UserRepo;
use App\Repository\WishlistRepo;
use App\Resolver\PrincipalValueResolver;
use App\Resolver\TwigEnvironmentResolver;
use App\Service\FilterService;
use App\Service\PrincipalService;
use App\Service\RedirectService;
use App\Service\RoutingService;
use App\Service\UrlService;
use DebugBar\DebugBar;
use PDO;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Form\Extension\Core\CoreExtension;
use Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormFactoryBuilder;
use Symfony\Component\Form\FormFactoryBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\FormRendererEngineInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\RuntimeLoader\ContainerRuntimeLoader;

return [
    'dbConfig' => include 'Config/local.php',

    'locale' => function ($container) {
        return $container->get(UrlService::class)->getLocale();
    },

    Translator::class => function ($container) {
        return new Translator($container->get('locale'));
    },

    Session::class => function () {
        return new Session(
            new NativeSessionStorage()
        );
    },

    Request::class => function ($container) {
        $request = Request::createFromGlobals();
        $request->setSession($container->get(Session::class));

        return $request;
    },

    PDO::class => function ($container) {
        $dbConfig = $container->get('dbConfig');

        return new PDO(
            sprintf(
                'mysql:host=%s;dbname=%s',
                $dbConfig['database']['host'],
                $dbConfig['database']['dbname']
            ),
            $dbConfig['database']['user'],
            $dbConfig['database']['password']
        );
    },

    'setRegistryRepo' => function ($container) {
        $registryRepo = new Registry([
            Category::class => $container->get(CategoryRepo::class),
            Product::class => $container->get(ProductRepo::class),
            Review::class => $container->get(ReviewRepo::class),
            Ordering::class => $container->get(OrderingRepo::class),
            Wishlist::class => $container->get(WishlistRepo::class),
            Orderingitem::class => $container->get(OrderingItemRepo::class),
            User::class => $container->get(UserRepo::class),
        ]);
        Registry::setInstance($registryRepo);
    },

    FilterService::class => function ($container) {
        return new FilterService(
            $container->get(Request::class)->get('filter', [])
        );
    },

    RoutingService::class => function ($container) {
        $routes = include 'routes.php';

        return new RoutingService(
            $container->get(Request::class),
            $container->get(RedirectService::class),
            $container->get(UrlService::class),
            $routes,
            [
                ProductController::class => $container->get(ProductController::class),
                WishlistController::class => $container->get(WishlistController::class),
                UserController::class => $container->get(UserController::class),
                CheckoutController::class => $container->get(CheckoutController::class),
                ReviewController::class => $container->get(ReviewController::class),
            ]);
    },

    'getGlobalTwigVariables' => function ($container) {
        return [
            'debugBar' => $container->get(DebugBar::class)->getJavascriptRenderer(),
            'principal' => $container->get(PrincipalService::class)->getPrincipal(),
            'translator' => $container->get(Translator::class),
            'flashes' => $container->get(Session::class)->getFlashBag()->all(),
            'locale' => $container->get('locale'),
            'searched' => $container->get(Request::class)->get('filter', []),
            'categories' => $container->get(CategoryRepo::class)->findAll(),
        ];
    },

    ArgumentResolver::class => function ($container) {
        return new ArgumentResolver(
            null,
            array_merge(ArgumentResolver::getDefaultArgumentValueResolvers(), [
                new TwigEnvironmentResolver($container->get(Environment::class)),
                new PrincipalValueResolver($container->get(PrincipalService::class)),
            ]),
        );
    },

    Environment::class => function ($container) {
        $loader = new FilesystemLoader(
            [
                __DIR__.'/../Template',
                __DIR__.'/../vendor/symfony/twig-bridge/Resources/views/Form',
            ]
        );

        $environment = new Environment($loader,
            [
                'debug' => true,
            ]);

        foreach ($container->get('getGlobalTwigVariables') as $name => $value) {
            $environment->addGlobal($name, $value);
        }

        $environment->addExtension($container->get(FormExtension::class));
        $environment->addExtension(new DebugExtension());
        $environment->addExtension(new TranslationExtension($container->get(Translator::class)));
        $environment->addRuntimeLoader(new ContainerRuntimeLoader($container));

        return $environment;
    },

    ValidatorInterface::class => function ($container) {
        return Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    },

    FormExtension::class => function ($container) {
        return new FormExtension($container->get(Translator::class));
    },

    FormRendererEngineInterface::class => function ($container) {
        return new TwigRendererEngine(['bootstrap_5_horizontal_layout.html.twig', 'form.html.twig'], $container->get(Environment::class));
    },

    FormRenderer::class => function ($container) {
        return new FormRenderer($container->get(FormRendererEngineInterface::class));
    },

    FormFactoryBuilderInterface::class => function ($container) {
        return (new FormFactoryBuilder())
            ->addExtension(new CoreExtension())
            ->addExtension(new HttpFoundationExtension())
            ->addExtension(new DependencyInjectionExtension($container, [], []))
            ->addExtension(new ValidatorExtension($container->get(ValidatorInterface::class))
            );
    },

    FormFactoryInterface::class => function ($container) {
        return $container->get(FormFactoryBuilderInterface::class)->getFormFactory();
    },

    ProductFormType::class => function ($container) {
        return new ProductFormType($container->get(CategoryRepo::class));
    },

    HttpKernel::class => function ($container) {
        return new HttpKernel(
            $container->get(EventDispatcher::class),
            $container->get(RoutingService::class),
            $container->get(RequestStack::class),
            $container->get(ArgumentResolver::class),
        );
    },
];
