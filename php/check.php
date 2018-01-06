<?php 
	session_start();
	require '../database.php';
	
	
	$shippingaddress = $_POST['shippingaddress'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip_code = $_POST['zip_code'];
	

	$pdo = Database::connect();
	$user_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
	$user_id->execute(array($_SESSION['login_username']));
	$user_id = $user_id->fetchAll();

	$order_id = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND cart_finish = ?");
	$order_id->execute(array($user_id['user_id'], "No"));
	$order_id = $order_id->fetchAll();

	
	
	header("location: ../paynoteinfo.php");
?>