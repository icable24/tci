<?php 
session_start();

if(!empty($_GET['id'])){
	$prod_code = $_REQUEST['id'];
}else{
	header("location: ../index.php");
}
	$quantity = $_POST['quantity'];

	if(empty($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	if(empty($_SESSION['quantity'])){
		$_SESSION['quantity'] = array();
	}

	array_push($_SESSION['cart'], $prod_code);
	array_push($_SESSION['quantity'], $quantity);

	header("location:../productdetails.php?id=".$_REQUEST['id'] ."");
?>