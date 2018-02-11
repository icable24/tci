<?php 
	include('../login_success.php');
  	include('../database.php');

  	$pdo = Database::connect();

  	if(isset($_GET['id'])){
  		$id = $_REQUEST['id'];

  		$inventory = $pdo->prepare("SELECT * FROM inventory JOIN product ON inventory.prod_id = product.prod_id WHERE inventory_id = ?");
  		$inventory->execute(array($id));
  		$inventory = $inventory->fetch();

  		$store = $pdo->prepare("SELECT * FROM store WHERE storeid = ?");
  		$store->execute(array($inventory['storeid']));
  		$store = $store->fetch();
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
	        <div class="container-fluid">
	        	<div class="offset-3 col-6">
	          		<div class="alert alert-success">
	            		<h1>Pull Out Inventory</h1>
	            		<div class="card-block">
	            			<div class="offset-9">
			                  <a href="inventorylist.php" class="btn btn-primary">Add Product</a>
			                </div>
	            			<form action="../php/pulloutinv.php" method="post" enctype="multipart/form">
	            				<input type="hidden" name="inventory_id" id="inventory_id" value="<?php echo $id; ?>">
	            				<input type="hidden" name="prod_id" id="prod_id" value="<?php echo $inventory['prod_id']; ?>">
	            				<input type="hidden" name="storeid" id="storeid" value="<?php echo $inventory['storeid']; ?>">
	            				<div class="control-group">
	            					<label class="control-label">Product Name</label>
	            					<input type="text" class="form-control" disabled value="<?php if(isset($id)){ echo $inventory['prod_name'];} ?>">
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Quantity</label>
	            					<input type="Number" class="form-control" disabled value="<?php if(isset($id)){ echo $inventory['quantity'];} ?>">
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Store Location</label>
	            					<input type="text" class="form-control" disabled="" value="<?php if(isset($id)){ echo $store['storename'];} ?>">
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Pull Out Quantity</label>
	            					<input type="Number" min="1" max="<?php if(isset($id)){echo $inventory['quantity'];} ?>" class="form-control" name="pullout_quantity" id="pullout_quantity" required>
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Pull Out Date</label>
	            					<input type="Date" class="form-control" name="pullout_date" id="pullout_date" required="">
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Details</label>
	            					<select type="Date" class="form-control" name="details" id="details" required="">
	            						<option></option>
	            						<option>Product Sold</option>
	            						<option>Returned to Warehouse</option>
	            					</select>
	            				</div>
	            				<div class="clearfix"><br></div>
	            				<div class="text-center">
	            					<button type="submit" class="btn btn-success">Submit</button>
	            					<a href="inventorylist.php" class="btn btn-secondary">Cancel</a>
	            				</div>
	            			</form>
	            		</div>
	            	</div>
	            </div>
	        </div>
		<?php include("footer.php"); ?>
	</div>
	<?php include("js.php"); ?>
</body>
</html>