<?php

// database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'parneet');
define('DB_DATABASE', 'project2');

function get_routes(){
	// connect to server and select database
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);

	// get the routes
	$query = sprintf("SELECT name, number FROM routes WHERE 1");
	$result = $dbh->query($query);
	if ($result)
	{ 
	    $arr = array();
	    while ($row = $result->fetch()) {
			array_push($arr, $row);
	    }
		$dbh = null;
		return $arr;
	}

	// close connection
	$dbh = null;
	return null;
}

?>