<?php 
	include("../database.php");
	include("../login_success.php");

	if(isset($_GET['id'])){
		$id = $_REQUEST['id'];

		$pdo = Database::connect();

		$inventory = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ?");
		$inventory->execute(array($id));
		$inventory = $inventory->fetchAll();

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
						<th>Store Location</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($inventory as $row){
							$prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
							$prod->execute(array($row['prod_id']));
							$prod = $prod->fetch();

							$prod_name = $prod['prod_name'];
							$store = $pdo->prepare("SELECT * FROM store WHERE storeid = ?");
							$storeid = $row["storeid"];
							$store->execute(array($storeid));
							$store = $store->fetch();
							$storename = $store['storename'];
							$quantity = $row['quantity'];
							echo "
								<tr>
									<td>$prod_name</td>
									<td>$storename</td>
									<td>$quantity</td>
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