<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Hello;

use App\Application\Bus\Query\QueryBus;
use App\Application\Hello\HelloQuery;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HelloController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    #[Route("/hello", methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        $data = $this->queryBus->query(new HelloQuery());
        return new Response($data);
    }
}