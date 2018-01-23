<?php 
	include('../login_success.php');
 	include('../database.php');

 	$pdo = Database::connect();

 	if(isset($_GET['id'])){
 		$order_id = $_GET['id'];
 	}else{
 		header("location: orderlist.php");
 	}

 	$setViewed = $pdo->prepare("UPDATE orders SET isViewed = ? WHERE order_id = ?");
 	$setViewed->execute(array(1, $order_id));
?>
<!DOCTYPE html>
<style type="text/css">
	.img-class{
		width:75px;
		height: 75px;
	}
</style>
<html>
<?php 
	include("head.php");
?>
<body>
<?php
	include("sidenavbar.php");
?>
	<div class="page home-page">
		<?php 
			include("header.php"); 

			$pdo = Database::connect();

			$order = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
			$order->execute(array($order_id));
			$order = $order->fetch();
			$date = strtotime($order['date_ordered']);

			$customer = $pdo->prepare("SELECT * FROM account WHERE acc_id = ?");
			$customer->execute(array($order['acc_id']));
			$customer = $customer->fetch();
		?>
		<br><br>
		<div class="container-fluid">
			<div class="row">	
				<div class="col-6">	
					<div class="alert alert-success">
						<h1>Order # <?php echo $order['order_id']; ?></h1>
						<div class="card-block">
							<div class="row">
								<div class="col-5">
									<h3>Order Date:</h3>
								</div>
								<div class="col-7">
									<h3><?php echo 	date("F j, Y", $date);  ?></h3>
								</div>		
							</div>
							<div class="row">
								<div class="col-5">
									<h3>Order Status:</h3>
								</div>
								<div class="col-7">
									<h3><?php echo 	$order['order_finish']  ?></h3>
								</div>		
							</div>			
						</div>
					</div>
					<div class="alert alert-success">
						<h1>Account Information</h1>
						<div class="card-block">
							<div class="row">
								<div class="col-5">
									<h3>Customer Name:</h3>
								</div>
								<div class="col-7">
									<h3><?php echo $customer['acc_fname']. ' ' . $customer['acc_lname'];  ?></h3>
								</div>		
							</div>
							<div class="row">
								<div class="col-5">
									<h3>Email:</h3>
								</div>
								<div class="col-7">
									<h3><?php echo $customer['acc_email'];  ?></h3>
								</div>		
							</div>
							<div class="row">
								<div class="col-5">
									<h3>Customer Type:</h3>
								</div>
								<div class="col-7">
									<h3><?php echo $customer['user_type'];  ?></h3>
								</div>		
							</div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="alert alert-success">
						<h1>Delivery Address</h1>
						<div class="card-block">
							<h3><?php echo $customer['acc_fname'] . ' ' . $customer['acc_lname']; ?></h3>
							<h3><?php echo $order['shippingaddress']; ?></h3>
							<h3><?php echo $order['city']; ?></h3>
							<h3><?php echo $order['zip_code'] . ', ' . $order['state']; ?></h3>
							<h3><?php echo $order['country']; ?></h3>
						</div>
					</div>
				</div>	
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-12">	
				<div class="alert alert-success">
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th>Product ID</th>
							<th>Image</th>
							<th>Product Name</th>
							<th>Unit Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$item = $pdo->prepare("SELECT * FROM cart WHERE order_id = ?");
							$item->execute(array($order_id));
							$item = $item->fetchAll();

							$grandTotal = 0;

							foreach($item as $row){
								$prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
								$prod->execute(array($row['prod_id']));
								$prod = $prod->fetch();

								$prod_id = $prod['prod_code'];
								$prod_name = $prod['prod_name'];
								$prod_price = "Php " . number_format($prod['prod_price'], 2);
								$quantity = $row['quantity'];
								$total = "Php " . number_format($prod['prod_price'] * $quantity, 2);
								$grandTotal += $prod['prod_price'] * $quantity;
								$prod_image = "../prod_img/" . $prod['prod_image'];

								echo "
									<tr>
										<td>$prod_id</td>
										<td><img class='img-class' src='$prod_image'/></td>
										<td>$prod_name</td>
										<td>$prod_price</td>
										<td>$quantity</td>
										<td class='pull-right'>$total</td>
									</tr>		
								";
							}
						?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Grand Total: 		</td>
							<td class="pull-right"><?php echo "Php " . number_format($grandTotal, 2); ?></td>
						</tr>
					</tbody>
				</table>
				</div>	
				</div>		
			</div>			
		</div>
		<?php include("footer.php"); ?>
	</div>	
	<?php include("js.php"); ?>
</body>
</html>