<?php 
	include('../login_success.php');
  	include('../database.php');

  	$pdo = Database::connect();

  	if(isset($_GET['id'])){
  		$id = $_REQUEST['id'];

  		$inventory = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ?");
  		$inventory->execute(array($id));
  		$inventory = $inventory->fetchAll();

  		$prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
  		$prod->execute(array($id));
  		$prod = $prod->fetch();

  		$store = $pdo->prepare("SELECT * FROM store WHERE storeid = ? ORDER BY storeid");
  		$store->execute(array($inventory[0]['storeid']));
  		$store = $store->fetch();

  		$qty1 = $pdo->prepare("SELECT quantity FROM inventory WHERE prod_id = ? AND storeid = 1");
  		$qty1->execute(array($id));
  		$qty1 = $qty1->fetch(); 

  		$qty2 = $pdo->prepare("SELECT quantity FROM inventory WHERE prod_id = ? AND storeid = 2");
  		$qty2->execute(array($id));
  		$qty2 = $qty2->fetch(); 
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
	            				<input type="hidden" name="prod_id" id="prod_id" value="<?php echo $inventory[0]['prod_id']; ?>">
	            				<div class="control-group">
	            					<label class="control-label">Product Name</label>
	            					<input type="text" class="form-control" disabled value="<?php if(isset($id)){ echo $prod['prod_name'];} ?>">
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Store Location</label>
	            					<select class="form-control" name="storeid" id="storeid" required="" onchange="showQuantity()">
	            						<option></option>
	            						<option value="1">G/F Cybergate Center Robinsons, Singcang</option>
	            						<option value="2">ANP, City Walk Robinsons Mall, Mandalagan</option>
	            					</select>
	            				</div>
	            				<div id="quantity_one" style="display:none">
	            				<div class="control-group">
		            					<label class="control-label">Quantity</label>
		            					<input type="text" class="form-control" disabled value="<?php if(isset($id)){ echo $qty1['quantity'];} ?>" id="quan1">
		            				</div>
	            				</div>
	            				<div id="quantity_two" style="display: none">
	            				<div class="control-group">
		            					<label class="control-label">Quantity</label>
		            					<input type="text" class="form-control" disabled value="<?php if(isset($id)){ echo $qty2['quantity'];} ?>" id="quan2">
		            				</div>
		            			</div>
	            				<div class="control-group">
	            					<label class="control-label">Pull Out Quantity</label>
	            					<input type="Number" min="1" class="form-control" name="pullout_quantity" id="pullout_quantity" required>
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Pull Out Date</label>
	            					<input type="Date" class="form-control" name="pullout_date" id="pullout_date" required="">
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Details</label>
	            					<select class="form-control" name="details" id="details" required="">
	            						<option></option>
	            						<option>Product Sold</option>
	            						<option>Returned to Warehouse</option>
	            					</select>
	            				</div>
	            				<div class="control-group">
	            					<label class="control-label">Comments</label>
	            					<textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
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
	<script type="text/javascript">
		function showQuantity(){
			var store = document.getElementById("storeid");
			var quantity_one = document.getElementById("quantity_one");
			var quantity_two = document.getElementById("quantity_two");
			var quanone = document.getElementById("quan1");
			var quantwo = document.getElementById("quan2");
			if(store.value == 1){
				quantity_one.style.display = "block";
				quantity_two.style.display = "none";
				pullout_quantity.max = quanone.value;
			}else if(store.value == 2){
				quantity_one.style.display = "none";
				quantity_two.style.display = "block";
				pullout_quantity.max = quantwo.value;
			}
		}
	</script>
</body>
</html>