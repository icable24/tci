<?php 
	require('../database.php');

	$id = $_POST['prod_id'];
    if ( !empty($id)) {

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

	$query = $pdo->prepare("SELECT pf_id FROM productfinish WHERE pf_name = ?");
	$query->execute(array($pf_name));
	$pf = $query->fetch(PDO::FETCH_ASSOC);

	$query = $pdo->prepare("SELECT pc_id FROM productcategory WHERE pc_name = ?");
	$query->execute(array($pc_name));
	$pc = $query->fetch(PDO::FETCH_ASSOC);

	$query = $pdo->prepare("SELECT pg_id FROM productgroup WHERE pg_name = ?");
	$query->execute(array($pg_name));
	$pg = $query->fetch(PDO::FETCH_ASSOC);

	$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "UPDATE product  SET prod_name = ?, pf_id = ?, prod_price = ?, pc_id = ?, prod_desc = ?, pg_id = ?, prod_length = ?, prod_width = ?, prod_height = ?  WHERE prod_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($prod_name, $pf['pf_id'], $prod_price, $pc['pc_name'], $prod_desc, $pg['pg_name'], $prod_length, $prod_width, $prod_height, $id));
        Database::disconnect();
		header("Location: ../productlist.php?id=$id");
	}
?>