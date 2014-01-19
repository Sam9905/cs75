<?php
require_once('../model/model.php');
require_once('../includes/helper.php');

if (isset($_POST['symbol']))
{
	// sell shares
	$userid = (int)$_SESSION['userid'];
	$result = sell_shares($userid, $_POST['symbol'], $error);
	$holdings = get_user_shares($userid);
	if($result){
		$cash = get_user_balance($userid);
		render('portfolio', array('holdings' => $holdings, 'cash' => $cash));
	}else{
		echo $error;
		render('sell', array('holdings' => $holdings));
	}
}
else
{
	$userid = (int)$_SESSION['userid'];
	$holdings = get_user_shares($userid);
	render('sell', array('holdings' => $holdings));
}
?>