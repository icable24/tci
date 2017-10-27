<?php 
	
?>
<?php 
	require 'database.php';
	include 'login_success.php';

$pdo = Database::connect();
$employee = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM employee 
");
$employee->execute();
$employee = $employee->fetchAll(PDO::FETCH_ASSOC);
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
						<h2>Employee</h2>
					</div>	
				</div>	
					<div class="controls">
			       		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in" style="width: 3in">

			       		<div class="pull-right">
			       		<a href="employeecreate.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp; Add Employee</a>
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
							<th>Employee ID</th>
							<th>Employee Name</th>
							<th>Email</th>
							<th>Position</th>
							<th>Address</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>	
					<tbody>					
						<?php				
							require 'database.php';
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = 'SELECT * FROM employee ORDER BY emp_id ASC';

							foreach ($pdo->query($sql) as $row) {
								// $query = $pdo->prepare("SELECT pf_id FROM productfinish WHERE pf_name = ?");
								// $query->execute(array($row['pf_name']));
								// $pf = $query->fetch(PDO::FETCH_ASSOC);

								// $query = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = ?");
								// $query->execute(array($row['pc_id']));
								// $pc = $query->fetch(PDO::FETCH_ASSOC);

								// $query = $pdo->prepare("SELECT pg_id FROM productgroup WHERE pg_name = ?");
								// $query->execute(array($row['pg_name']));
								// $pg = $query->fetch(PDO::FETCH_ASSOC);

								echo '<tr>';
									echo '<td>'.$row['emp_id'] . '</td>';
									echo '<td>'.$row['emp_name']. '</td>';
									echo '<td>'.$row['emp_email'].'</td>';
									echo '<td>'.$row['emp_position'].'</td>';
									echo '<td>'.$row['emp_address'].'</td>';
									echo '<td class="text-center">
												<a class="btn btn-primary btn-md" href="employeeupdate.php?id='.$row['emp_id'].'" data-toggle="tooltip" title="View"><span class="glyphicon glyphicon-edit"></span></a>
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