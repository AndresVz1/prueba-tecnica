<?php

namespace Infrastructure\Event;

use Application\Event\EventDispatcherInterface;

class SimpleEventDispatcher implements EventDispatcherInterface
{
    public function dispatch(object $event): void
    {
        // Simulación: registrar el evento en un log
        file_put_contents('logs/events.log', get_class($event) . " dispatched\n", FILE_APPEND);
    }
}
