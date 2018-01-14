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


	$check = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM cart WHERE user_id = ? AND prod_id = ? AND cart_finish = 'No'");
	$check->execute(array($user_id['acc_id'], $prod_id['prod_id']));
	$check = $check->fetch();
	$num = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];

	$order_id = $pdo->prepare("SELECT order_id FROM orders WHERE acc_id = ? AND order_finish = ?");
	$order_id->execute(array($user_id['acc_id'], "No"));
	$order_id = $order_id->fetch();

	var_dump($order_id);	
	if($num < '1'){
		$addToCart = $pdo->prepare("INSERT INTO cart(user_id, prod_id, quantity, order_id, cart_finish) VALUES(?,?,?,?,?)");
		$addToCart->execute(array($user_id['acc_id'], $prod_id['prod_id'], $quantity, $order_id["order_id"], "No"));
		echo "ok";
	}else{
		$oldQuantity = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND prod_id = ? AND cart_finish = ?");
		$oldQuantity->execute(array($user_id['acc_id'], $prod_id['prod_id'], "No"));
		$oldQuantity = $oldQuantity->fetch(PDO::FETCH_ASSOC);

		$newQuantity = $quantity + $oldQuantity['quantity'];

		$updateCart = $pdo->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND prod_id = ?");
		$updateCart->execute(array($newQuantity, $user_id['acc_id'], $prod_id['prod_id']));
		echo "not";
	}
	header("location: ../productdetails.php?id=$prod_code");
?>