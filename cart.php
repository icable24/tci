<?php 
	session_start();
	require('database.php');

	// var_dump($_SESSION['cart']);
	// var_dump($_SESSION['quantity']);
	
	$pdo = Database::connect();
	$price = 0;
	foreach($_SESSION['cart'] as $prod){
		$product = $pdo->prepare("SELECT * FROM product WHERE prod_code = ?");
		$product->execute(array($prod));
		$product = $product->fetch();

		$price += $product['prod_price'];
	}
	echo $price;
	
?>