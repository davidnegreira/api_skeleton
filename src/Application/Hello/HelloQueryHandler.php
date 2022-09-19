<?php

declare(strict_types=1);

namespace App\Application\Hello;

final class HelloQueryHandler
{
    public function __invoke(HelloQuery $query): string
    {
        return "hello query handler!!!";
    }
}