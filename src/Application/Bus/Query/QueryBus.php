<?php

declare(strict_types=1);

namespace App\Application\Bus\Query;

interface QueryBus
{
    public function query(Query $query): mixed;
}