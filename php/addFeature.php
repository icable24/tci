<?php 
	include('../database.php');

	$pdo = Database::connect();

	if(!empty($_GET['id'])){
		$prod_id = $_REQUEST['id'];

		$featured = $pdo->prepare("SELECT count(*) FROM featuredprod WHERE prod_id = ?");
		$featured->execute(array($prod_id));
		$featured = $featured->fetchAll();

		if($featured > 0){
			header("location: ../admin/featuredproduct.php?error=1");
		}
	}else{
		header("location: ../admin/productlist.php");
	}
?>