<?php 
	include '../database.php';

	$pdo = Database::connect();
	$emp_name = $_POST['emp_name'];
	$emp_address = $_POST['emp_address'];
	$emp_email=$_POST['emp_email'];
	$emp_password = $_POST['emp_password'];
	$emp_conpassword = $_POST['emp_conpassword'];
	$emp_position = $_POST['emp_position'];
	$emp_gender = $_POST['emp_gender'];

	$query = $pdo->prepare("INSERT INTO employee(emp_name, emp_address, emp_email, emp_password, emp_conpassword, emp_position, emp_gender) VALUES(?, ?, ?, ?, ?, ?, ?)");
	$query->execute(array($emp_name, $emp_address, $emp_email, $emp_password, $emp_conpassword, $emp_position, $emp_gender));	

	header('Location: ../employeelist.php');
?>