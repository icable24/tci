<?php 
	require '../database.php';

	$id = $_POST['cust_id'];
    if ( !empty($id)) {

	$pdo = Database::connect();
	$cust_name = $_POST['cust_name'];
	$cust_address = $_POST['cust_address'];
	$cust_email=$_POST['cust_email'];
	$cust_password = $_POST['cust_password'];
	$cust_conpassword = $_POST['cust_conpassword'];
	$cust_contactnumber = $_POST['cust_contactnumber'];
	$buy_agent = $_POST['buy_agent'];
	$cust_gender=$_POST['cust_gender'];
	

	$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 	$sql = "UPDATE customer  SET cust_name = ?, cust_address = ?, cust_email = ?,cust_password = ?, cust_conpassword = ?, cust_contactnumber = ?, buy_agent = ?, cust_gender=?  WHERE cust_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($cust_name, $cust_address, $cust_email, $cust_password, $cust_conpassword, $cust_contactnumber, $buy_agent, $cust_gender, $id));
        Database::disconnect();
		header("Location: ../customerlist.php?id=$id");

  }

?>