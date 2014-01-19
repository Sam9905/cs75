<?php

require_once('../model/model.php');
require_once('../includes/helper.php');

if (isset($_POST['email']) &&
	isset($_POST['password']) &&
	isset($_POST['confirmpassword']))
{
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = register_user($email, $password,$error);
	if ($result)
	{
		render('login');
	}
	else
	{
		echo $error;
	}
}
else
{
	render('register');
}
?>