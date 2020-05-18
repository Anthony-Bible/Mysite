<?php
//Connect to MySQL
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$con = mysqli_connect(getenv('MESSAGINGHOST'), getenv('MESSAGINGUSER'), getenv('MESSAGINGPASS') ,getenv('MESSAGINGDBNAME'));
//Test Connection
if(mysqli_connect_errno()){
	echo 'Failed to connect to MySQL: '.mysqli_connect_error();
}
