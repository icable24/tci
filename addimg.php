<?php 
	require "database.php";

	$pdo = Database::connect();
?>
<!DOCTYPE html>
<html>
<body>
	<form enctype="multipart/form-data" method="post" action="php/test.php">
		<input type="hidden" name="size" value="1000000">
		<input type="file" name="image">
		<button type="Submit" name="submit">Submit</button>	
	</form>
</body>
</html>