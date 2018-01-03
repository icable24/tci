<?php 
	session_start();
	require '../database.php';

	$acc_email = $_SESSION['login_username'];
	$name = $_POST['name'];
	$acc_email = $_POST['acc_email'];
	$acc_company = $_POST['acc_company'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip_code = $_POST['zip_code'];
	$acc_contact = $_POST['acc_contact'];
	$shippingaddress = $_POST['shippingaddress'];
	$order_amount = $_POST['order_amount'];
	

	$pdo = Database::connect();

	$acc_email =  $_SESSION['login_username'];
	$user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
	$user_id->execute();
	$user_id = $user_id->fetch(PDO::FETCH_ASSOC);


	$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO orders (name, acc_email, acc_company, country, state, city, zip_code, acc_contact, shippingaddress, order_amount) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
        $q->execute(array($name, $acc_email, $acc_company, $country, $state, $city, $zip_code, $acc_contact, $shippingaddress, $order_amount));
        Database::disconnect();


	
	header("location: ../paynoteinfo.php");
?>