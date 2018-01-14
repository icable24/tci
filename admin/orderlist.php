<?php 
	include('../login_success.php');
 	include('../database.php');

 	$pdo = Database::connect();

 	$orders = $pdo->prepare("SELECT * FROM orders WHERE NOT (order_finish = 'No')");
 	$orders->execute();
 	$orders = $orders->fetchAll();
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>
<style>
    select, input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
	}

	input[type=text]{
	   background-image: url('../img/searchicon.png');
	}
	select{
	   width: 20%;
	    background-image: url('../img/filter-icon.png');
	}

	input[type=text]:focus {
	    width: 50%;
	}
</style>
<?php 
	include("sidenavbar.php");
?>
	<div class="page home-page">
		<?php include("header.php"); ?>
		<br>
		<div class="container">
			<div> 
				<input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder="Search..">                 
            </div>
          	<br><br>
          	<div><h1>Orders</h1></div>
          	<br>
          	<table class="table" id="myTable">
				<thead>
					<tr class="alert-success">
						<th>Order ID</th>
						<th>Customer</th>
						<th>Total</th>
						<th>Date Ordered</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($orders as $row){
							$customer = $pdo->prepare("SELECT * FROM account WHERE acc_id = ?");
							$customer->execute(array($row['acc_id']));
							$customer = $customer->fetch();

							$customerName = $customer['acc_fname'] . ' ' . $customer['acc_lname'];
							$order_id = $row['order_id'];
							$total = $row['order_amount'];
							$date_ordered = $row['date_ordered'];
							$status = $row['order_finish'];
							echo "
								<tr>
									<td>$order_id</td>
									<td>$customerName</td>
									<td>$total</td>
									<td>$date_ordered</td>
									<td>$status</td>
									<td class='class-center'>
										<a href='vieworder.php?id=$order_id' class='btn btn-primary btn-md' data-toggle='tooltip' title='View'><span>View</span></a>
									</td>
								</tr>
							";
						}
					?>
				</tbody>          		
          	</table>
        </div>
	</div>	
		<?php include("footer.php"); ?>
	</div>
	<?php include("js.php"); ?>
</body>
</html>