<?php
	include '../login_success.php';
	include '../database.php';

	$pdo = Database::connect();
	$prod_image = $_FILES['image']['name'];
	echo $destination = "../prod_img/".basename($_FILES['image']['name']);
	echo $file = $_FILES['image']['tmp_name'];

	$query = $pdo->prepare("INSERT INTO product(prod_image) VALUES('$prod_image')");
	$query->execute();
		if(move_uploaded_file($file, $destination)){
		echo "Success!";
		}else{
		echo "Failed!";
		}	

?>