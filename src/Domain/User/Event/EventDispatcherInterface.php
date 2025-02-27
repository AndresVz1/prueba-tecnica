<?php

namespace Application\Event;

interface EventDispatcherInterface
{
    public function dispatch(object $event): void;
}
