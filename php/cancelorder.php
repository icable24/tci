<?php 
	include("../database.php");

	if(isset($_GET['id'])){
		$order_id = $_REQUEST['id'];

		$pdo = Database::connect();

		$remove = $pdo->prepare("UPDATE orders SET order_finish = 'Cancelled' WHERE order_id = ?");
		$remove->execute(array($order_id));
		header("location: ../vieworder.php?id=" . $order_id);
	}else{
		header("location: ../orderlist.php");
	}
?>