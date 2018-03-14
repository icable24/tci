<?php 
	include("../login_success.php");
	include("../database.php");

	$pdo = Database::connect();

	$pullout = $pdo->prepare("SELECT * FROM pullout JOIN product ON pullout.prod_id = product.prod_id");
	$pullout->execute();
	$pullout = $pullout->fetchAll();

?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>
	<?php include("sidenavbar.php"); ?>
	<div class="page home-page">
		<?php include("header.php"); ?>
		<div class="container">
			<br><br>
			<h1>Pull Out List</h1>
			<table class="table">
				<thead>
					<tr class="alert-success">
						<th>Product Name</th>
						<th>Pull Out Quantity</th>
						<th>Pullout Date</th>
						<th>Details</th>
						<th>Comments</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($pullout as $row){
							$prod_name = $row['prod_name'];
							$pullout_quantity = $row['pullout_quantity'];
							$pullout_date = date("F j, Y", strtotime($row['pullout_date']));
							$details = $row['details'];
							$comment = $row['comment'];

							echo "
								<tr>
									<td>$prod_name</td>
									<td>$pullout_quantity</td>
									<td>$pullout_date</td>
									<td>$details</td>
									<td>$comment</td>
								</tr>
							";
						}
					?>
				</tbody>
			</table>
		</div>		
		<?php include("footer.php"); ?>
	</div>
	<?php include("js.php"); ?>
</body>
</html>