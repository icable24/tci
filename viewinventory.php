<?php 
	
?>
<?php 
	require 'database.php';
	include 'login_success.php';

$pdo = Database::connect();
$product = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM product 
");
$product->execute();
$product = $product->fetchAll(PDO::FETCH_ASSOC);
?>
<!--Start of Html-->
<!DOCTYPE html>
<html>
<head>


<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom_style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>


<style>

#myInput {
  background-image: url('./img/searchicon.png');
  background-position: 6px 6px;
  background-repeat: no-repeat;
  font-size: 14px;
  padding: 11px 5px 2px 35px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin-left: 1px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 14px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 10px;
}

#myTable tr {
  border-bottom: 2px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

</head>
<body>
	<?php 
		include('header.php');
	?>
	<div class="container">
		<div class="col-lg-12">
				<div class="row productlist_line">
					<div class="col-md-7" >
						<h2>Inventory</h2>
					</div>	
				</div>	
					<div class="controls">
			       		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in" style="width: 3in">
					    
					</div>
		</div>
	</div>
	      	<br>
			<div class="table-responsive">

				<div class="container">
					<table class="table" id="myTable">
					<thead>
						<tr class="alert-info">
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Price</th>
							<th>Size/Dimensions</th>
							<th>Stock</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>	
					<tbody>					
						<?php				
							require 'database.php';
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = 'SELECT * FROM product ORDER BY prod_id ASC';

							foreach ($pdo->query($sql) as $row) {

							$query = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = ?");
								$query->execute(array($row['pc_id']));
								$pc = $query->fetch(PDO::FETCH_ASSOC); 	

							$query = $pdo->prepare("SELECT * FROM productfinish WHERE pf_id = ?");
								$query->execute(array($row['pf_id']));
								$pf = $query->fetch(PDO::FETCH_ASSOC); 

								echo '<tr>';
									echo '<td>'.$row['prod_id'] . '</td>';
									echo '<td>'.$row['prod_name']. '</td>';
									echo '<td>'.$pc['pc_name'].'</td>';
									echo '<td>'.$pf['pf_name'].'</td>';
									echo '<td>'.$row['prod_length'].' x '. $row['prod_width'] . ' x ' . $row['prod_height'] .'</td>';
									echo '<td>'.$row['prod_stock'].'</td>';
									echo '<td class="text-center">
												<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal" title="Update"><span class="glyphicon glyphicon-edit"></span></button>
								  		  </td>';									
								echo '</tr>';
								
							}
							Database::disconnect();
						?>
					</tbody>
				</table>
				</div>               
			</div> 	

<!--edit @ footer.php-->
			
			<div class="modal fade" id="modal" tabindex="-1" role="dialog">
			 	 <div class="modal-dialog" role="document">
			   		<div class="modal-content" style="margin-top: 30%;">
		    		    <div class="modal-header "  style="background-color: rgba(93, 255, 26, 0.59); ">
				       		 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				       		 <h4 class="modal-title">Add Stock Quantity</h4>
		      			</div>
		      			<form class="form-horizontal" href="./php/addstock.php" method="POST" >
			      			<div class="modal-body">
				      			<div class="control-group">
				      				<label class="control-label" for="prod_stock">
				      					Stock Quantity
				      				</label>
				      				<input class="form-control" id="prod_stock" type="number" name="prod_stock" required="number"></input>
				      				<input type="hidden" name="prod_id" value="<?php echo $row['prod_id'] ?>">
				      			</div>
					     	</div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Save changes</button>
						    </div>
					    </form>
			    	</div><!-- /.modal-content -->
			 	</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->


<?php
	include('footer.php');
?>
   
</body>
</html>