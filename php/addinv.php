<?php 
	session_start();
	require("../database.php");
	$pdo = Database::connect();
	if(isset($_GET['id'])){
		$prod_id = $_GET['id'];
		$store = $_POST['store'];
		$inv = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ? AND storeid = ?");
		$inv->execute(array($prod_id, 1));
		$inv = $inv->fetch();
		$quantity = $_POST['newquantity'];
		$newquantity = $quantity + $inv['quantity'];
		$date_added = $_POST['date_added'];


		if($inv){
			$add = $pdo->prepare("UPDATE inventory SET quantity = ? WHERE prod_id = ?");
			$add->execute(array($newquantity, $prod_id));
		}else{
			$new = $pdo->prepare("INSERT INTO inventory(prod_id, quantity, storeid) VALUES(?, ?, ?)");
			$new->execute(array($prod_id, $quantity, $store));
		}

		$addstock = $pdo->prepare("INSERT INTO stock(storeid, prod_id, added, trans_date) VALUES(?, ?, ?, ?)");
		$addstock->execute(array($store, $prod_id, $quantity, $date_added));

		$check = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ? AND storeid = ?");
		$check->execute(array($prod_id, 3));
		$check = $check->fetch();
 
		$store = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ? AND NOT storeid = ?");
		$store->execute(array($prod_id, 3));
		$store = $store->fetchAll();
		$total = 0;

		foreach($store as $row){
			$total += $row['quantity'];
		}

		header("location: ../admin/inventorylist.php");
	}else{
		header("location: ../admin/inventorylist.php");
	}
?>