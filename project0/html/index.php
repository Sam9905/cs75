<?php
  require_once('../includes/helpers.php');

  if(isset($_GET['page'])){
     $page=$_GET['page'];
  }else{
     $page='home';
     session_start();
  }
     
  switch($page){
    case 'home':
      render('templates/header',array('title'=>'Shopping-Home'));
      render('home');
      render('templates/footer');
      break;
    case 'products':
      render('templates/header',array('title'=>'products'));
      render('products');
      render('templates/footer');
      break;
    case 'pizzas':
      render('templates/header',array('title'=>'pizzas'));
      render('pizzas');
      render('templates/footer');
      break;
    case 'salads':
      render('templates/header',array('title'=>'salads'));
      render('salads');
      render('templates/footer');
      break;
    case 'final':
      render('templates/header',array('title'=>'finalised'));
      render('final');
      render('templates/footer');
      break;
	case 'clear':
      render('templates/header',array('title'=>'finalised'));
      render('clear');
      render('templates/footer');
      break;
    default:
      echo 'hi';

  }
?>