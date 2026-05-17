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

//Paths — derive from the current request so the app works under any host or mount path
$forum_scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
	|| (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')
	? 'https' : 'http';
$forum_host = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? 'localhost');
$forum_dir  = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/forum/index.php')), '/') . '/';
define('BASE_URI', $forum_scheme . '://' . $forum_host . $forum_dir);
