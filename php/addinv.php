<?php 
	session_start();
	require("../database.php");
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
	$pdo = Database::connect();
	if(isset($_GET['id'])){
		$prod_id = $_GET['id'];
		$inv = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ?");
		$inv->execute(array($prod_id));
		$inv = $inv->fetch();
<<<<<<< HEAD
=======
=======

	$pdo = Database::connect();
	if(isset($_GET['id'])){
		$prod_id = $_GET['id'];

		$inv = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ?");
		$inv->execute(array($prod_id));
		$inv = $inv->fetch();

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
		$quantity = $_POST['newquantity'];
		$newquantity = $quantity + $inv['quantity'];
		$store = $_POST['store'];
		if($inv){
			$add = $pdo->prepare("UPDATE inventory SET quantity = ? WHERE prod_id = ?");
			$add->execute(array($newquantity, $prod_id));
		}else{
			$new = $pdo->prepare("INSERT INTO inventory(prod_id, quantity, storeid) VALUES(?, ?, ?)");
			$new->execute(array($prod_id, $quantity, $store));
		}
		header("location: ../admin/inventorylist.php");
	}else{
		header("location: ../admin/inventorylist.php");
	}
?>