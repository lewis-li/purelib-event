<?php
require __DIR__ . '/../vendor/autoload.php';

$queue = new \Zend\Stdlib\PriorityQueue();

$queue->insert(3, 3);
$queue->insert(2,2);
$queue->insert(5,5);
foreach ($queue as $item) {
    var_dump($item);
}