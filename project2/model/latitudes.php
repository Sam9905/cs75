<?php

// database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'parneet');
define('DB_DATABASE', 'project2');

// connect to server and select database
$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);

// recieve parameter
$stations = json_decode(stripslashes($_POST['routes']));

// get the routes
$result = array();
foreach($stations as $st){
	$query = sprintf("SELECT gtfs_latitude FROM stations WHERE abbr='%s'",$st);
	$r = $dbh->query($query);
	array_push($result, $r->fetch(PDO::FETCH_NUM)[0]);
}

if ($result)
{ 
	echo json_encode($result);
}

// close connection
$dbh = null;
?>