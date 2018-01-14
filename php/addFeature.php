<?php 
	include('../database.php');

	$pdo = Database::connect();

	if(!empty($_GET['id'])){
		$prod_id = $_REQUEST['id'];

		$featured = $pdo->prepare("SELECT count(*) FROM featuredprod WHERE prod_id = ?");
		$featured->execute(array($prod_id));
		$featured = $featured->fetch();
		$count = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];

		if($featured['count(*)'] > 0){
			header("location: ../admin/featuredproduct.php?error=1");
		}else{
			$prod_count = $pdo->prepare("SELECT count(*) FROM featuredprod");
			$prod_count->execute();
			$prod_count = $prod_count->fetchAll();
			if($prod_count['count(*)'] < 5){
				$insert = $pdo->prepare("INSERT INTO featuredprod(prod_id) VALUES(?)");
				$insert->execute(array($prod_id));

				header("location: ../admin/featuredproduct.php");
			}
		}
	}else{
		header("location: ../admin/productlist.php");
	}
?>