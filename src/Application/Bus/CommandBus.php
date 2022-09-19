<?php

declare(strict_types=1);

namespace App\Application\Bus;

use Symfony\Component\Messenger\Envelope;

interface CommandBus
{
    public function handle($command): Envelope;
}