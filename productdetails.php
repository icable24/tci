<?php 
	require 'database.php';

	$pdo = Database::connect();
	if(!empty($_GET['id'])){
		$prod_code = $_REQUEST['id'];

		$prod = $pdo->prepare("SELECT * FROM product WHERE prod_code = ?");
		$prod->execute(array($prod_code));
		$prod = $prod->fetch(PDO::FETCH_ASSOC);

	}else{
		header('location:index.php');
	}
?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<style type="text/css">
	.img-responsive{
	height: 500px;
	width: 500px;
	}
	.sub{
		color: rgba(196, 195, 195, 1);
	}
</style>
<html>
<?php include('head.php'); ?>
<body>
<?php include('header.php'); ?>
	<!-- grow -->
	<div class="alert alert-success">
		<div class="container">
			<h2 style="font-family: verdana;"><?php echo $prod['prod_name'] ?></h2>
		</div>
	</div>
	<div class="row text-center" id="full" style="display: none;">
		<h3 class="alert-danger">Compare product already full!</h3>
	</div>
	<div class="row text-center" id="added" style="display: none;" >
		<h3 class="alert-danger">Product has already been added!</h3>
	</div>
	<!-- grow -->
	
		<div class="product">
			<div class="container">
				<div class="product-price1">
				<div class="top-sing">
				<div class="col-md-6 single-top">	
						<div class="flexslider">
			        <div> <img <?php echo "src=prod_img/" . $prod['prod_image'] ?> data-imagezoom="true" class="img-responsive" style="width: 300px; height:300px;"> </div>
						</div>
<!-- slide -->


						<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>	
				</div>	
					<div class="col-md-6 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
							<h5 class="item_price">

								<?php 
									echo "Price ";
									if(isset($_SESSION['login_username'])){
										echo "<span class='pull-right'>Php " . number_format($prod['prod_price'], 2) . "</span>";
									}
								?>
							</h5>
							<p><?php echo $prod['prod_desc']; ?></p>
							<div class="clearfix"></div>
							<h6>Dimension <span class="sub">(in cm)</span><div class="clearfix"></div>
								<?php 
									if($prod['prod_length']!='0' && $prod['prod_width'] != '0' && $prod['prod_height'] != '0'){
				                      echo '<p>'.$prod['prod_length'].' x '. $prod['prod_width'] . ' x ' . $prod['prod_height'] .'</p>';
				                    }else{
				                      echo '<p>'.$prod['prod_diameter']. ' Dia. x '. $prod['prod_height2'] . ' Ht.'. '</p>';
				                    }
								?>
							</h6>
							<div class="clearfix"></div><br>
							
							<?php if(isset($_SESSION['login_username'])){ ?>
								<div class="row">
									<div class="col-md-6">
										<form method="POST" action="php/addToCart.php?id=<?php echo $prod_code; ?>">
												&nbsp; &nbsp; <label>Quantity
												<input type="Number" name="quantity" id="quantity" style="width: 40px;" value="1" min="1">
												<button type="submit" class="btn btn-success">Add To Cart</button>
											</label>
										</form>
									</div>
									<div class="col-md-6">
										<form method="POST" action="php/addCompare.php?id=<?php echo $prod['prod_id'] ?>">
											<div class="row">
												<input type="hidden" name="compProd" id="compProd" value="<?php echo $prod_code ?>">
												<button type="submit" style="width: 1.3in" class="btn btn-success">Compare</button>
											</div>
										</form>
									</div> 
								</div>
						</div>
							<?php } ?>
					</div>
			<!---->

		<!-- <div class=" bottom-product">
			<div class="col-md-4 bottom-cd simpleCart_shelfItem">
				<div class="product-at ">
					<a href="#"><img class="img-responsive" src="images/pi3.jpg" alt="">
					<div class="pro-grid">
								<span class="buy-in">Buy Now</span>
					</div>
				</a>	
				</div>
				<p class="tun"><span>Lorem ipsum establish</span><br>CLARISSA</p>
				<div class="ca-rt">
					<a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>						
				</div>						
			</div>
			<div class="col-md-4 bottom-cd simpleCart_shelfItem">
				<div class="product-at ">
					<a href="#"><img class="img-responsive" src="images/pi1.jpg" alt="">
					<div class="pro-grid">
								<span class="buy-in">Buy Now</span>
					</div>
				</a>	
				</div>
				<p class="tun"><span>Lorem ipsum establish</span><br>CLARISSA</p>
				<div class="ca-rt">
					<a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>						
				</div>					</div>
			<div class="col-md-4 bottom-cd simpleCart_shelfItem">
				<div class="product-at ">
					<a href="#"><img class="img-responsive" src="images/pi4.jpg" alt="">
					<div class="pro-grid">
								<span class="buy-in">Buy Now</span>
					</div>
				</a>	
				</div>
				<p class="tun"><span>Lorem ipsum establish</span><br>CLARISSA</p>
				<div class="ca-rt">
					<a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>						
				</div>					</div>
			<div class="clearfix"> </div>
		</div> -->
</div>
		</div>
		</div>
	</div>
<!--//content-->
<!--footer-->
<?php include('footer.php'); ?>
<script type="text/javascript">
	function showFull(){
		var full = document.getElementById("full");

		full.style.display = "block";
	}

	function showAdded(){
		var added = document.getElementById("added");

		added.style.display = "block";
	}
</script>
<?php 
if(isset($_GET['error'])){
		$error = $_REQUEST['error'];

		if($error == '1'){
			echo "
			<script type='text/javascript'>
				showFull();
			</script>
			";			
		}elseif($error == '2'){
			echo "
			<script type='text/javascript'>
				showAdded();
			</script>
			";
		}
	}
?>
</body>
</html>		