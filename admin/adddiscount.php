<?php 
	include("../database.php");
	include("../login_success.php");

	$pdo = Database::connect();

	if(isset($_GET['id'])){
		$id = $_REQUEST['id'];

		$order = $pdo->prepare("SELECT * FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE order_id =?");
		$order->execute(array($id));
		$order = $order->fetch();

		$max_amount =  $order['order_amount'] * .30;
		$tprice = $order['order_amount'];
	}else{
		header("location: orderlist.php");
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
				<h1>Add Discount</h1>
				<div class="card-block">
					<form action="../php/adddisc.php" method="post" enctype="multipart/form">
						<input type="hidden" name="order_id" id="order_id" value="<?php echo $id; ?>">
						<div class="row">
							<label class="control-label">Customer Name</label>
							<input class="form-control" type="text" disabled="" value="<?php echo $order['acc_fname'] . " " . $order['acc_lname']; ?>">
						</div>
						<div class="row">
							<label class="control-label">Order ID</label>
							<input type="text" disabled="" value="<?php echo $id; ?>" class="form-control">
						</div>
						<div class="row">
							<label class="control-label">Total Amount</label>
							<input type="Number" class="form-control" disabled="" value="<?php echo $tprice; ?>" >
							<input type="hidden" name="order_amount" id="order_amount" value="<?php echo $tprice; ?>">
						</div>
						<div class="row">
							<label class="control-label" for="Discount">Discount(1-30%)</label>
							<input type="Number" name="discount" id="discount" step="0.01" class="form-control" min="0" max="30" onchange="getAmount(<?php echo $tprice; ?>)" required>
						</div>
						<div class="clearfix"></div>
						<div class="row">
							<label class="control-label" for="">Discount Amount(Peso)</label>
							<input type="Number" name="amount" id="amount" class="form-control" required="" min="0" max="<?php echo $max_amount; ?>" onchange="getDiscount(<?php echo $tprice; ?>)" required>
						</div>
						<br>
						<div class="text-center">
								<button type="submit" class="btn btn-success">Submit</button>
								<a href="vieworder.php?id=<?php echo $id; ?>" class="btn btn-danger">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php"); ?>
</div>
<script type="text/javascript">
	function getAmount(price){
		var discount = document.getElementById("discount").value;
		var amount = document.getElementById("amount");
		var val = (price * discount)/100; 

		amount.value = val.toFixed(2);
	}
	function getDiscount(price){
		var amount = document.getElementById("amount").value;
		var discount = document.getElementById("discount");
		var disc = (amount / price) * 100;

		discount.value = disc.toFixed(2);
	}
</script>
<?php include("js.php"); ?>
</body>
</html>