<?php 
	include("../database.php");

	if(isset($_GET['id'])){
		$order_id = $_REQUEST['id'];

		$carrierName = $_POST['carrierName'];
		$waivelNo = $_POST['waivelNo'];

		$pdo = Database::connect();

		$add = $pdo->prepare("INSERT INTO carrier(carrierName, waivelNo, order_id) VALUES(?,?,?)");
		$add->execute(array($carrierName, $waivelNo, $order_id));
		
		header("location: ../admin/vieworder.php?id=" . $order_id);
	}else{
		header("location: ../admin/orderlist.php");
	}
?>