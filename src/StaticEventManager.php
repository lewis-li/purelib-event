<?php

namespace PureLib\Event;

class StaticEventManager {
    protected static $instance = null;
    protected function __CONSTRUCT() {
    }
    static public function ins() {
        if (self::$instance === null) {
            self::$instance = new EventManager ();
        }
        return self::$instance;
    }
}