<?php 
	include('../login_success.php');
 	include('../database.php');

 	if(isset($_GET['id'])){
 		$order_id = $_REQUEST['id'];
 	}else{
 		header("location: orderlist.php");
 	}
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>
<?php
	include("sidenavbar.php");
?>
	<div class="page home-page">
		<?php 
			include("header.php");
		?>
		<br><br>
		<div class="container">
			<br><br>
			<div class="container">
				<div class="offset-3 col-6">
					<div class="alert alert-success">
						<div>
			              <h1>Carrier Information</h1>
			            </div>
						<div class="card-block">
							<form action="../php/addcarrier.php?id=<?php echo $order_id ?>" id="myform" name="myform" enctype="multipart/form-data" method="post">
								<div class="row">
									<div class="col-12">	
										<div class="control-group">
											<label class="control-label" for='carrierName'>Carrier Name</label>
											<div class="controls">
												<input type="text" name="carrierName" id="carrierName" required="" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">	
										<div class="control-group">
											<label class="control-label" for='waivelNo'>Waivel No</label>
											<div class="controls">
												<input type="text" name="waivelNo" id="waivelNo" required="" class="form-control">
											</div>
										</div>
									</div>
								</div>
								</div>
					                <div class="footer">
					                  <div class="form-actions text-center forms">
					                    <button type="submit" class="btn btn-success">Submit</button>
					                    <a class="btn btn-danger" href="vieworder.php?id=<?php echo $order_id ?>">Cancel</a>
					                  </div>
					                </div>
					              </form>
					            </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			include("footer.php");
		?>
	</div>
	<?php include("js.php"); ?>
</body>
</html>