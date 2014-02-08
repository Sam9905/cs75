<?php
		if((session_id())){
			session_destroy();
			session_start();
		}else{
		 session_start();
		 }
		  if(!isset($_SESSION['t'])){
			$_SESSION['t'] = 0;
			$_SESSION['it'] = array();
			}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width:device-width"/>
    <link rel="stylesheet" type="text/css" href="../css/mymenu.css"/>
    <link rel="stylesheet" type="text/css" href="../css/mynavbar.css"/>
    <link rel="stylesheet" type="text/css" href="../css/cart.css"/>
    <title><?= htmlspecialchars($title) ?></title>
  </head>
  <body>
    <div>
      <img src="../css/Capture.PNG" style="margin-left:50px;"></img>
    </div>
    <div>
    <ul class="navbar">
      <li><a href="index.php?page=home">Home</a></li>
      <li><a href="index.php?page=products">Products</a></li>
      <li><a href="#">Logout</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Register</a></li>
    </ul>
    <img src="../css/Capture2.PNG" style="margin-left:50px; "></img>
    <br/>
    </div>
    <br/>