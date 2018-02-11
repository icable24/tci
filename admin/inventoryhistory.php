<?php 
	include("../database.php");
	include("../login_success.php");

	if(isset($_GET['id'])){
		$id = $_REQUEST['id'];

		$pdo = Database::connect();
		$inventory = $pdo->prepare("SELECT * FROM inventory JOIN product ON inventory.prod_id = product.prod_id WHERE inventory_id = ?");
		$inventory->execute(array($id));
		$inventory = $inventory->fetch();
		$prod_id = $inventory['prod_id'];
		$storeid = $inventory['storeid'];

		$stock = $pdo->prepare("SELECT * FROM stock WHERE prod_id = ? AND storeid =? ORDER BY trans_date");
		$stock->execute(array($prod_id, $storeid));
		$stock = $stock->fetchAll();

	}else{
		header("location: inventorylist.php");
	}
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>
<?php include("sidenavbar.php"); ?>
	<div class="page home-page">
		<?php include("header.php"); ?>
		<br>
		<div class="container">
			<h1>Inventory History</h1>
			<br>
			<table class="table">
				<thead>
					<tr class="alert alert-success">
						<th>Product Name</th>
						<th>Quantity Added</th>
						<th>Quantity Pullout</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($stock as $row){
							$prod_name = $inventory['prod_name'];
							$added = $row['added'];
							$deducted = $row['deducted'];
							$trans_date = date("F j, Y", strtotime($row['trans_date']));

							echo "
								<tr>
									<td>$prod_name</td>
									<td>$added</td>
									<td>$deducted</td>
									<td>$trans_date</td>
								</tr>
							";
						}
					?>
					<tr>
						<td></td>
						<td></td>
						<td>Total Quantity</td>
						<td><?php echo $inventory['quantity']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php include("footer.php"); ?>
	</div>
<?php include("js.php"); ?>
</body>
</html>