<?php 
session_start();
include '../database.php';

if(!empty($_GET['id'])){
	$prod_code = $_REQUEST['id'];
}elseif(!empty($_POST['compProd'])){
	$prod_code = $_POST['compProd'];
}else{
	//header("location: ../index.php");
}

if(!empty($_GET['type'])){
	$type = $_REQUEST['type'];
}
	if($type == "cart"){
		$quantity = $_POST['quantity'];

		if(empty($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		if(empty($_SESSION['quantity'])){
			$_SESSION['quantity'] = array();
		}

		array_push($_SESSION['cart'], $prod_code);
		array_push($_SESSION['quantity'], $quantity);
	}elseif($type == "compare"){
		if(empty($_SESSION['compare'])){
			$_SESSION['compare']= array();
		}
		$prod_code = $_POST['compProd'];
		array_push($_SESSION['compare'], $prod_code);
	}

	$pdo = Database::connect();

	$prod_id = $pdo->prepare("SELECT prod_id FROM product WHERE prod_code = '$prod_code'");
	$prod_id->execute();
	$prod_id = $prod_code->fetch(PDO::FETCH_ASSOC);

	$acc_email =  $_SESSION['login_username'];
	$user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
	$user_id->execute();
	$user_id = $user_id->fetch(PDO::FETCH__ASSOC);

	$check = $pdo->prepare("SELECT * FROM cart WHERE prod_id = '$prod_id' AND user_id = '$user_id'");
	$check->execute();
	$check = $check->fetchAll(PDO::FETCH_ASSOCC);

	if($check > 0){
		echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Product has been added.</b>
			</div>
		";
	}else{
		
	}
?>