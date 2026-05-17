<?php
//DB Params
require '../vendor/autoload.php';

// createUnsafeImmutable keeps getenv() working; safeLoad tolerates a missing .env
Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../../')->safeLoad();

define("DB_HOST", getenv('FORUMDBHOST'));
define("DB_USER", getenv('FORUMDBUSER')); 
define("DB_PASS", getenv('FORUMDBPASS')); 
define("DB_NAME", getenv('FORUMDBNAME')); 
define("SITE_TITLE", "Welcome To TalkingSpace!");

//Paths
define ('BASE_URI', 'https://'.$_SERVER['SERVER_NAME'].'/portfolio/forum/');
