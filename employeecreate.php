<?php 
	// include 'login_success.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
	<link rel="stylesheet" href="css/datepicker.css">
	
</head>
<!--body starts here-->
<body>
	<!--edit @ header.php-->
	<?php
	include('header.php');
	?>

		<div class="container">
			<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1">
				<div class="row">
					<h2 style="text-align: left;">New Employee</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="php/addemployee.php" method="post">

							<!-- Text input-->
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_name">Employee Name</label>
							  		<div class="controls">
							    		<input id="emp_name" name="emp_name" type="text" placeholder="Employee Name" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_address">Address</label>
							  		<div class="controls">
							    		<input id="emp_address" name="emp_address" type="text" placeholder="Address" class="form-control" required="">						    
							  		</div>
								</div>
							</div>


							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_password">Password</label>
							  		<div class="controls">
							    		<input id="emp_password" name="emp_password" type="password" placeholder="Password" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_conpassword">Confirm Password</label>
							  		<div class="controls">
							    		<input id="emp_conpassword" name="emp_conpassword" type="password" placeholder="confirm password" class="form-control" required="">						    
							  		</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_email">Email</label>
							  		<div class="controls">
							    		<input id="emp_email" name="emp_email" type="text" placeholder="Email" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_position">Position</label>
							  		<div class="controls">
							    		<input id="emp_position" name="emp_position" type="text" placeholder="Position" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							

							<div class="col-lg-6">							
								<div class="control-group">
								  	<label class="control-label" for="emp_gender">Gender</label><br>
								  	<input type="radio" name="emp_gender" value="male" id="emp_gender"> Male
				  					<input type="radio" name="emp_gender" value="female" id="emp_gender"> Female
								</div>
							</div>

						</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="employeelist.php">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>
  	</div>

  	</div>


<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
