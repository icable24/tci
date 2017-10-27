<?php 
	// include 'login_success.php';
	require 'database.php';

$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: customerlist.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where cust_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

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
					<h2 style="text-align: left;">Update Customer</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/updatecustomer.php" method="post">

							<!-- Text input-->
							<div class="col-lg-6">
								<div class="control-group">
									<div class="controls">
			                            <label class="control-label" for="cust_id">Customer ID</label>
										<input class="form-control" type="hidden" name="cust_id" value="<?php echo $data['cust_id']?>">
										<input class="form-control" value="<?php echo $data['cust_id']?>" disabled>
									</div>
	                            </div>
                            </div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="cust_name">Customer Name</label>
							  		<div class="controls">
							    		<input id="cust_name" name="cust_name" type="text" placeholder="Customer Name" class="form-control" required="" value="<?php echo $data['cust_name']?>">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="address">Address</label>
							  		<div class="controls">
							    		<input id="cust_address" name="cust_address" type="text" placeholder="Address" class="form-control" required="" value="<?php echo $data['cust_address']?>">						    
							  		</div>
								</div>
							</div>


							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="password">Password</label>
							  		<div class="controls">
							    		<input id="cust_password" name="cust_password" type="password" placeholder="Password" class="form-control" required="" value="<?php echo $data['cust_password']?>">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="conpassword">Confirm Password</label>
							  		<div class="controls">
							    		<input id="cust_conpassword" name="cust_conpassword" type="password" placeholder="conpassword" class="form-control" required="" value="<?php echo $data['cust_conpassword']?>">						    
							  		</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="email">Email</label>
							  		<div class="controls">
							    		<input id="cust_email" name="cust_email" type="text" placeholder="Email" class="form-control" required="" value="<?php echo $data['cust_email']?>">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="contact number">Contact Number</label>
							  		<div class="controls">
							    		<input id="cust_contactnumber" name="cust_contactnumber" type="text" placeholder="Contact Number" class="form-control" required="" value="<?php echo $data['cust_contactnumber']?>">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="Buying Agent">Contact Person/Buying Agent</label>
							  		<div class="controls">
							    		<input id="buy_agent" name="buy_agent" type="text" placeholder="Contact Person/Buying Agent" class="form-control" required="" value="<?php echo $data['buy_agent']?>">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">							
								<div class="control-group">
								  	<label class="control-label" for="cust_gender">Gender</label><br>
								  	<input type="radio" name="cust_gender" value="male" <?php if($data['cust_gender'] == 'male')echo 'checked="checked"'; ?> id="cust_gender"> Male
				  					<input type="radio" name="cust_gender" value="female" <?php if($data['cust_gender'] == 'female')echo 'checked="checked"'; ?> id="cust_gender"> Female
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
