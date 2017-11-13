<?php 
	include '../database.php';

	$pdo = Database::connect();

	$acc_name = $_POST['acc_name'];
	$acc_email = $_POST['acc_email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$acc_sex = $_POST['acc_sex'];
	$acc_contact = $_POST['acc_contact'];
	if(!empty($_GET['user_type'])){
		$user_type = $_REQUEST['user_type'];
		if($password1 == $password2){
			$acc_password = $password1;
			$query = $pdo->prepare("INSERT INTO account(acc_name, acc_email, acc_password, acc_sex, acc_contact, user_type) VALUES(?, ?, ?, ?, ?, ?)");
			$query->execute(array($acc_name, $acc_email, $acc_password, $acc_sex, $acc_contact, $user_type));
			header('location:../index.php');
		}
	}
?>