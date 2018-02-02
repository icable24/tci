<?php 
	include('../database.php');

	if(isset($_GET['id'])){
		$prod_id = $_REQUEST['id'];

		$pdo = Database::connect();
		$remove = $pdo->prepare("DELETE FROM compare WHERE prod_id = ?");
		$remove->execute(array($prod_id));
		header("location: ../compare.php");
	}else{
		header("location: ../compare.php");
	}
?>