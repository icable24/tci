<?php 
	include '../database.php';

	$pdo = Database::connect();
	$cust_name = $_POST['cust_name'];
	$cust_address = $_POST['cust_address'];
	$cust_email=$_POST['cust_email'];
	$cust_password = $_POST['cust_password'];
	$cust_conpassword = $_POST['cust_conpassword'];
	$cust_contactnumber = $_POST['cust_contactnumber'];
	$buy_agent = $_POST['buy_agent'];
	$cust_gender=$_POST['cust_gender'];
	

	$query = $pdo->prepare("SELECT cust_id FROM customer WHERE cust_name = ?");
	$query->execute(array($cust_name));
	$cust = $query->fetch(PDO::FETCH_ASSOC);


	$query = $pdo->prepare("INSERT INTO customer(cust_name, cust_address, cust_email, cust_password, cust_conpassword, cust_contactnumber, buy_agent, cust_gender) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
	$query->execute(array($cust_name, $cust_address, $cust_email, $cust_password, $cust_conpassword, $cust_contactnumber, $buy_agent, $cust_gender));	

	header('Location: ../customerlist.php');
?>