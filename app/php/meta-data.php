<?php
$timestamp = (new DateTime())->format('F dS Y, h:i:s a');

$data = [
    "description" => "Just an example metadata.",
    "external_url" => "https://avatars.githubusercontent.com/u/34277951?&u=e35a3b2b6bc24f66e760400f44768e9e2223578e",
    "image" => "https://avatars.githubusercontent.com/u/34277951?&u=e35a3b2b6bc24f66e760400f44768e9e2223578e",
    "name" => "Profile Picture",
    "timestamp" => $timestamp
];

header('Content-Type: application/json');
echo json_encode($data);
