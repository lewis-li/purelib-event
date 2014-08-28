<?php
use PureLib\Event\EventManager;

require __DIR__.'/../EventManager.php';
require __DIR__.'/../Event.php';

//echo "hello\n";

$eventManager = new EventManager();

//var_dump($eventManager);
$stop = function ($e){
    $e->stop();
};
$eventManager->attach('start', $stop);
$eventManager->attach('start', function ($e){
    var_dump($e->stop);
    $e->target->abc = true;
    var_dump($e);
});

$eventManager->detach('start', $stop);

$eventManager->trigger('start');