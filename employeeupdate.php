<?php 
	// include 'login_success.php';
	require 'database.php';

$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: productlist.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM employee where emp_id = ?";
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
					<h2 style="text-align: left;">Update Employee</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="php/updateemployee.php" method="post">

							<!-- Text input-->

							<div class="col-lg-6">
								<div class="control-group">
									<div class="controls">
			                            <label class="control-label" for="emp_id">Employee ID</label>
										<input class="form-control" type="hidden" name="emp_id" value="<?php echo $data['emp_id']?>">
										<input class="form-control" value="<?php echo $data['emp_id']?>" disabled>
									</div>
	                            </div>
                            </div>


							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_name">Employee Name</label>
							  		<div class="controls">
							    		<input id="emp_name" name="emp_name" type="text" placeholder="Employee Name" class="form-control" required="" value="<?php echo $data['emp_name']?>"  >						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_address">Address</label>
							  		<div class="controls">
							    		<input id="emp_address" name="emp_address" type="text" placeholder="Address" class="form-control" required="" value="<?php echo $data['emp_address']?>">						    
							  		</div>
								</div>
							</div>


							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_password">Password</label>
							  		<div class="controls">
							    		<input id="emp_password" name="emp_password" type="password" placeholder="Password" class="form-control" required="" value="<?php echo $data['emp_password']?>">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_conpassword">Confirm Password</label>
							  		<div class="controls">
							    		<input id="emp_conpassword" name="emp_conpassword" type="password" placeholder="confirm password" class="form-control" required="" value="<?php echo $data['emp_conpassword']?>">						    
							  		</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_email">Email</label>
							  		<div class="controls">
							    		<input id="emp_email" name="emp_email" type="text" placeholder="Email" class="form-control" required="" value="<?php echo $data['emp_email']?>">						    
							  		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="emp_position">Position</label>
							  		<div class="controls">
							    		<input id="emp_position" name="emp_position" type="text" placeholder="Position" class="form-control" required="" value="<?php echo $data['emp_position']?>">						    
							  		</div>
								</div>
							</div>

							

							<div class="col-lg-6">							
								<div class="control-group">
								  	<label class="control-label" for="emp_gender">Gender</label><br>
								  	<input type="radio" name="emp_gender" value="male" id="emp_gender" <?php if($data['emp_gender'] == 'male')echo 'checked="checked"'; ?>> Male
				  					<input type="radio" name="emp_gender" value="female" id="emp_gender" <?php if($data['emp_gender'] == 'female')echo 'checked="checked"'; ?>> Female
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
