<?php 

	$_SESSION("user_name") = $user_name;
	$pdo = Database::connect();
	$name = $pdo->prepare("SELECT * FROM account WHERE  username like '$user_name'");
	$name->execute();
	$name = $name->fetch(PDO::FETCH_ASSOC);

?>