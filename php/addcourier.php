<?php 
	include("../database.php");

	if(isset($_GET['id'])){
		$order_id = $_REQUEST['id'];

		$courier_name = $_POST['courier_name'];
		$waybill_number = $_POST['waybill_number'];
		$delivery_range = $_POST['delivery_range'];

		$pdo = Database::connect();

		$add = $pdo->prepare("INSERT INTO courier(courier_name, waybill_number, order_id, delivery_range) VALUES(?,?,?,?)");
		$add->execute(array($courier_name, $waybill_number, $order_id, $delivery_range));
		
		header("location: ../admin/vieworder.php?id=" . $order_id);
	}else{
		header("location: ../admin/orderlist.php");
	}
?>