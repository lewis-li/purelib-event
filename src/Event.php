<?php

namespace PureLib\Event;

class Event {
    protected $name;
    protected $target;
    protected  $params;
    public function __construct($name = null, $target = null, $params = null) {
        $this->name = $name;
        $this->target = $target;
        $this->params = $params;
    }
    protected $isStopped = false;
    //protected $stopPropagation = false;
    
    public function isStopped(){
        return $this->isStopped;
    }
    public function propagationIsStopped() {
        return $this->isStopped;
    }
    public function stop() {
        $this->isStopped = true;
    }
    
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}