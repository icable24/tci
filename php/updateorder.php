<?php 
	session_start();
	require("../database.php");

	$pdo = Database::connect();

	if(isset($_GET['id'])){
		$order_id = $_REQUEST['id'];
	$order_finish = $_POST['order_finish'];

	$update = $pdo->prepare("UPDATE orders SET order_finish = ? WHERE order_id = ?");
	$update->execute(array($order_finish, $order_id));
	header("location: ../admin/vieworder.php?id=" . $order_id);
	}else{
		header("location: ../admin/vieworder.php?id=");
	}

?>