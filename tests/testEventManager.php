<?php
use PureLib\Event\EventManager;
require __DIR__ . '/../vendor/autoload.php';

/*
class Test {
    public static function listener($e) {
        echo 'listener';
    }
}
$manager = new PureLib\Event\EventManager ();

$l = $manager->attach('before', 'Test::listener');

$manager->detach($l);

$manager->attach ( 'before', function ($e) {
   echo $e->name;
} );

$manager->attach ( 'before', function ($e) {
    echo "before2\n";
} );
$a = 'a';

$manager->trigger ( 'before', $a, array('a'=>'a'));
*/

class Example {
    protected $eventManager;
    public function getEventManager() {
        if ($this->eventManager === null) {
            $this->eventManager = new EventManager();
        }
        return $this->eventManager;
    }
    
    public function run() {
        $this->getEventManager()->trigger(__FUNCTION__, $this, array());
    }
}


$example = new Example();
$example->getEventManager()->attach('run', function ($e){
    var_dump($e->name, $e->params, $e->isStopped);
});

$example->getEventManager()->attach('run', function ($e){
    echo 'hello';
},2);
$example->run();