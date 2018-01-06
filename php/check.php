<?php 
	session_start();
	require '../database.php';
	
	
	$shippingaddress = $_POST['shippingaddress'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip_code = $_POST['zip_code'];
	

	$pdo = Database::connect();
<<<<<<< HEAD
	$acc_email =  $_SESSION['login_username'];
	$user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
	$user_id->execute();
	$user_id = $user_id->fetch(PDO::FETCH_ASSOC);

	$pdo = Database::connect();
	$acc_email =  $_SESSION['login_username'];
	$user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
	$user_id->execute();
	$user_id = $user_id->fetch(PDO::FETCH_ASSOC);

	$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO orders (shippingaddress, country, state, city, zip_code) values(?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
        $q->execute(array($shippingaddress, $country, $state, $city, $zip_code));
        Database::disconnect();
=======

	$user_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
	$user_id->execute(array($_SESSION['login_username']));
	$user_id = $user_id->fetchAll();

	$order_id = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND cart_finish = ?");
	$order_id->execute(array($user_id['user_id'], "No"));
	$order_id = $order_id->fetchAll();
>>>>>>> d8f73ea2b372753aede96f54931bc7385d157295


	
	header("location: ../paynoteinfo.php");
?>