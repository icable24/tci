<?php 
	session_start();

	if(empty($_SESSSION['comp'])){
		$_SESSSION['comp'] = array();
	}

	array_push($_SESSSION['comp'], $_POST['compProd']);
	header("location:../productdetails.php?id=".$_POST['compProd'] ."");
?>comp