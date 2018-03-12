<?php 
	include("../database.php");
	
	if(isset($_POST)){
		$pdo = Database::connect();
		echo "prod=";
		echo $prod_id = $_POST['prod_id'];
		echo " ";
		echo $pullout_quantity = $_POST['pullout_quantity'];
		echo " ";
		echo $pullout_date = $_POST['pullout_date'];
		echo " ";
		echo $details = $_POST['details'];
		echo " store=";
		echo $storeid = $_POST['storeid'];
		echo " ";
		echo $comment = $_POST['comment'];

		$inventory = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ? AND storeid = ?");
		$inventory->execute(array($prod_id, $storeid));
		$inventory = $inventory->fetch();
		var_dump($inventory);

		$newquantity = $inventory['quantity'] - $pullout_quantity;
		if($newquantity > 0){
			$update = $pdo->prepare("UPDATE inventory SET quantity = ? WHERE inventory_id = ?");
			$update->execute(array($newquantity, $inventory['inventory_id']));
		}else{
			$delete = $pdo->prepare("DELETE FROM inventory WHERE inventory_id = ?");
			$delete->execute(array($inventory['inventory_id']));
		}

		$addstock = $pdo->prepare("INSERT INTO stock(storeid, prod_id, deducted, trans_date) VALUES(?, ?, ?, ?)");
		$addstock->execute(array($storeid, $prod_id, $pullout_quantity, $pullout_date));

		$pullout = $pdo->prepare("INSERT INTO pullout(storeid, prod_id, pullout_quantity, pullout_date, details, comment) VALUES(?, ?, ?, ?, ?, ?)");
		$pullout->execute(array($storeid, $prod_id, $pullout_quantity, $pullout_date, $details, $comment));
		header("location: ../admin/pulloutlist.php");
	}	
?>