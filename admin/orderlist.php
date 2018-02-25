<?php 
	include('../login_success.php');
 	include('../database.php');
 	$pdo = Database::connect();

 	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  	$perPage = 9;

// Positioning
  	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

  	$p = $pdo->prepare("SELECT count(*) FROM orders WHERE NOT (order_finish = 'No') ORDER BY order_id DESC");
	$p->execute();
	$p = $p->fetch(PDO::FETCH_ASSOC);

	$total = $p['count(*)'];
    $pages = ceil($total / $perPage);

    $orders = $pdo->prepare("SELECT * FROM orders WHERE NOT (order_finish = 'No') ORDER BY order_id DESC LIMIT {$start},{$perPage}");
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

	.pager{
  margin-right: 5px;
  margin-left: 5px;
}
.active{
  color: #666666;
  text-decoration: underline;
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
              <select id="filters" name="filters" onChange="myFilter()" placeholder="filter" class="pull-right">
              <option disabled selected style="color: gray">Filter</option>
              <option></option>
              <option>Cancelled</option>
              <option>Pending</option>
              <option>Processing</option>
              <option>Delivery</option>
              <option>Delivered</option>
            </select>
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
							if($row['discount_amount'] > 0){
								$total = "Php " . number_format($row['discount_amount'], 2);
							}else{
								$total = "Php " . number_format($row['order_amount'], 2);
							}
							$date_ordered = date("F j, Y", strtotime($row['date_ordered']));
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
					<tr>	
					<td></td>
					</tr>
				</tbody>          		
          	</table>
          	<div class="offset-5 col">
          <div class="row">
       <nav class="text-center">
          <ul class="pagination">
          <?php if($page > 1){?>
            <li class="pager">
              <a href="?page=<?php echo $page-1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          <?php }?>
          
          <?php for($x = 1; $x <= $pages; $x++) : ?>
            <li class="pager"><a href="?page=<?php echo $x; ?>"  <?php if($x === $page){echo 'class=active disabled';} ?>><?php echo $x; ?></a></li>
          <?php endfor; ?>
          
          <?php if($page < $pages){?>
            <li class="pager">
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


         <script>
function myFilter() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("filters");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
		<?php include("footer.php"); ?>
	<?php include("js.php"); ?>
</body>
</html>