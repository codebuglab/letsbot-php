<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';
$lb = (new \LetsBot\Api\LetsBot );
$lb::$domain = 'https://letsbot.net/'; // set domain
$lb::$api_key = 'test'; // set api key
$lb::$ssl_verify = false; // set ssl optional | true or false . default is true

// $lb = new LetsBot\Api\LetsBot;
$result = $lb->ChatList()->send();
echo json_encode($result);
