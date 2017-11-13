<?php 
	require('../database.php');

	if(!empty($_GET['id'])){
		$pdo = Database::connect();
		//variables
		$prod_name = $_POST['prod_name'];
		$pf_name = $_POST['pf_name'];
		$prod_price = $_POST['prod_price'];
		$pc_name = $_POST['pc_name'];
		$prod_desc = $_POST['prod_desc'];
		$prod_image = $_FILES['prod_image']['name'];
		$destination = "../prod_img/".basename($_FILES['prod_image']['name']);
		$prod_length = "";
		$prod_width = "";
		$prod_height = "";
		$prod_diameter = "";
		$prod_height2 = "";

		if($_POST['prod_length'] != '0' && $_POST['prod_width']!= '0' && $_POST['prod_height']!='0'){
		$prod_length = $_POST["prod_length"];
		$prod_width = $_POST["prod_width"];
		$prod_height = $_POST["prod_height"];
		}

		// check if variable is set
		if($_POST['prod_diameter'] != '0' && $_POST['prod_height2'] != '0'){
			$prod_diameter = $_POST["prod_diameter"];
			$prod_height2 = $_POST["prod_height2"];	
		}

		$query = $pdo->prepare("SELECT pf_id FROM productfinish WHERE pf_name = ?");
		$query->execute(array($pf_name));
		$pf = $query->fetch(PDO::FETCH_ASSOC);
		// check in database where product category equals to input category
		$query = $pdo->prepare("SELECT pc_id FROM productcategory WHERE pc_name = ?");
		$query->execute(array($pc_name));
		$pc = $query->fetch(PDO::FETCH_ASSOC);

		$product = $pdo->prepare("UPDATE product SET prod_name = ?, pf_name = ?, prod_price = ?, pc_name = ?, prod_desc = ?, prod_image = ?, prod_length = ?, prod_width = ?, prod_height = ?, prod_diameter = ?, prod_height2 = ? WHERE prod_id = ?");
		$product->execute(array($prod_name, $pf['pf_id'], $prod_price, $pc['pc_id'], $prod_desc, $prod_image, $prod_length, $prod_width, $prod_height, $prod_diameter, $prod_height2, $_GET['id']));
		header('location:../admin/productlist.php');
	}
?>