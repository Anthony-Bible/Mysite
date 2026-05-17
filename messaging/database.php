<?php
//Connect to MySQL
require __DIR__ . '/../vendor/autoload.php';

// createUnsafeImmutable keeps getenv() working; safeLoad tolerates a missing .env
Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..')->safeLoad();

// PHP 8.1+ defaults mysqli to throw exceptions; keep the legacy errno check working
mysqli_report(MYSQLI_REPORT_OFF);
$con = @mysqli_connect(getenv('MESSAGINGHOST'), getenv('MESSAGINGUSER'), getenv('MESSAGINGPASS'), getenv('MESSAGINGDBNAME'));
if(!$con){
	echo 'Failed to connect to MySQL: '.mysqli_connect_error();
}
