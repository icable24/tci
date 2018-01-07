<?php 
	include('../database.php');

	$pdo = Database::connect();

	if(!empty($_GET['id'])){
		$prod_id = $_REQUEST['id'];

		$featured = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM featuredprod WHERE prod_id = ?");
		$featured->execute(array($prod_id));
		$featured = $featured->fetchAll();

		if($featured["featured_id"] > 0){
				echo "wala";
		}else{
			$prods = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM featuredprod");
			$prods->execute();
			$prods = $prods->fetchAll();
			var_dump($prods);
			if($prods < 5){
				$insert = $pdo->prepare("INSERT INTO featuredprod(prod_id) VALUES(?)");
				$insert->execute(array($prod_id));
				header("location: ../admin.featuredproduct.php");
			}else{
				header("location: ../admin/productlist.php");
			}
		}
	}else{
		header("location: ../admin/productlist.php");
	}
?>