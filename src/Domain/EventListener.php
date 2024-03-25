<?php

namespace Php\CleanArch\Domain;

abstract class EventListener
{
    public function process(Event $event): void
    {
        if ($this->willProcess($event)) {
            $this->reactsTo($event);
        }
    }

    abstract public function willProcess(Event $event): bool;

    abstract public function reactsTo(Event $event): void;
}