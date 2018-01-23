<?php 
	session_start();
	require '../database.php';
	
	$shippingaddress = $_POST['shippingaddress'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip_code = $_POST['zip_code'];
	$order_amount = 0;
	$getDate = getDate();

	$Date = $getDate['year']. '-' . $getDate['mon']. '-' . $getDate['mday']; 
	

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
	
	$update_order = $pdo->prepare("UPDATE orders SET shippingaddress = ?, country = ?, state = ?, city = ?, zip_code = ?, order_amount = ?, order_finish = ?, date_ordered = ? WHERE order_finish = 'No' AND acc_id = ?");
	$update_order->execute(array($shippingaddress, $country, $state, $city, $zip_code, $order_amount, "Pending", $Date, $user_id['acc_id']));

	foreach($order_id as $row){
		$update = $pdo->prepare("UPDATE cart SET cart_finish = ? WHERE cart_id = ?");
		$update->execute(array("Yes", $row['cart_id']));
	}

	$order = $pdo->prepare("INSERT INTO orders(acc_id, order_finish) VALUES(?,?)");
	$order->execute(array($user_id['acc_id'], "No"));

	header("location: ../paynoteinfo.php");
?>