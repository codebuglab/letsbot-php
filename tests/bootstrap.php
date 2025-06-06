<?php

// Load Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables from .env file if it exists
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

// Set up test environment
$_ENV['LETSBOT_TEST_PHONE'] = $_ENV['LETSBOT_TEST_PHONE'] ?? '966555000000';
$_ENV['LETSBOT_API_KEY'] = $_ENV['LETSBOT_API_KEY'] ?? 'c7b3a9f57768da4652f08330888de7f8_fAWrzdFzarO7F66SteOOrBol0jUjuw7605J2NrWo';
$_ENV['LETSBOT_BASE_URL'] = $_ENV['LETSBOT_BASE_URL'] ?? 'https://letsbot.net/'; 