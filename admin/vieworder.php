<?php 
	include('../login_success.php');
 	include('../database.php');

 	$pdo = Database::connect();

 	if(isset($_GET['id'])){
 		$order_id = $_REQUEST['id'];
 	}else{
 		header("location: orderlist.php");
 	}
?>
<!DOCTYPE html>
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
		?>
		<br><br>
		<div class="container">
			<div><h1>Order #<?php echo $order['order_id']; ?></h1></div>
			<table class="table">
				
			</table>
		</div>
	</div>
	</div>	
		<?php include("footer.php"); ?>
	</div>
	<?php include("js.php"); ?>
</body>
</html>