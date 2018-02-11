<?php 
	include("../database.php");

	$pdo = Database::connect();
	if(isset($_POST)){
		$order_id = $_POST['order_id'];
		$discount = $_POST['discount'];
		$amount = $_POST['amount'];
		$order_amount = $_POST['order_amount'];
		$total = $order_amount - $amount;

		$check = $pdo->prepare("SELECT * FROM discount WHERE order_id = ?");
		$check->execute(array($order_id));
		$check = $check->fetch();

		if(!$check){
			$disc = $pdo->prepare("INSERT INTO discount(order_id, discount, amount, total) VALUES(?,?,?,?)");
			$disc->execute(array($order_id, $discount, $amount, $total));
		}else{
			$disc = $pdo->prepare("UPDATE discount SET discount = ?, amount = ?, total = ? WHERE order_id = ?");
			$disc->execute(array($discount, $amount, $total, $order_id));
		}

		$order = $pdo->prepare("UPDATE orders SET discount_amount = ? WHERE order_id =?");
		$order->execute(array($total, $order_id));
		header("location: ../admin/vieworder.php?id=".$order_id);
	}else{
		header("location:../admin/admin.php");
	}
?>