<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class RedirectService
{
    public function __construct(
        protected Request $request,
    ) {
    }

    public function redirectToIndex(): void
    {
        $this->redirect('product', 'home');
    }

    public function redirect(string $controller, string $action, array $params = []): void
    {
        $header = '/'.$controller.'/'.$action;

        foreach ($params as $param) {
            if (!empty($param)) {
                $header .= '/'.$param;
            }
        }

        $locale = '/'.($this->request->attributes->get('_locale') ?? 'en_US');
        $base = rtrim((string) dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
        $response = new RedirectResponse($base.'/index.php'.$locale.$header);
        $response->send();
    }
}
