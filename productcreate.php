<?php 
	require "database.php";
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
					<h2 style="text-align: left;">New Product</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addprod.php" enctype="multipart/form-data" method="post">

							<!-- Text input-->
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="prod_name">Product Name</label>
							  		<div class="controls">
							    		<input id="prod_name" name="prod_name" type="text" placeholder="Product Name" class="form-control" required="">						    
							  		</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="pf_name">Finish</label>
							  			<div class="controls">
							   				<select id="pf_name" name="pf_name"  class="form-control" required="">
							      			<option></option>
							      			<option >Glossy</option>
							      			<option>Matte</option>
							    			</select>
							 	 		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="prod_price">Product Price </label>
							  		<div class="controls">
							    		<input id="prod_price" name="prod_price" step="100" type="number" placeholder="Product Price" class="form-control" required="number">
							    
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
										<label for="prod_stock" class="control-label">Stock</label>
										<div class="controls">
											<input type="number" id="prod_stock" step="1" class="form-control" name="prod_stock" required="number">
										</div>
									</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="pg_name">Group</label>
										<div class="controls">
											<select class="form-control" name="pg_name" id="pg_name">
												<option></option>
												<option>Bowl</option>
												<option>Bowl</option>
											</select>
										</div>
								</div>
							</div>
							
							<div class="col-lg-6">
							 	<div class="control-group">
                                	<label class="control-label" for="prod_desc">Description</label>
                                	<textarea class="form-control" rows="5" name="prod_desc" id="prod_desc"></textarea>
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
											<input type="number" step="0.01" class="form-control" name="prod_length" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="control-group">
										<label for="" class="control-label">Width</label>
										<div class="controls">
											<input type="number" step="0.01" class="form-control" name="prod_width" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="control-group">
										<label for="" class="control-label">Height</label>
										<div class="controls">
											<input type="number" step="0.01" class="form-control" name="prod_height" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="control-group">
										<label for="prod_image" class="control-label">Upload Image</label>
										<div class="controls">
											<input type="hidden" name="size" value="1000000" >
											<input type="file" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/jpg" onchange="readURL(this);">
    										<img id="blah" src="#" alt="" />
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
  	<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>
