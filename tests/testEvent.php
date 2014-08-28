<?php
require __DIR__ . '/../src/Event.php';

$o = new stdClass();
$o->m = 'test';

$e = new \PureLib\Event\Event('app.init', $o, array('arg1'=>'arg1', 'arg2'=>'arg2'));
echo '<pre>' , var_export($e,true) , '</pre>';