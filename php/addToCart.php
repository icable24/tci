<?php 
	session_start();
	require '../database.php';

	$acc_email = $_SESSION['login_username'];
	$quantity = $_POST['quantity'];
	if(!empty($_GET['id'])){
		$prod_code = $_REQUEST['id'];
	}elseif(!empty($_POST['compProd'])){
		$prod_code = $_POST['compProd'];
	}

	$pdo = Database::connect();

	$prod_id = $pdo->prepare("SELECT prod_id FROM product WHERE prod_code = '$prod_code'");
	$prod_id->execute();
	$prod_id = $prod_id->fetch(PDO::FETCH_ASSOC);

	$acc_email =  $_SESSION['login_username'];
	$user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
	$user_id->execute();
	$user_id = $user_id->fetch(PDO::FETCH_ASSOC);

	$acc_email =  $_SESSION['login_username'];
	$ord_id = $pdo->prepare("SELECT order_id FROM orders WHERE order_id = '$order_id'");
	$ord_id->execute();
	$ord_id = $user_id->fetch(PDO::FETCH_ASSOC);


	$check = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM cart WHERE user_id = ? AND order_id = ? AND prod_id = ?");
	$check->execute(array($user_id['acc_id'], $ord_id['order_id'], $prod_id['prod_id']));
	$check = $check->fetch();

	if($check <= 0){
		$addToCart = $pdo->prepare("INSERT INTO cart (user_id, order_id, prod_id, quantity) VALUES(?,?,?,?)");
		$addToCart->execute(array($user_id['acc_id'], $ord_id['order_id'], $prod_id['prod_id'], $quantity));
	}else{
		$oldQuantity = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND order_id = ? AND prod_id = ?");
		$oldQuantity->execute(array($user_id['acc_id'], $ord_id['order_id'], $prod_id['prod_id']));
		$oldQuantity = $oldQuantity->fetch(PDO::FETCH_ASSOC);

		$newQuantity = $quantity + $oldQuantity['quantity'];

		$updateCart = $pdo->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND order_id = ? AND prod_id = ?");
		$updateCart->execute(array($newQuantity, $user_id['acc_id'], $ord_id['order_id'], $prod_id['prod_id']));
	}
	header("location: ../productdetails.php?id=$prod_code");
?>