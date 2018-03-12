<?php 
	session_start();
	include '../database.php';
	$pdo = Database::connect();
	$acc_fname = $_POST['acc_fname'];
	$acc_lname = $_POST['acc_lname'];
	$acc_email = $_POST['acc_email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$acc_contact = $_POST['acc_contact'];	
	$acc_company = $_POST['acc_company'];
	$acc_comp_contact = $_POST['acc_comp_contact'];
	$acc_add = $_POST['acc_add'];
	if(isset($_SESSION['login_username'])){
		$account = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
		$account->execute(array($_SESSION['login_username']));
		$account = $account->fetch();
		if($account['user_type'] == "admin"){
			if(!empty($_GET['user_type'])){
				$user_type = $_REQUEST['user_type'];
				if($password1 == $password2){
					$acc_password = $password1;
					if($user_type == 'Single Buyer'){
						$query = $pdo->prepare("INSERT INTO account(acc_fname, acc_lname, acc_email, acc_password, acc_contact, user_type) VALUES(?, ?, ?, ?, ?, ?)");
						$query->execute(array($acc_fname, $acc_lname, $acc_email, $acc_password, $acc_contact, $user_type));
						if($query){
							$id = $pdo->prepare("SELECT * FROM account ORDER BY acc_id DESC LIMIT 0, 1");
							$id->execute();
							$id = $id->fetch();
							$order = $pdo->prepare("INSERT INTO orders(acc_id, order_finish) VALUES(?, ?)");
							$order->execute(array($id['acc_id'], "No"));
						}	
						header('location:../admin/customerlist.php');
					}elseif($user_type == 'Company'){
						$query = $pdo->prepare("INSERT INTO account(acc_fname, acc_lname, acc_email, acc_add, acc_password, acc_contact, acc_company, acc_comp_contact, user_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
						$query->execute(array($acc_fname, $acc_lname, $acc_email, $acc_add, $acc_password, $acc_contact, $acc_company, $acc_comp_contact, $user_type));
						if($query){
							$id = $pdo->prepare("SELECT * FROM account ORDER BY acc_id DESC LIMIT 0, 1");
							$id->execute();
							$id = $id->fetch();
							$order = $pdo->prepare("INSERT INTO orders(acc_id, order_finish) VALUES(?, ?)");
							$order->execute(array($id['acc_id'], "No"));
						}
						header('location:../admin/customerlist.php');
					}
				}
			}
			header("location:../admin/customerlist.php");
		}else{
			header("location: ../index.php");
		}
	}else{
		if(!empty($_GET['user_type'])){
			$user_type = $_REQUEST['user_type'];
			if($password1 == $password2){
				$acc_password = $password1;
				if($user_type == 'Single Buyer'){
					$query = $pdo->prepare("INSERT INTO account(acc_fname, acc_lname, acc_email, acc_password, acc_contact, user_type) VALUES(?, ?, ?, ?, ?, ?)");
					$query->execute(array($acc_fname, $acc_lname, $acc_email, $acc_password, $acc_contact, $user_type));
					if($query){
						$id = $pdo->prepare("SELECT * FROM account ORDER BY acc_id DESC LIMIT 0, 1");
						$id->execute();
						$id = $id->fetch();
						$order = $pdo->prepare("INSERT INTO orders(acc_id, order_finish) VALUES(?, ?)");
						$order->execute(array($id['acc_id'], "No"));
					}
					$_SESSION['login_username']=$acc_email;
					header('location:../index.php');
				}elseif($user_type == 'Company'){
					$query = $pdo->prepare("INSERT INTO account(acc_fname, acc_lname, acc_email, acc_add, acc_password, acc_contact, acc_company, acc_comp_contact, user_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$query->execute(array($acc_fname, $acc_lname, $acc_email, $acc_add, $acc_password, $acc_contact, $acc_company, $acc_comp_contact, $user_type));
					if($query){
						$id = $pdo->prepare("SELECT * FROM account ORDER BY acc_id DESC LIMIT 0, 1");
						$id->execute();
						$id = $id->fetch();
						$order = $pdo->prepare("INSERT INTO orders(acc_id, order_finish) VALUES(?, ?)");
						$order->execute(array($id['acc_id'], "No"));
					}
					$_SESSION['login_username']=$acc_email;
				header('location:../index.php');
				}
			}
		}
		header("location:../index.php");
	}
?>