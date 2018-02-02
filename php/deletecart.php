<?php 
	include("../database.php");

	$pdo = Database::connect();
	if(isset($_POST['id'])){
		$cart_id = $_POST['id'];

		$delete = $pdo->prepare("DELETE FROM cart WHERE cart_id = ?");
		$delete->execute(array($cart_id));
		header("location: ../checkout.php");
	}else{
		header("location: ../checkout.php");
	}
?>