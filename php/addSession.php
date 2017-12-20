<?php 
session_start();

if(!empty($_GET['id'])){
	$prod_code = $_REQUEST['id'];
}elseif(!empty($_POST['compProd'])){
	$prod_code = $_POST['compProd'];
}else{
	//header("location: ../index.php");
}

if(!empty($_GET['type'])){
	$type = $_REQUEST['type'];
}
	if($type == "cart"){
		$quantity = $_POST['quantity'];

		if(empty($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		if(empty($_SESSION['quantity'])){
			$_SESSION['quantity'] = array();
		}

		array_push($_SESSION['cart'], $prod_code);
		array_push($_SESSION['quantity'], $quantity);
	}elseif($type == "compare"){
		if(empty($_SESSION['compare'])){
			$_SESSION['compare']= array();
		}
		$prod_code = $_POST['compProd'];
		array_push($_SESSION['compare'], $prod_code);
	}

	header("location:../productdetails.php?id=".$prod_code ."");
?>