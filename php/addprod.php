<?php 
	include '../database.php';
	

	$pdo = Database::connect();
	//variables
	$prod_code = $_POST['prod_code'];
	$prod_name = $_POST['prod_name'];
	$pf_name = $_POST['pf_name'];
	$prod_price = $_POST['prod_price'];
	$pc_name = $_POST['pc_name'];
	$prod_desc = $_POST['prod_desc'];
	$prod_image = $_FILES['prod_image']['name'];
	$target_dir = "../prod_img/";
	$target_file = $target_dir . basename($_FILES['prod_image']['name']);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	$prod_length = "";
	$prod_width = "";
	$prod_height = "";
	$prod_diameter = "";
	$prod_height2 = "";

	if(isset($_POST['prod_height']) || isset($_POST['prod_width']) || isset($_POST['prod_length'])){
	$prod_length = $_POST["prod_length"];
	$prod_width = $_POST["prod_width"];
	$prod_height = $_POST["prod_height"];
	}

	// check if variable is set
	if(isset($_POST['prod_diameter']) || isset($_POST['prod_height2'])){
		$prod_diameter = $_POST["prod_diameter"];
		$prod_height2 = $_POST["prod_height2"];	
	}

	//check in database where product finish is equals to input finish
	$query = $pdo->prepare("SELECT pf_id FROM productfinish WHERE pf_name = ?");
	$query->execute(array($pf_name));
	$pf = $query->fetch(PDO::FETCH_ASSOC);
	// check in database where product category equals to input category
	$query = $pdo->prepare("SELECT pc_id FROM productcategory WHERE pc_name = ?");
	$query->execute(array($pc_name));
	$pc = $query->fetch(PDO::FETCH_ASSOC);

	//prepares sql to store data in databse
	$query = $pdo->prepare("INSERT INTO product(prod_code, prod_name, pf_name, prod_price, pc_name, prod_desc, prod_image, prod_length, prod_width, prod_height, prod_diameter, prod_height2) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");

	//execute sql statement to store into database
	$query->execute(array($prod_code, $prod_name, $pf['pf_id'], $prod_price, $pc['pc_id'], $prod_desc, $prod_image, $prod_length, $prod_width, $prod_height, $prod_diameter, $prod_height2));	
	if(move_uploaded_file($_FILES['prod_image']['tmp_name'], $target_file)){
		echo header("Location: ../admin/productlist.php");
	}else{
		echo "Not Uploaded";
	}

	?>