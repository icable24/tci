<?php 
	session_start();
	require '../database.php';
	
	$shippingaddress = $_POST['shippingaddress'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip_code = $_POST['zip_code'];
	$order_amount = 0;
	

	$pdo = Database::connect();
	$user_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
	$user_id->execute(array($_SESSION['login_username']));
	$user_id = $user_id->fetch();

	$order_id = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND cart_finish = ?");
	$order_id->execute(array($user_id['acc_id'], "No"));
	$order_id = $order_id->fetchAll();

	foreach($order_id as $row){
		$prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
		$prod->execute(array($row['prod_id']));
		$prod = $prod->fetch();

		$itemprice = $prod['prod_price'] * $row['quantity'];
		$order_amount += $itemprice;
	}
	
	$update_order = $pdo->prepare("UPDATE orders SET shippingaddress = ?, country = ?, state = ?, city = ?, zip_code = ?, order_amount = ?");
	$update_order->execute(array($shippingaddress, $country, $state, $city, $zip_code, $order_amount));

	foreach($order_id as $row){
		$update = $pdo->prepare("UPDATE cart SET cart_finish = ? WHERE cart_id = ?");
		$update->execute(array("Yes", $row['cart_id']));
	}

	header("location: ../paynoteinfo.php");
?>