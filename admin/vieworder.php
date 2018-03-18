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

 	$checkhist = $pdo->prepare("SELECT * FROM paymenthistory WHERE order_id = ?");
 	$checkhist->execute(array($order_id));
 	$checkhist = $checkhist->fetch();

 	$courierinfo = $pdo->prepare("SELECT * FROM courier WHERE order_id = ?");
 	$courierinfo->execute(array($order_id));
 	$courierinfo = $courierinfo->fetch();
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
			$dateOrdered = strtotime($order['date_ordered']);
			$dateFinished = strtotime($order['date_finished']);

			$customer = $pdo->prepare("SELECT * FROM account WHERE acc_id = ?");
			$customer->execute(array($order['acc_id']));
			$customer = $customer->fetch();

			if($order['discount_amount'] > 0){
				$discount = $pdo->prepare("SELECT * FROM discount WHERE order_id = ?");
				$discount->execute(array($order_id));
				$discount = $discount->fetch();
			}
		?>
		<br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="offset-10 col-2 text-right">
					<a href="orderlog.php?id=<?php echo $order_id; ?>" class="btn btn-success">History</a>
				</div>
			</div>
			<br>
			<div class="clearfix"></div>
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
										<h3><?php echo 	date("F j, Y", $dateOrdered);  ?></h3>
									</div>		
								</div>
								<?php if($order['order_finish'] != 'Cancelled'){ ?>
								<?php if($order['order_finish'] == 'Delivery' || $order['order_finish'] == 'Delivered'){ ?>
									<div class="row">
									<div class="col-5">
										<h3>Delivery Date:</h3>
									</div>
									<div class="col-7">
										<h3><?php echo 	date("F j, Y", $dateFinished);  ?></h3>
									</div>		
								</div>
								<?php } ?>
							<form action=" <?php echo '../php/updateorder.php?id='. $order_id?>" id="myform" name="myform" enctype="multipart/form-data" method="post">
								<div class="row">
									<div class="col-5">
										<h3>Order Status:</h3>
									</div>
									<div class="col-7">
										<?php if($order['order_finish'] == 'Pending'){
											echo "
												<select id='order_finish' name='order_finish' class='form-control' required onchange='showDate()'>
													<option selected value='Pending'>Pending</option>
													<option value='Processing'>Processing</option>
												</select>
											";
											} elseif($order['order_finish'] == 'Processing'){
												echo "
												<select id='order_finish' name='order_finish' id='order_finish' class='form-control' required onchange='showDate()'>
													<option selected value='Processing'>Processing</option>
													<option value='Delivery'>Delivery</option>
												</select>
											";
											}elseif($order['order_finish'] == 'Delivery'){
												echo "
												<select id='order_finish' name='order_finish' class='form-control' required>
													<option selected>Delivery</option>
													<option>Delivered</option>
												</select>
											";
											}elseif($order['order_finish'] == 'Delivered'){
												echo "<h3>Delivered</h3>";
											}
										?>
									</div>		
								</div>
								<?php if($order['order_finish'] != "Delivered"){ ?>
								<div class="row" style="display: none;" id='finished'>
									<div class="col">
										<h3>Delivery Date:</h3>
									<input type="date" name="date_finished" id="date_finished" class="form-control" value="<?php echo $order['date_finished'] ?>">
									</div>
								</div>
								<div class="clearfix"></div><br>
								<div class="row">
									<div class="offset-9"><button type="submit" class="btn btn-success">Update</button></div>
								</div>	
								<?php } ?>
								<?php }else{?>
									<div class="row">
										<div class="col-5">
											<h3>Order Status:</h3>
										</div>
										<div class="col-7">
											<h3>Cancelled</h3>
										</div>		
									</div>
								<?php } ?>
							</form>	
							<div class="clearfix"></div>
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
					<div class="clearfix"></div>
					<div class="alert alert-success">
						<?php if($order['order_finish'] != 'Cancelled'){ ?>
							<h1>courier Information
								<?php if(!($courierinfo)){ ?>
								<span class="pull-right">
									<a href='addcourier.php?id=<?php echo $order_id ?>' class='btn btn-success btn-md' data-toggle='tooltip' title='Add'><span>Add</span></a>
								</span>
								<?php } ?>
							</h1>
							<div class="card-block">
								<div class="row">
									<div class="col-5">
										<h3>Shipping Courier Name: </h3>
									</div>
									<div class="col-7">
										<?php echo $courierinfo['courier_name'] ?>
									</div>
								</div>
								<div class="row">
									<div class="col-5">
										<h3>Waybill No. </h3>
									</div>
									<div class="col-7">
										<?php echo $courierinfo['waybill_number'] ?>
									</div>
								</div>
								<div class="row">
									<div class="col-5">
										<h3>Delivery Range </h3>
									</div>
									<div class="col-7">
										<?php echo $courierinfo['delivery_range'] ?>
									</div>
								</div>
							</div>					
						<?php } ?>
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
					<div class="clearfix"></div>
					<div class="alert alert-success">
						<?php if($order['order_finish'] != 'Cancelled'){ ?>
							<h1>Payment History
								<?php if(!($checkhist)){ ?>
								<span class="pull-right">
									<a href='addpayment.php?id=<?php echo $order_id ?>' class='btn btn-success btn-md' data-toggle='tooltip' title='Add'><span>Add</span></a>
								</span>
								<?php } ?>
							</h1>
							<div class="card-block">
								<div class="row">
									<div class="col-5">
										<h3>Account Number: </h3>
									</div>
									<div class="col-7">
										<?php echo $checkhist['account_num'] ?>
									</div>
								</div>
								<div class="row">
									<div class="col-5">
										<h3>Payment Date: </h3>
									</div>
									<div class="col-7">
										<?php if($checkhist){echo date("F j, Y", strtotime($checkhist['pay_date']));} ?>
									</div>
								</div>
								<div class="row">
									<div class="col-5">
										<h3>Amount: </h3>
									</div>
									<div class="col-7">
										<?php if($checkhist){echo "Php " . number_format($checkhist['amount'], 2);} ?>
									</div>
								</div>
							</div>					
						<?php } ?>
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
							<td>Total: 		</td>
							<td class="pull-right"><?php echo "Php " . number_format($grandTotal, 2); ?></td>
						</tr'                                                                          >
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td><a href="adddiscount.php?id=<?php echo $order_id ?>" class="btn btn-success">Add Discount</a></td>
							<td>Discount:</td>
							<td class="pull-right"><?php if($order['discount_amount'] > 0){echo number_format($discount['discount'],2) . "%";}else{echo "0.00%";} ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="pull-right"><?php if($order['discount_amount'] > 0){echo "Php " . number_format($discount['amount'],2);}else{echo "Php 0.00";} ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Grand Total: 		</td>
							<td class="pull-right"><?php if($order['discount_amount'] > 0){echo "Php " . number_format($order['discount_amount'],2);}else{echo "Php " . number_format($grandTotal, 2);} ?></td>
						</tr>
					</tbody>
				</table>
				</div>	
				</div>		
			</div>
								<?php if($order['order_finish'] == 'Delivered' || $order['order_finish'] == "Delivery"){ echo "
						<div class='row'>
							<div class='offset-7 col-3'>
								<h3>Print Delivery Receipt</h3>
							</div>
						<a href='printorder.php?id=$order_id' class='btn btn-info btn-md' data-toggle='tooltip' title='Print'><span class='fa fa-print'>&nbsp;&nbsp;&nbsp; Print</span></a>
						</div>
						<br>
					";} ?>			
		</div>
		<?php include("footer.php"); ?>
	</div>	
	<script type="text/javascript">
		function showDate(){
			var order_finish = document.getElementById("order_finish");
			var date = document.getElementById("finished");

			if(order_finish.value == "Delivery"){
				date.style.display = "block";
			}else if(order_finish.value == "Processing"){
				date.style.display = "block";
			}else{
				date.style.display = "none";
			}
		}
	</script>
	<?php include("js.php"); ?>
</body>
</html>