<?php 
	include("database.php");

	$pdo = Database::connect();

	$order = $pdo->prepare("SELECT * FROM orders WHERE order_finish = 'No'");
	$order->execute();
	$order = $order->fetchAll();
?>
<!DOCTYPE html>
<html>
<?php 
	include("head.php");
	include("header.php");
?>
<body>
	<div class="alert-success">
		<div class="container">
			<h2 style="font-family: verdana;">Order History</h2>
		</div>
		<div class="container">
			<table class="table">
				<thead>
					<tr class="alert-success">
						<th>Order ID</th>
						<th>Date Ordered</th>
						<th>Date Finished</th>
						<th>Total Amount</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>