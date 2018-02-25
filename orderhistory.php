<?php 		
	include("database.php");

	$pdo = Database::connect();

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  	$perPage = 10;

// Positioning
  	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
?>
<!DOCTYPE html>
<html>
<?php 
	include("head.php");
	include("header.php");
?>
<body>
	<style type="text/css">
	.pagination > li > a:hover{
	background-color: #8ce78a;
	border-color: #8ce78a;
}

.page1{
	border-color: #dff0d8 !important;
	background-color: #dff0d8 !important;
}
</style>
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

					$order = $pdo->prepare("SELECT * FROM orders WHERE NOT order_finish = 'No' AND acc_id = ? LIMIT {$start},{$perPage}");
					$order->execute(array($acc_id['acc_id']));
					$order = $order->fetchAll();

				  	$p = $pdo->prepare("SELECT count(*) FROM orders WHERE NOT order_finish = 'No' AND acc_id = ?");
					$p->execute(array($acc_id['acc_id']));
					$p = $p->fetch(PDO::FETCH_ASSOC);

					$total = $p['count(*)'];
				    $pages = ceil($total / $perPage);

					foreach($order as $row){
						$order_id = $row['order_id'];
						$date = date("F j, Y", strtotime($row['date_ordered']));
						if($row['discount_amount'] > 0){
							$amount = "Php " . number_format($row['discount_amount']);
						}else{
							$amount = "Php " . number_format($row['order_amount']);
						}
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
		<div class="offset-5 col">
          <div class="row">
       <nav class="text-center">
          <ul class="pagination">
          <?php if($page > 1){?>
            <li>
              <a href="?page=<?php echo $page-1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          <?php }?>
          
          <?php for($x = 1; $x <= $pages; $x++) : ?>
            <li><a href="?page=<?php echo $x; ?>" <?php if($x === $page){echo "class=page1";} ?>><?php echo $x; ?></a></li>
          <?php endfor; ?>
          
          <?php if($page < $pages){?>
            <li>
              <a href="?page=<?php echo $page+1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          <?php }?>
          
          </ul>
      </nav>
      </div>
        </div>
      </div>
	</div>
	<br><br><br><br><br><br>
	<?php include("footer.php"); ?>
</body>
</html>