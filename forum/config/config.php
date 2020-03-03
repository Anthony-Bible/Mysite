<?php
//DB Params
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

define("DB_HOST", getenv('FORUMDBHOST'));
define("DB_USER", getenv('FORUMDBUSER')); 
define("DB_PASS", getenv('FORUMDBPASS')); 
define("DB_NAME", getenv('FORUMDBNAME')); 
define("SITE_TITLE", "Welcome To TalkingSpace!");

//Paths
define ('BASE_URI', 'http://'.$_SERVER['SERVER_NAME'].'/portfolio/forum/');
