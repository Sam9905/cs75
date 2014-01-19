<?php
/*********************************
 * model.php
 *
 * CSCI S-75
 * Project 1
 * Chris Gerber
 *
 * Model for users and portfolios
 *********************************/

// database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'parneet');
define('DB_DATABASE', 'project1');

/*
 * login_user() - Verify account credentials and create session
 *
 * @param string $email
 * @param string $password
 */
function login_user($email, $password)
{
	// prepare email address and password hash for safe query
	$email = mysql_real_escape_string($email);
	$pwdhash = hash("SHA1",$password);
	
	// connect to database with PDO
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);

	// verify email and password pair
	$userid = 0;
	$query = sprintf("SELECT id FROM users WHERE LOWER(email)='%s' AND passwordhash='%s'",strtolower($email),$pwdhash);
	$result = $dbh->query($query);
	if ($result)
	{
		if ($row = $result->fetch(PDO::FETCH_BOTH))
			$userid = $row[0];
	}
	
	// close database and return 
	$dbh = null;
	return $userid;
}

/*
 * get_user_shares() - Get portfolio for specified userid
 *
 * @param int $userid
 */
function get_user_shares($userid)
{
	// connect to database with PDO
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);

	// get user's portfolio
	$query = sprintf("SELECT symbol, shares FROM portfolios WHERE id = '%d'",$userid);
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

	// close database and return null 
	$dbh = null;
	return null;
}

/*
 * get_quote_data() - Get Yahoo quote data for a symbol
 *
 * @param string $symbol
 */
function get_quote_data($symbol)
{
	$result = array();
	$url = "http://download.finance.yahoo.com/d/quotes.csv?s={$symbol}&f=sl1n&e=.csv";
	$handle = fopen($url, "r");
	if ($row = fgetcsv($handle))
		if (isset($row[1]))
			$result = array("symbol" => $row[0],"last_trade" => $row[1],"name" => $row[2]);
	fclose($handle);
	return $result;
}

/*
 * register_user() - Create a new user account
 *
 * @param string $email
 * @param string $password
 * 
 * @return string $error
 */
function register_user($email, $password, &$error)
{
	// prepare email and password
	$email = mysql_real_escape_string($email);
	$pwdhash = hash("SHA1",$password);
	
	// connect to database with PDO
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);

	// execute 
	$query = sprintf("INSERT INTO users(email,passwordhash,balance) VALUES ('%s','%s',%d)",$email,$pwdhash,10000);
	$result = $dbh->prepare($query);
	$dbh->beginTransaction();
	if($result->execute()){
		$dbh->commit();
		// close database and return
		$dbh = null;
		return true;
	}

	// error if unable to register
	$error = 'Your account could not be registered. Did you forget your password?';
	// close database and return
	$dbh = null;
    return false;
}

function get_user_balance($userid) 
{ 
	// connect to database with PDO
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
	
	// get balance
	$query = sprintf("SELECT balance FROM users WHERE id = '%d'",$userid);
	$result = $dbh->query($query);
	$row = $result->fetch(PDO::FETCH_BOTH);
	return $row[0];
}

function buy_shares($userid, $symbol, $shares, &$error) 
{ 
	// connect to database with PDO
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);

	// calculate price of shares to be bought
	$url = "http://download.finance.yahoo.com/d/quotes.csv?s={$symbol}&f=sl1n&e=.csv";
	$handle = fopen($url, "r");
	if ($row = fgetcsv($handle))
		if (isset($row[1]))
			$price = $row[1]*$shares;

	// check if has required balance
	$query = sprintf("SELECT * FROM users WHERE id = '%d'",$userid);
	$result = $dbh->query($query);
	$row = $result->fetch(PDO::FETCH_BOTH);
	if($price > $row['balance']){
		$error = 'You have got less balance = $'.$row['balance']." but you need $".$price;
		$dbh = null;
		return false;
	}

	// buy the shares
	$dbh->beginTransaction();
	$query = sprintf("UPDATE portfolios SET shares = shares + '%d' WHERE id = '%d' AND symbol ='%s'",$shares,$userid,$symbol);
	if($dbh->exec($query) == 0){
		$query = sprintf("INSERT INTO portfolios VALUES ('%d','%s','%d')",$userid,$symbol,$shares);
		$dbh->query($query);
	}
	$query = sprintf("UPDATE users SET balance = balance - '%d' WHERE id = '%d'",$price,$userid);
	$dbh->query($query);
	$dbh->commit();

	// close the database and return
	$dbh = null;
	return true;
}

function sell_shares($userid, $symbol, &$error)
{ 
	// connect to database with PDO
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);

	// calculate price of shares to be sold
	$url = "http://download.finance.yahoo.com/d/quotes.csv?s={$symbol}&f=sl1n&e=.csv";
	$handle = fopen($url, "r");
	if ($row = fgetcsv($handle))
		if (isset($row[1]))
			$price = $row[1];
	$query = sprintf("SELECT shares FROM portfolios WHERE id='%d' AND symbol='%s'",$userid,$symbol);
	$result = $dbh->query($query);
	$row = $result->fetch(PDO::FETCH_BOTH);
	$price = $price*$row[0];
	if(!$price){
		$error = "Unable to access data from net";
		$dbh = null;
		return false;
	}
	// sell shares
	$dbh->beginTransaction();
	$query = sprintf("DELETE FROM portfolios WHERE id='%d' AND symbol='%s'",$userid,$symbol);
	$dbh->query($query);
	$query = sprintf("UPDATE users SET balance = balance + '%d' WHERE id = '%d'",$price,$userid);
	$dbh->query($query);
	$dbh->commit();

	// close the database and return
	$dbh = null;
	return true;
}
