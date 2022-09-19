<?php

declare(strict_types=1);

namespace App\Application\Bus\Event;

use App\Domain\DomainEvent;

interface EventBus
{
    public function notify(DomainEvent $event): void;

    /** @param DomainEvent[] $events */
    public function notifyAll(array $events): void;
}

