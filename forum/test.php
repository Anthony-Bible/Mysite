<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
ini_set('display_errors', '1');
ini_set('display_startup_errors', 1);
echo getenv('FORUMDBHOST');
echo getenv('FORUMDBUSER');
echo getenv('FORUMDBPASS');
echo getenv('FORUMDBNAME');
print_r($_SERVER);
