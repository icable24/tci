<?php
	require '../database.php';

	if(!empty($_POST)){
		$acc_name = $_POST['acc_name'];
		$acc_email = $_POST['acc_email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $getDate = getDate();

                $Date = $getDate['year']. '-' . $getDate['mon']. '-' . $getDate['mday']; 

                //$date = $getDate['year']. '-' . $getDate['mon']. '-' . $getDate['mday']; 
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO inquiry (acc_name, acc_email, subject, message, date) values(?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($acc_name, $acc_email, $subject, $message, $Date));
                Database::disconnect();
                header("Location: ../contactUS.php"); 
        }
?>