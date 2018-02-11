<?php 
	include("../database.php");
	
	if(isset($_POST)){
		$pdo = Database::connect();

		$prod_id = $_POST['prod_id'];
		$inventory_id = $_POST['inventory_id'];
		$pullout_quantity = $_POST['pullout_quantity'];
		$pullout_date = $_POST['pullout_date'];
		$details = $_POST['details'];
		$storeid = $_POST['storeid'];

		$inventory = $pdo->prepare("SELECT * FROM inventory WHERE inventory_id = ?");
		$inventory->execute(array($inventory_id));
		$inventory = $inventory->fetch();

		$newquantity = $inventory['quantity'] - $pullout_quantity;
		if($newquantity > 0){
			$update = $pdo->prepare("UPDATE inventory SET quantity = ? WHERE inventory_id = ?");
			$update->execute(array($newquantity, $inventory_id));
		}else{
			$delete = $pdo->prepare("DELETE FROm inventory WHERE inventory_id = ?");
			$delete->execute(array($inventory_id));
		}

		$addstock = $pdo->prepare("INSERT INTO stock(storeid, prod_id, deducted, trans_date) VALUES(?, ?, ?, ?)");
		$addstock->execute(array($storeid, $prod_id, $pullout_quantity, $pullout_date));

		$pullout = $pdo->prepare("INSERT INTO pullout(storeid, prod_id, pullout_quantity, pullout_date, details) VALUES(?, ?, ?, ?, ?)");
		$pullout->execute(array($storeid, $prod_id, $pullout_quantity, $pullout_date, $details));
		header("location: ../admin/pulloutlist.php");
	}	
?>