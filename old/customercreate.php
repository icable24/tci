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
					<h2 style="text-align: left;">New Customer</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addcustomer.php" method="post">

							<!-- Text input-->
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="cust_name">Customer Name</label>
							  		<div class="controls">
							    		<input id="cust_name" name="cust_name" type="text" placeholder="Customer Name" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="address">Address</label>
							  		<div class="controls">
							    		<input id="cust_address" name="cust_address" type="text" placeholder="Address" class="form-control" required="">						    
							  		</div>
								</div>
							</div>


							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="password">Password</label>
							  		<div class="controls">
							    		<input id="cust_password" name="cust_password" type="password" placeholder="Password" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="conpassword">Confirm Password</label>
							  		<div class="controls">
							    		<input id="cust_conpassword" name="cust_conpassword" type="password" placeholder="conpassword" class="form-control" required="">						    
							  		</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="email">Email</label>
							  		<div class="controls">
							    		<input id="cust_email" name="cust_email" type="text" placeholder="Email" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="contact number">Contact Number</label>
							  		<div class="controls">
							    		<input id="cust_contactnumber" name="cust_contactnumber" type="text" placeholder="Contact Number" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="Buying Agent">Contact Person/Buying Agent</label>
							  		<div class="controls">
							    		<input id="buy_agent" name="buy_agent" type="text" placeholder="Contact Person/Buying Agent" class="form-control" required="">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">							
								<div class="control-group">
								  	<label class="control-label" for="cgender">Gender</label><br>
								  	<input type="radio" name="cgender" value="male" id="cgender"> Male
				  					<input type="radio" name="cgender" value="female" id="cgender"> Female
								</div>
							</div>

						</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="customerlist.php">Back</a>
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
