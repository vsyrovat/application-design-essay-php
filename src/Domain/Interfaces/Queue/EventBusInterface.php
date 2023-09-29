<?php declare(strict_types=1);

namespace App\Domain\Interfaces\Queue;

interface EventBusInterface
{
    /*
     * Push the event to external Queue to processing in other microservices
     */
    public function sendEvent($event);
}
