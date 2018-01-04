<?php 
	include('../database.php');

	$pdo = Database::connect();

	if(!empty($_GET['prod_id'])){
		$prod_id = $_REQUEST['prod_id'];

		$check = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM featuredprod");
		$check->execute();
		$check = $check->fetchAll();
		if($check > 5){
			$notFeatured = $pdo->("SELECT SQL_CALC_FOUND_ROWS * FROM featured")
			$feature = $pdo->prepare("INSERT INTO featuredprod(prod_id) VALUES (?)");
			$feature->execute(array($prod_id));
		}elseif(!empty($_GET['type'])){
			$type = $_REQUEST['type'];
			if($type == '1'){
				header("Location: ../admin/productlist.php");
			}else{
				header("Location: ../admin/featuredproduct.php");
			}		
			echo $type;
		}
		echo $prod_id;
	}
?>