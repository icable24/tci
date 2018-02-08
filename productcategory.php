<!DOCTYPE html>
<html>
<?php 
	include("head.php");
	include("database.php");
?>
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 30%;
    padding:2%;
    margin-left: 1.65%;
    margin-right: 1.65	%;
    margin-bottom: 1.65%;
    border-radius: 5px;
    border: 1px solid #000000;
    /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

.img-responsive{
	height: 150px;
	width: 150px;
}

.pro-grid{
	padding-top: 10em;
}
</style>
<body>
<?php include("header.php"); ?>
	
	<div class="alert alert-success">
		<div class="container">
			<h2 style="font-family: verdana;">Product Category</h2>
		</div>
	</div>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<!-- <div class="column simpleCart_shelfItem">
							<div class="product-at">
								<a href="productcatalog.php?id=1">
									<div class="row">
										<div class="col-md-6">
											<img src="prod_img/Stool.jpg" class="img-responsive">
										</div>
										<div class="col-md-6">
											<img src="prod_img/wastebasket-invertedbanana.jpg" class="img-responsive">
										</div>
									</div>
									<div class="clearfix"></div><br>
									<div class="row">
										<div class="col-md-6">
											<img src="prod_img/SideTableStripe.jpg" class="img-responsive">
										</div>
										<div class="col-md-6">
											<img src="prod_img/FoldingTableStripe.jpg" class="img-responsive">
										</div>
									</div>
									<div class="pro-grid">
										<span class="buy-in">View</span>
									</div>
									<div class="text-center">
										<h3>Product Category</h3>
									</div>
								</a>
							</div>
						</div> -->
						<?php 
							$pdo = Database::connect();

							for($i = 1; $i < 6; $i++){
								$prods = $pdo->prepare("SELECT * FROM product WHERE pc_name = ? ORDER BY prod_id DESC LIMIT 4");
								$prods->execute(array($i));
								$prods = $prods->fetchAll();

								$prod_img1 = "prod_img/" .$prods[0]['prod_image'];
								$prod_img2 = "prod_img/" .$prods[1]['prod_image'];
								$prod_img3 = "prod_img/" .$prods[2]['prod_image'];
								$prod_img4 = "prod_img/" .$prods[3]['prod_image'];

								$cat = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = ?");
								$cat->execute(array($i));
								$cat = $cat->fetch();

								$pc = $cat['pc_name'];

								echo"
									<div class='column simpleCart_shelfItem'>
										<div class='product-at'>
											<a href='productcatalog.php?id=$i'>
												<div class='row'>
													<div class='col-md-6'>
														<img src='$prod_img1' class='img-responsive'>
													</div>
													<div class='col-md-6'>
														<img src='$prod_img2' class='img-responsive'>
													</div>
												</div>
												<div class='clearfix'></div><br>
												<div class='row'>
													<div class='col-md-6'>
														<img src='$prod_img3' class='img-responsive'>
													</div>
													<div class='col-md-6'>
														<img src='$prod_img4' class='img-responsive'>
													</div>
												</div>
												<div class='pro-grid'>
													<span>View</span>
												</div>
												<div class='text-center'>
													<h3>$pc</h3>
												</div>
											</a>
										</div>
									</div>
								";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include("footer.php"); ?>
</body>
</html>