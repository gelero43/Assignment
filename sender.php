<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'APIcall.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$url = 'candidatemq.n2g-dev.net';
$username = 'your username';
$port = 5672;
$password = 'your code';
$exchange = 'cand_3aqt';


$connection = new AMQPStreamConnection($url, 5672, $username, $password);
$channel = $connection->channel();

//counter is how many messages will the script sent
$counter=2;

while(!$counter == 0){
    
    $results = getAPIresults();
    $routingKey = hexdec($results['gatewayEui']) . '.' . hexdec($results['profileId']) . '.' . hexdec($results['endpointId']) . '.' .hexdec($results['clusterId']) . '.' . hexdec($results['attributeId']);

    $encoded = json_encode(['value' => $results['value'], 'timestamp' => $results['timestamp']]);

    $msg = new AMQPMessage($encoded);

    $channel->basic_publish($msg, $exchange, $routingKey);

    echo '[x] Sent ', $routingKey, "\n";  
    $counter = $counter - 1;
}


$channel->close();
$connection->close();