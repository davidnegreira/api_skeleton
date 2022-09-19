<?php

declare(strict_types=1);

namespace App\Application\Bus\Command;

use Symfony\Component\Messenger\Envelope;

interface CommandBus
{
    public function handle(Command $command): Envelope;
}