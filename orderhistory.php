<?php 		
	include("database.php");

	$pdo = Database::connect();

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
	</div>
	<br><br>
	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr class="alert-success">
					<th>Order ID</th>
					<th>Date Ordered</th>
					<th>Total Amount</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$acc_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
					$acc_id->execute(array($_SESSION['login_username']));
					$acc_id = $acc_id->fetch();

					$order = $pdo->prepare("SELECT * FROM orders WHERE order_finish = 'Pending' AND acc_id = ?");
					$order->execute(array($acc_id['acc_id']));
					$order = $order->fetchAll();

					foreach($order as $row){
						$order_id = $row['order_id'];
						$date = $row['date_ordered'];
						$amount = "Php " . number_format($row['order_amount']);
						$status = $row['order_finish'];
						echo"
							<tr>
								<td>$order_id</td>
								<td>$date</td>
								<td>$amount</td>
								<td>$status</td>
								<td class='text-center'><a class='btn btn-success btn-md' href='vieworder.php?id=$order_id' data-toggle='tooltip' title='View'><span>View</span></a></td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>