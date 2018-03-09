<?php 
	include('../login_success.php');
 	include('../database.php');
 	if(isset($_GET['id'])){
 		$order_id = $_GET['id'];

 		$pdo = Database::connect();

 		$order = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
 		$order->execute(array($order_id));
 		$order = $order->fetch();
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
			<div class="col">
				<h1>Order # <?php echo $order_id ?></h1>
			</div>
			<br>
			<div class="row">
				<div class="offset-3 col-6 alert alert-success">
					<div class="row">
						<h2>&nbsp;&nbsp;&nbsp;Log</h2>
					</div>
					<br>
					<div class="row">
						<div class="col-6">
							<h3>Date Ordered: </h3>
						</div>
						<div class="col-6">
							<h3><?php if($order['date_ordered'] != "0000-00-00"){echo date("F j, Y",strtotime($order['date_ordered']));} ?></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<h3>Date Processed: </h3>
						</div>
						<div class="col-6">
							<h3><?php if($order['date_processed'] != "0000-00-00"){echo date("F j, Y",strtotime($order['date_processed']));} ?></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<h3>Delivery Date: </h3>
						</div>
						<div class="col-6">
							<h3><?php if($order['date_finished'] != "0000-00-00"){echo date("F j, Y",strtotime($order['date_finished']));} ?></h3>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col text-center">
							<a href="vieworder.php?id=<?php echo $order_id; ?>" class="btn btn-success">Back</a>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<?php include("footer.php"); ?>
	</div>
<?php include("js.php"); ?>
</body>
</html>