<?php
$server = 'lujzag.com.mysql';
$username = 'lujzag_com';
$password = 'et4JKEVn';
$database = 'lujzag_com';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}