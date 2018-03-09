<?php 
	session_start();
	require("../database.php");

	$pdo = Database::connect();

	if(isset($_GET['id'])){
		$order_id = $_REQUEST['id'];
	$order_finish = $_POST['order_finish'];
	$order = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
	$order->execute(array($order_id));
	$order = $order->fetch();
	$date_finished = $_POST['date_finished'];
	if($order_finish == "Processing"){
		$curdate = date("m/d/Y");
		$pdate = $pdo->prepare("UPDATE orders SET date_processed = ? WHERE order_id = ?");
		$pdate->execute(array($curdate, $order_id));
	}

		echo $date_finished;
		echo $order_finish;
		if($order_finish != "Delivery"){
		$update = $pdo->prepare("UPDATE orders SET order_finish = ?WHERE order_id = ?");
		$update->execute(array($order_finish, $order_id));
		header("location: ../admin/vieworder.php?id=" . $order_id);
		echo "1";
		}else{
		 $update = $pdo->prepare("UPDATE orders SET order_finish = ?, date_finished = ? WHERE order_id = ?");
		 $update->execute(array($order_finish, $date_finished ,$order_id));
		header("location: ../admin/vieworder.php?id=" . $order_id);
		}
	}else{
		header("location: ../admin/vieworder.php?id=");
	}

?>