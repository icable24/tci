<?php 
	include("../database.php");

	$newquantity = $_POST['newquantity'];

	if(isset($_GET['id'])){
		$cart_id = $_REQUEST['id'];

		$pdo = Database::connect();

		$update = $pdo->prepare("UPDATE cart SET quantity = ? WHERE cart_id =?");
		$update->execute(array($newquantity, $cart_id));
		header("location: ../checkout.php");
	}else{
		header("location: ../checkout.php");
	}
?>