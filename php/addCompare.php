<?php 
	session_start();
	include("../database.php");
	$pdo = Database::connect();
	if(isset($_GET['id'])){
		$prod_id = $_REQUEST['id'];
		$account = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
		$account->execute(array($_SESSION['login_username']));
		$account = $account->fetch();
		$count = $pdo->prepare("SELECT count(*) FROM compare WHERE acc_id = ?");
		$count->execute(array($account['acc_id']));
		$count = $count->fetch();
		$added = $pdo->prepare("SELECT * FROM compare WHERE prod_id = ? AND acc_id = ?");
		$added->execute(array($prod_id, $account['acc_id']));
		$added = $added->fetch();
		$prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
		$prod->execute(array($prod_id));
		$prod = $prod->fetch();
		if($count['count(*)'] < 3){
			if(!$added){
				$add = $pdo->prepare("INSERT INTO compare(prod_id, acc_id) VALUES(?, ?)");
				$add->execute(array($prod_id, $account['acc_id']));
				header("location: ../productdetails.php?id=" . $prod['prod_code']);
			}else{
				header("location: ../productdetails.php?id=". $prod['prod_code'] . "&error=2");
			}
		}else{
			header("location: ../productdetails.php?id=". $prod['prod_code'] . "&error=1");
		}
	}else{
		header("location: ../index.php");
	}
?>