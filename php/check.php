<?php 
	session_start();
	require '../database.php';
	
	
	$shippingaddress = $_POST['shippingaddress'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip_code = $_POST['zip_code'];
	

	$pdo = Database::connect();
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


	
	header("location: ../paynoteinfo.php");
?>