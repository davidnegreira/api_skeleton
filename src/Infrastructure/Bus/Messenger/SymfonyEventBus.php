<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Messenger;

use App\Application\Bus\EventBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class SymfonyEventBus implements EventBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->messageBus = $eventBus;
    }

    public function notify($event): void
    {
        try {
            $this->messageBus->dispatch($event);
        } catch (HandlerFailedException $e) {
            throw $e->getPrevious();
        }
    }

    public function notifyAll(array $domainEvents): void
    {
        array_walk($domainEvents,fn ($event) => $this->notify($event));
    }
}

