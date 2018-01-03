<?php 
	session_start();
	require '../database.php';

	$acc_email = $_SESSION['login_username'];
	$name = $_POST['name'];
	$acc_company = $_POST['acc_company'];
	$shippingaddress = $_POST['shippingaddress'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$acc_email = $_POST['acc_email'];
	$acc_contact = $_POST['acc_contact'];
	$zip_code = $_POST['zip_code'];
	$order_amount = $_POST['order_amount'];
	

	$pdo = Database::connect();

	$acc_email =  $_SESSION['login_username'];
	$user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
	$user_id->execute();
	$user_id = $user_id->fetch(PDO::FETCH_ASSOC);


	$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO orders (name, acc_company, shippingaddress, country, state, city, acc_email, acc_contact, zip_code, order_amount) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
        $q->execute(array($name, $acc_company, $shippingaddress, $country, $state, $city, $acc_email, $acc_contact, $zip_code, $order_amount));
        Database::disconnect();


	
	header("location: ../paynoteinfo.php");
?>