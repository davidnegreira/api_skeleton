<?php

declare(strict_types=1);

namespace App\Application\Bus;

interface EventBus
{
    public function notify($event): void;

    public function notifyAll(array $domainEvents): void;
}

