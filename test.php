<?php

include __DIR__.'/vendor/autoload.php';

$client = new SlimKit\PlusID\Client\Client(2, 'demo', 'http://plus.io/plus-id/clients/2');
$test = new SlimKit\PlusID\Client\User\Show($client, 1);

var_dump(
    $test->getTime(),
    $test->getSign()
);

