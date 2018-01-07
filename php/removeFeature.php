<?php 
	include("../database.php");

	if(!empty($_GET['id'])){
		$prod_code = $_REQUEST['id'];

		$pdo  = Database::connect();

		$remove = $pdo->prepare("DELETE FROM featuredprod WHERE prod_id LIKE ?");
		$remove->execute(array($prod_code));

		header("location: ../admin/featuredproduct.php");
	}else{
		header("location: ../admin/featuredproduct.php");
	}
?>