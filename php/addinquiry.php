<?php
	require '../database.php';

	if(!empty($_POST)){
		$acc_name = $_POST['acc_name'];
		$acc_email = $_POST['acc_email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
               
		

                
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO inquiry (acc_name, acc_email, subject, message) values(?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($acc_name, $acc_email, $subject, $message));
                Database::disconnect();
                header("Location: ../index.php");
                
        }
?>