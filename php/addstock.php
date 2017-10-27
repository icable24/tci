<?php 
	require('../database.php');

	echo $id = $_POST['prod_id'];

		$pdo = Database::connect();
		$prod_stock = $_POST['prod_stock'];

		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 		$sql = "UPDATE product  SET prod_stock = ?  WHERE prod_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($prod_stock, $id));
        Database::disconnect();
		// header('Location: ../viewinventory.php');
?>