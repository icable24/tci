<?php 
	include("../database.php");

	if(isset($_GET['id'])){
		$order_id = $_REQUEST['id'];

		$carrier_name = $_POST['carrier_name'];
		$waivel_number = $_POST['waivel_number'];
		$delivery_range = $_POST['delivery_range'];

		$pdo = Database::connect();

		$add = $pdo->prepare("INSERT INTO carrier(carrier_name, waivel_number, order_id, delivery_range) VALUES(?,?,?,?)");
		$add->execute(array($carrier_name, $waivel_number, $order_id, $delivery_range));
		
		header("location: ../admin/vieworder.php?id=" . $order_id);
	}else{
		header("location: ../admin/orderlist.php");
	}
?>