<?php

namespace PureLib\Event;

class Listener {
    protected $event = null;
    protected $callback = null;
    protected $priority = 1;
    public function __CONSTRUCT($event, $callback, $priority) {
        $this->event = $event;
        $this->callback = $callback;
        $this->priority = $priority;
    }
    public function setEvent($event) {
        $this->event = $event;
    }
    public function getEvent() {
        return $this->event;
    }
    public function setCallBack($callback) {
        $this->callback = $callback;
    }
    public function getCallBack() {
        return $this->callback;
    }
    public function setPriority($priority) {
        $this->priority = $priority;
    }
    public function getPriority() {
        return $this->priority;
    }
}