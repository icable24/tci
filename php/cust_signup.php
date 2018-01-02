<?php 
	include '../database.php';

	$pdo = Database::connect();

	$acc_fname = $_POST['acc_fname'];
	$acc_lname = $_POST['acc_lname'];
	$acc_add = $_POST['acc_add'];
	$acc_email = $_POST['acc_email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$acc_contact = $_POST['acc_contact'];
	$acc_company = $_POST['acc_company'];
	$acc_comp_contact = $_POST['acc_comp_contact'];
	if(!empty($_GET['user_type'])){
		$user_type = $_REQUEST['user_type'];
		if($password1 == $password2){
			$acc_password = $password1;

			if($user_type == 'Single Buyer'){
				$query = $pdo->prepare("INSERT INTO account(acc_fname, acc_lname, acc_email, acc_password, acc_contact, user_type) VALUES(?, ?, ?, ?, ?, ?)");
				$query->execute(array($acc_fname, $acc_lname, $acc_email, $acc_password, $acc_contact, $user_type));
			header('location:../index.php');
			}elseif($user_type == 'Company'){
				$query = $pdo->prepare("INSERT INTO account(acc_fname, acc_lname, acc_email, acc_add, acc_password, acc_contact, acc_company, acc_comp_contact, user_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$query->execute(array($acc_fname, $acc_lname, $acc_email, $acc_add, $acc_password, $acc_contact, $acc_company, $acc_comp_contact, $user_type));
			}
		}
	}
	header("location:../index.php");
?>