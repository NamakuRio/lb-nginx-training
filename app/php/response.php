<?php
function getRequestHeaders() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers;
}

$timestamp = (new DateTime())->format('F dS Y, h:i:s a');

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$hostname = $_SERVER['HTTP_HOST'];
$headers = getRequestHeaders();

$data = [
    "message" => "hello world from",
    "requestPayload" => [
        "url" => $url,
        "method" => $method,
        "hostname" => $hostname,
        "headers" => $headers,
    ],
    "timestamp" => $timestamp
];
