<?php 
	require '../database.php';

	$id = $_POST['emp_id'];
    if ( !empty($id)) {

	

	$pdo = Database::connect();
	$emp_name = $_POST['emp_name'];
	$emp_address = $_POST['emp_address'];
	$emp_email=$_POST['emp_email'];
	$emp_password = $_POST['emp_password'];
	$emp_conpassword = $_POST['emp_conpassword'];
	$emp_position = $_POST['emp_position'];
	$emp_gender =$_POST['emp_gender'];

	$qpdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 	$sql = "UPDATE employee  SET emp_name = ?, emp_address = ?, emp_email = ?,emp_password = ?, emp_conpassword = ?, emp_position=?, emp_gender=? WHERE emp_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($emp_name, $emp_address, $emp_email, $emp_password, $emp_conpassword, $emp_position, $emp_gender, $id));
        Database::disconnect();
		header('Location: ../employeelist.php');

	}

?>

	