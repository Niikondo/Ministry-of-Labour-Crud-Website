<?php
//Database details
$db_host     = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name     = 'IRAMOL';

//Create connection and select DB
$connection = new mysqli($db_host, $db_username, $db_password, $db_name);

if($connection->connect_error){
    die("Unable to connect database: " . $connection->connect_error);
}