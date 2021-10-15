<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'databaseMethods.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$url = 'candidatemq.n2g-dev.net';
$username = 'your username';
$port = 5672;
$password = 'your code';
$queue = 'cand_3aqt_results';

$connection = new AMQPStreamConnection($url, 5672, $username, $password);
$channel = $connection->channel();


$callback = function($msg){
    
    $temp = explode('.',$msg->delivery_info['routing_key']);
    $gatewayEui = $temp[0];
    $profileId = $temp[1];
    $endpointId = $temp[2];
    $clusterId = $temp[3];
    $attributeId = $temp[4];

    $obj = json_decode($msg->body);

    $value = $obj -> value;
    $timestamp = $obj ->timestamp;

    //insert data to database
    insertData($gatewayEui, $profileId, $endpointId, $clusterId, $attributeId, $value, $timestamp);
    echo '[X] message received with routing key:' , $msg->delivery_info['routing_key'];
};

$channel->basic_consume($queue, '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
   
}


$channel->close();
$connection->close();