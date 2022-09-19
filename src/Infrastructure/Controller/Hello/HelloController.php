<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Hello;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HelloController
{
    #[Route("/hello", methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return new Response('hello');
    }
}