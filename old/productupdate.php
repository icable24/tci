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
        $sql = "SELECT * FROM product where prod_id = ?";
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
					<h2 style="text-align: left;">Update Product</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/updateprod.php" method="post">

							<!-- Text input-->
							<div class="col-lg-6">
								<div class="control-group">
									<div class="controls">
			                            <label class="control-label" for="prod_id">Product ID</label>
										<input class="form-control" type="hidden" name="prod_id" value="<?php echo $data['prod_id']?>">
										<input class="form-control" value="<?php echo $data['prod_id']?>" disabled>
									</div>
	                            </div>
                            </div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="prod_name">Product Name</label>
							  		<div class="controls">
							    		<input id="prod_name" name="prod_name" type="text" placeholder="Product Name" class="form-control" required="" value="<?php echo $data['prod_name']?>">						    
							  		</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="pf_name">Finish</label>
							  			<div class="controls">
							   				<select id="pf_name" name="pf_name"  class="form-control" >
							      			<option></option>
							      			<option <?php if($data['pf_name'] == 'Glossy')echo 'selected="selected"'; ?>>Glossy</option>
							      			<option <?php if($data['pf_name'] == 'Glossy')echo 'selected="selected"'; ?>>Matte</option>
							    			</select>
							 	 		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="prod_price">Product Price </label>
							  		<div class="controls">
							    		<input id="prod_price" name="prod_price" type="text" placeholder="Product Price" class="form-control" required="" value="<?php echo $data['prod_price']?>" >
							    
							  		</div>
								</div>
							</div>


							
							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="pc_name">Category</label>
										<div class="controls">
											<select class="form-control" name="pc_name" id="pc_name">
												<option></option>
												<option>Houseware</option>
												<option>Wall Decors</option>
											</select>
										</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="pg_name">Group</label>
										<div class="controls">
											<select class="form-control" name="pg_name" id="pg_name">
												<option></option>
												<option <?php if($data['pg_name'] == 'Glossy')echo 'selected="selected"'; ?>>Bowl</option>
												<option <?php if($data['pg_name'] == 'Glossy')echo 'selected="selected"'; ?>>Bowl</option>
											</select>
										</div>
								</div>
							</div>
							
							<div class="col-lg-6">
							 	<div class="control-group">
                                	<label class="control-label" for="prod_desc">Description</label>
                                	<textarea class="form-control" rows="5" type="text" name="prod_desc" id="prod_desc" value="<?php echo $data['prod_desc']?>"></textarea>
                                </div>
                            </div>

							

							<div class="col-lg-6">
								<div class="control-group">
									<label for="dimension" class="control-label">Dimension</label>
								</div>
								<div class="col-lg-4">
									<div class="control-group">
										<label for="" class="control-label">Length</label>
										<div class="controls">
											<input type="number" step="0.01" class="form-control" name="prod_length" value="<?php echo $data['prod_length']?>" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="control-group">
										<label for="" class="control-label">Width</label>
										<div class="controls">
											<input type="number" step="0.01" class="form-control" name="prod_width" value="<?php echo $data['prod_width']?>" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="control-group">
										<label for="" class="control-label">Height</label>
										<div class="controls">
											<input type="number" step="0.01" class="form-control" name="prod_height" value="<?php echo $data['prod_height']?>" required>
										</div>
									</div>
								</div>
							</div>
					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="productlist.php">Back</a>
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
