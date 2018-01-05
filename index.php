<style type="text/css">
	.modal-content{
		background-color: #fcf8e3;
	}
</style>
<?php 
	include("database.php");
	$pdo = Database::connect();

	$featured = $pdo->prepare("SELECT * FROM featuredprod");
	$featured->execute();
	$featured = $featured->fetchAll();

	$featuredProd = array();
	$img = array();
	$newImg = array();

	$ct = 0;

	for($a = 0; $a < 5; $a++){
		$featuredProd[$a]["prod_name"] = "Not Available";
		$img[$a] = "img/products/notavailable.jpg";
	}
	foreach($featured as $row){
		$featuredProd[$ct] = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
		$featuredProd[$ct]->execute(array($row['prod_id']));
		$featuredProd[$ct] = $featuredProd[$ct]->fetch();
		$img[$ct] = "prod_img/" . $featuredProd[$ct]['prod_image'];
		$ct++;
	}

	$newProd = $pdo->prepare("SELECT * FROM product ORDER BY prod_id DESC");
	$newProd->execute();
	$newProd = $newProd->fetchAll();

	for($a = 0; $a < 4; $a++){
		$newImg[$a] = "prod_img/" . $newProd[$a]["prod_image"];
	}
?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<body >
<!--header-->
<?php include('header.php'); ?>

	<div class="banner">
		<div class="container">
			  <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
			<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <li>
					<div class="banner">
						<img src="img/tci_slide1.jpg">
					</div>
				</li>
				<li>
					<div class="banner">
						<img src="img/tci_slide2.jpg">
					</div>
				</li>
				<li>
					<div class="banner">
						<img src="img/tci_slide3.jpg">
					</div>
				</li>
			</ul>
		</div>

	</div>
	</div>

<!--content-->
<div class="container">
	<div class="cont">
		<div class="content" style="background-color: #ebebc6">
			<div class="content-top-bottom">
				<h2>Featured PRODUCTS</h2>
				<div class="col-md-6 men">
					<a href="productdetails.php?id=<?php echo $featuredProd[0]['prod_code'] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $img[0] ?>" alt="" style="width: 510px; height: 416px;">
						<div class="b-wrapper">
							<h3 class="b-animate b-from-top top-in   b-delay03 ">
								<span><?php echo $featuredProd[0]["prod_name"] ?></span>	
							</h3>
						</div>
					</a>
				</div>
			<div class="col-md-6">	
			<div class="col-md1">
				<div class="col-md-6 men1">
					<a href="productdetails.php?id=<?php echo $featuredProd[1]['prod_code'] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $img[1] ?>" alt="" style="width: 240px; height: 184px;">
						<div class="b-wrapper">
							<h3 class="b-animate b-from-top top-in2   b-delay03 ">
								<span><?php echo $featuredProd[1]["prod_name"] ?></span>	
							</h3>
						</div>
					</a>
					</div>
			<div class="col-md-6 men2">
				<a href="productdetails.php?id=<?php echo $featuredProd[2]['prod_code'] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $img[2] ?>" alt="" style="width: 240px; height: 184px;">
					<div class="b-wrapper">
						<h3 class="b-animate b-from-top top-in2   b-delay03 ">
							<span><?php echo $featuredProd[2]["prod_name"] ?></span>	
						</h3>
					</div>
				</a>
			</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md2">
				<div class="col-md-6 men1">
					<a href="productdetails.php?id=<?php echo $featuredProd[3]['prod_code'] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $img[3] ?>" alt="" style="width: 240px; height: 184px;">
						<div class="b-wrapper">
							<h3 class="b-animate b-from-top top-in2   b-delay03 ">
								<span><?php echo $featuredProd[3]["prod_name"] ?></span>	
							</h3>
						</div>
					</a>
				</div>
			<div class="col-md-6 men2">
				<a href="productdetails.php?id=<?php echo $featuredProd[4]['prod_code'] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $img[4] ?>" alt="" style="width: 240px; height: 184px;">
					<div class="b-wrapper">
						<h3 class="b-animate b-from-top top-in2   b-delay03 ">
							<span><?php echo $featuredProd[4]["prod_name"] ?></span>	
						</h3>
					</div>
				</a>
			</div>
				<div class="clearfix"> </div>
			</div>
			</div>
				<div class="clearfix"> </div>
			</div>
			<div class="content-top">
				<h1>NEW PRODUCTS</h1>
				<div class="grid-in">
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="productdetails.php?id=<?php echo $newProd[0]["prod_code"] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $newImg[0] ?>" alt="" style="width: 240px; height: 184px;">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left    b-delay03 ">
									<span><?php echo $newProd[0]["prod_name"] ?></span>
									
								</h3>
							</div>
						</a>
				

					<p><a href="productdetails.php?id=<?php echo $newProd[0]["prod_code"] ?>"><?php echo $newProd[0]["prod_name"] ?></a></p>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="productdetails.php?id=<?php echo $newProd[1]["prod_code"] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $newImg[1] ?>" alt="" style="width: 240px; height:184px;">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span><?php echo $newProd[1]["prod_name"] ?></span>	
											</h3>
										</div>
						</a>
					<p><a href="productdetails.php?id=<?php echo $newProd[1]["prod_code"] ?>"><?php echo $newProd[1]["prod_name"] ?></a></p>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="productdetails.php?id=<?php echo $newProd[2]["prod_code"] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $newImg[2] ?>" alt="" style="width: 240px; height: 184px;">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span><?php echo $newProd[2]["prod_name"] ?></span>	
											</h3>
										</div>
						</a>
					<p><a href="productdetails.php?id=<?php echo $newProd[2]["prod_code"] ?>"><?php echo $newProd[2]["prod_name"] ?></a></p>
					</div>
					<div class="col-md-3 grid-top">
						<a href="productdetails.php?id=<?php echo $newProd[3]["prod_code"] ?>" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="<?php echo $newImg[3] ?>" alt="" style="width: 240px; height: 184px;">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span><?php echo $newProd[3]["prod_name"] ?></span>	
											</h3>
										</div>
						</a>
					<p><a href="productdetails.php?id=<?php echo $newProd[3]["prod_code"] ?>"><?php echo $newProd[3]["prod_name"] ?></a></p>
					</div>
							<div class="clearfix"> </div>
				</div>
			</div>
		</div>
    </div>
</div>
<!--footer-->
  <?php include('footer.php'); ?>
</body>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background-color: #fcf8e3;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #8a6d3b;">Warning!</h4>
      </div>
      <div class="modal-body">
        <p style="color: #8a6d3b;">Please Login first </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
</script>
</html>
			