<?php

namespace Lyrica0954\AdvancedEvents\event;

class EventRunner{

    private $runClass;
    private $cancelEvent;
    private $isCancellable;

    public function __construct($runClass, Bool $isCancellable, $cancelEvent = null){
        $this->runClass = $runClass;
        $this->isCancellable = $isCancellable;
        $this->cancelEvent = $cancelEvent;
    }

    public function runEvent(...$args){
        $event = new $this->runClass(...$args);
        if ($this->isCancellable){
            if ($event->isCancelled()){
                $this->cancelEvent->setCancelled(true);
                return true;
            } else {
                return false;
            }
        }
    }
}