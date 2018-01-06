<?php 
	include('../database.php');

	$pdo = Database::connect();

	if(!empty($_GET['prod_id'])){
		$prod_id = $_REQUEST['prod_id'];

		$featured = $pdo->prepare("SELECT * FROM featuredprod WHERE prod_id = ?");
		$featured->execute();
		$featured = $featured->fetch();

		var_dump($featured);
	}else{
		header("location: ../admin/productdetails.php");
	}
?>