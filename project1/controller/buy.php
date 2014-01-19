<?php
require_once('../model/model.php');
require_once('../includes/helper.php');

if (isset($_POST['symbol']) && isset($_POST['shares']))
{
	// buy shares
	$userid = (int)$_SESSION['userid'];
	$result = buy_shares($userid,$_POST['symbol'],$_POST['shares'],$error);
	if($result){
		$holdings = get_user_shares($userid);
		$cash = get_user_balance($userid);
		render('portfolio', array('holdings' => $holdings, 'cash' => $cash));
	}else{
		echo $error;
		render('buy');
	}
}
else
{
	render('buy');
}
?>