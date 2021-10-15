<?php

use Symfony\Component\HttpClient\HttpClient;
require 'vendor/autoload.php';
function getAPIresults(){
    $client = HttpClient::create();
    
    $response = $client->request('GET', 'https://a831bqiv1d.execute-api.eu-west-1.amazonaws.com/dev/results');

    $statusCode = $response->getStatusCode();
    $contentType = $response->getHeaders()['content-type'][0];
    
    $content = $response->getContent();
    
    $content = $response->toArray();
    
    return $content;
}