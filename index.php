<style type="text/css">
	.modal-content{
		background-color: #fcf8e3;
	}
</style>
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
					<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/zebra.jpg" alt="">
						<div class="b-wrapper">
							<h3 class="b-animate b-from-top top-in   b-delay03 ">
								<span>Wall Decor - Zebra</span>	
							</h3>
						</div>
					</a>
				</div>
			<div class="col-md-6">
				<div class="col-md1 ">
					<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/uneven bowl.jpg" alt="">
						<div class="b-wrapper">
							<h3 class="b-animate b-from-top top-in1   b-delay03 ">
								<span>Uneven Bowl</span>	
							</h3>
						</div>
					</a>
				</div>
			<div class="col-md2">
				<div class="col-md-6 men1">
					<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/notavailable.jpg" alt="">
						<div class="b-wrapper">
							<h3 class="b-animate b-from-top top-in2   b-delay03 ">
								<span>.......</span>	
							</h3>
						</div>
					</a>
				</div>
			<div class="col-md-6 men2">
				<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/notavailable.jpg" alt="">
					<div class="b-wrapper">
						<h3 class="b-animate b-from-top top-in2   b-delay03 ">
							<span>.......</span>	
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
						<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/notavailable.jpg" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left    b-delay03 ">
									<span>.........</span>
									
								</h3>
							</div>
						</a>
				

					<p><a href="single.php">TRIBECA LIVING</a></p>
					<a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/notavailable.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>ESSENTIAL</span>	
											</h3>
										</div>
						</a>
					<p><a href="single.php">ESSENTIAL</a></p>
					<a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/notavailable.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>CLARISSA</span>	
											</h3>
										</div>
						</a>
					<p><a href="single.php">CLARISSA</a></p>
					<a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>
					</div>
					<div class="col-md-3 grid-top">
						<a href="single.php" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="img/products/notavailable.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>LITTLE HOME</span>	
											</h3>
										</div>
						</a>
					<p><a href="single.php">LITTLE HOME</a></p>
					<a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>
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
			