<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Messenger\Query;

use App\Application\Bus\Query\Query;
use App\Application\Bus\Query\QueryBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class SymfonyQueryBus implements QueryBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    public function query(Query $query): mixed
    {
        try {
            return $this->handle($query);
        } catch (HandlerFailedException $e) {
            throw $e->getPrevious();
        }
    }
}