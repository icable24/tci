<?php 
 include("database.php");
 include("head.php");
?>

<!DOCTYPE html>
<html>
<?php 
	include("header.php");

	 $pdo = Database::connect();

	 if(isset($_GET['id'])){
	 	$order_id = $_REQUEST['id'];

	 	$user_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
	 	$user_id->execute(array($_SESSION['login_username']));
	 	$user_id = $user_id->fetch();

	 	$order = $pdo->prepare('SELECT * FROM orders WHERE order_id = ?');
	 	$order->execute(array($order_id));
	 	$order = $order->fetch();

	 	$payment = $pdo->prepare("SELECT * FROM paymenthistory WHERE order_id = ?");
	 	$payment->execute(array($order_id));
	 	$payment = $payment->fetch();

	 	$carrier = $pdo->prepare("SELECT * FROM carrier WHERE order_id = ?");
	 	$carrier->execute(array($order_id));
	 	$carrier = $carrier->fetch();

	 	$discount = $pdo->prepare("SELECT * FROM discount WHERE order_id = ?");
	 	$discount->execute(array($order_id));
	 	$discount = $discount->fetch();
	 }else{
	 	header("location: orderhistory.php");
	 }
?>
<body>
	<div class="alert-success">
		<div class="container">
			<h3 style="font-family: verdana;">Order# <?php echo $order['order_id'] ?><?php if($order['order_finish'] == 'Pending'){ echo "
					<span class='pull-right'>Cancel Order: <a href='php/cancelorder.php?id=$order_id' class='btn btn-danger'>Cancel</a></span>
				";} ?><span class="pull-right">Status: <?php echo $order['order_finish'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</span></h3>

		</div>
	</div>
	<div class="container">
		<div class="check">
			<?php 
				$cart = $pdo->prepare("SELECT * FROM cart WHERE order_id = ?");
				$cart->execute(array($order['order_id']));
				$cart = $cart->fetchAll();
				$ct = 0;

				foreach($cart as $row){
					$product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
					$product->execute(array($row['prod_id']));
					$product = $product->fetch();

					$prodName = $product['prod_name'];
					$prodCode = $product['prod_code'];
					$prodImg = "prod_img/" . $product['prod_image'];
					$prodPrice = $product['prod_price'];
					$quantity = $row['quantity'];

					$ct++;
					echo"
                		<div class='col-md-6'>
                			<div class='cart-item'>
								 <img src='$prodImg' alt='' style='height:120px;width:120px;'/>
							</div>
							<div class='cart-item-info'>
								<h3><a href='#'>$prodName</a><span>Product Code: $prodCode</span></h3>
								<ul class='qty'>
									<li><p>Individual Price  :  $prodPrice</p></li>
									<div class='clearfix'></div>
									<li><p>Quantity  :  $quantity</p></li>
								</ul>	
						    </div>
                		</div>	
					";

					if($ct % 2 == 0){
						echo "<br><br><br><br><br><br><br><br>";
					}
				}
			?>
		</div>
		<br><br><br><br><br><br>
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<h3>Amount</h3>
					</div>
					<div class="col-md-6">
						<h4><?php echo "Php " . number_format($order['order_amount'],2); ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h3>Discount</h3>
					</div>
					<div class="col-md-6">
						<h3><?php if($order['discount_amount'] > 0){echo $discount['discount'] . "%";}else{echo "----";} ?></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6">
						<h3><?php if($order['discount_amount'] > 0){echo "Php " . number_format($discount['amount'], 2);}else{echo "----";} ?></h3>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">
						<h3>Discounted Amount: </h3>
					</div>
					<div class="col-md-6">
						<h4><?php if($order['discount_amount']> 0){echo "Php " . number_format($order['discount_amount'],2 		);}else{echo "Php " . number_format($order['order_amount'],2);}
						 ?></h4>
					</div>
				</div>
				<div class="clearfix"></div><br>
				<div class="row">
					<div class="col-md-6">
						<h2>Delivery Details: </h2>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<h3>Delivery Address:</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4><?php echo $order['shippingaddress'] . ', ' .$order['city'] . ', ' . $order['state'] . ', '. $order['country']; ?></h4>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<h3>Delivery Date: </h3>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<h4><?php if($order['order_finish'] == 'Pending' && $order['order_finish'] != 'Processing'){
							echo "N/A";}else{
							echo date("F j, Y", strtotime($order['date_finished']));							
						} ?></h4>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<h3>Payment History</h3>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Account Number</h4>
					</div>
					<div class="col-md-6">
						<h4><?php if($payment){echo $payment['account_num'];} ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Amount</h4>
					</div>
					<div class="col-md-6">
						<h4><?php if($payment){echo "Php " . number_format($payment['amount'],2);} ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Payment Date</h4>
					</div>
					<div class="col-md-6">
						<h4><?php if($payment){echo date("F j, Y", strtotime($payment['pay_date']));} ?></h4>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<h3>Carrier Details</h3>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Waivel No.</h4>
					</div>
					<div class="col-md-6">
						<h4><?php if($carrier){echo $carrier['waivel_number'];} ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Carrier Name</h4>
					</div>
					<div class="col-md-6">
						<h4><?php if($carrier){echo $carrier['carrier_name'];} ?></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br>
	<?php include("footer.php"); ?>
</body>
</html>