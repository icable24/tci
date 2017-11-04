<?php 
	include '../database.php';
	

	$pdo = Database::connect();
	$prod_name = $_POST['prod_name'];
	$pf_name = $_POST['pf_name'];
	$prod_price = $_POST['prod_price'];
	$pc_name = $_POST['pc_name'];
	$prod_desc = $_POST['prod_desc'];
	$pg_name = $_POST['pg_name'];
	$prod_length = $_POST['prod_length'];
	$prod_width = $_POST['prod_width'];
	$prod_height = $_POST['prod_height'];
	$prod_stock= $_POST['prod_stock'];
	$prod_image = $_FILES['image']['name'];
	$destination = "../prod_img/".basename($_FILES['image']['name']);
	$file = $_FILES['image']['tmp_name'];
	// $prod_image=$_POST['prod_image'];

	// $query = $pdo->prepare("SELECT pf_id FROM productfinish WHERE pf_name = ?");
	// $query->execute(array($pf_name));
	// $pf = $query->fetch(PDO::FETCH_ASSOC);

	// $query = $pdo->prepare("SELECT pc_id FROM productcategory WHERE pc_name = ?");
	// $query->execute(array($pc_name));
	// $pc = $query->fetch(PDO::FETCH_ASSOC);

	// $query = $pdo->prepare("SELECT pg_id FROM productgroup WHERE pg_name = ?");
	// $query->execute(array($pg_name));
	// $pg = $query->fetch(PDO::FETCH_ASSOC);

	// $query = $pdo->prepare("INSERT INTO product(prod_name, prod_desc, prod_price, prod_length, prod_width, prod_height, pf_id, pc_id, pg_id, prod_stock, prod_image) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	// $query->execute(array($prod_name, $prod_desc, $prod_price, $prod_length, $prod_width, $prod_height, $pf['pf_id'], $pc['pc_id'], $pg['pg_id'], $prod_stock, $prod_image));	
	// move_uploaded_file($file, $destination);

	echo $prod_name;
	echo $pf_name;

	?>