<?php

namespace PureLib\Event;

use PureLib\Base\CallbackHandler;

/**
 *
 * @todo attach,detach,trigger的eventName可传数组
 *      
 */
class EventManager {
    protected $events = array ();
    public function attach($eventName, $listener, $priority = 1) {
        if (is_callable ( $listener ) === false) {
            throw new \Exception ( sprintf ( '%s: expects a callback; none provided', __METHOD__ ) );
        }
        
        if (! isset ( $this->events [$eventName] )) {
            $this->events [$eventName] = new \Zend\Stdlib\PriorityQueue ();
        }
        $listener = new \PureLib\Base\CallbackHandler ( $listener, array (
                'eventName' => $eventName,
                'priority' => $priority 
        ) );
        $this->events [$eventName]->insert ( $listener, $priority );
        return $listener;
    }
    public function detach(CallbackHandler $listener) {
        $eventName = $listener->getMetadatum ( 'eventName' );
        if (isset ( $this->events [$eventName] )) {
            $this->events [$eventName]->remove ( $listener );
        }
    }
    public function trigger($eventName, $context = null, array $params = null) {
        if ($context == null) {
            $context = $this;
        }
        
        if (! isset ( $this->events [$eventName] )) {
            return;
        }
        $e = new Event ( $eventName, $context, $params );
        foreach ( $this->events [$eventName] as $listener ) {
            if ($e->isStopped ()) {
                break;
            }
            call_user_func ( $listener, $e );
        }
    }
    public function getEvents() {
        return array_keys ( $this->events );
    }
    
    /**
     *
     * @todo
     *
     */
    public function getListeners() {
    }
    
    /**
     *
     * @todo
     *
     */
    public function clearEvent() {
    }
}