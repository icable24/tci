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


<style>

#myInput {
  background-image: url('./img/searchicon.png');
  background-position: 6px 6px;
  background-repeat: no-repeat;
  font-size: 14px;
  padding: 11px 5px 2px 35px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin-left: 1.5in;
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
						<h2>Products</h2>
					</div>	
				</div>	
					<div class="controls">
			       		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in" style="width: 3in">

			       		<div class="pull-right">
			       		<a href="productcreate.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp; Add Product</a>
			       		</div>


			       		<div class="pull-left">
			       			<div class="col-lg-12">
			       				<select id="category" class="form-control" name="category" onChange="category()">
						     	<option value="" disabled selected hidden> Product Category..</option>
						    	<option>Vase</option>
						    	<option>Lamps</option>
						    	<option>Tables</option>
						    	<option>Wall Decors</option>
						    	<option>Houseware</option>
					    		</select>

			       			</div>
			       		</div>			    
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

								echo '<tr>';
									echo '<td>'.$row['prod_id'] . '</td>';
									echo '<td>'.$row['prod_name']. '</td>';
									echo '<td>'.$pc['pc_name'].'</td>';
									echo '<td>'.' Php '.$row['prod_price'].'</td>';
									echo '<td>'.$row['prod_length'].' x '. $row['prod_width'] . ' x ' . $row['prod_height'] .'</td>';
									echo '<td class="text-center">
												<a class="btn btn-primary btn-md" href="productupdate.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
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
<?php
	include('footer.php');
?>
   
</body>
</html>