<?php 
	include("../database.php");

	if(isset($_GET['id'])){
		$order_id = $_REQUEST['id'];

		$account_num = $_POST['account_num'];
		$pay_date = $_POST['pay_date'];
		$amount = $_POST['amount'];

		$pdo = Database::connect();

		$add = $pdo->prepare("INSERT INTO paymenthistory(account_num, pay_date, amount, order_id) VALUES(?,?,?,?)");
		$add->execute(array($account_num, $pay_date, $amount, $order_id));
		
		header("location: ../admin/vieworder.php?id=" . $order_id);
	}else{
		header("location: ../admin/orderlist.php");
	}
?>