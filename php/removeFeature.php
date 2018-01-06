<?php 
	include("../database.php");

	if(!empty($_GET['id'])){
		$prod_code = $_REQUEST['id'];


	}else{
		header("location: ../admin/featuredproduct.php");
	}
?>