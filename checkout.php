<?php require('database.php'); ?>
<!DOCTYPE html>
<html>
<html>
<?php include('head.php'); ?>
<body >
<!--header-->
<?php include('header.php'); ?>
	<!-- grow -->
	<div class="grow" style="background-color: #dff0d8; border-color: #d6e9c6">
		<div class="container">
			<h2 style="color: #3c763d; font-weight: regular;">Checkout</h2>
		</div>
	</div>
	<!-- grow -->
<div class="container">
	<div class="check">	 
			 <h1>My Shopping Cart</h1>
		 <div class="col-md-9 cart-items">
			
				<!-- <script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			 <div class="cart-header">
				 <div class="close1"> </div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="images/pic1.jpg" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#">Mountain Hopper(XS R034)</a><span>Model No: 3578</span></h3>
						<ul class="qty">
							<li><p>Size : 5</p></li>
							<li><p>Qty : 1</p></li>
						</ul>
						
							 <div class="delivery">
							 <p>Service Charges : Rs.100.00</p>
							 <span>Delivered in 2-3 business days</span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
			 <script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});	  
					});
			 </script>
			 <div class="cart-header2">
				</div class="close2"> </div>
				  	<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="images/pic2.jpg" class="img-responsive" alt=""/>
						</div>
					    <div class="cart-item-info">
							<h3><a href="#">Mountain Hopper(XS R034)</a><span>Model No: 3578</span></h3>
							<ul class="qty">
								<li><p>Qty : 1</p></li>
							</ul>
							<div class="delivery">
								 <p>Service Charges : Rs.100.00</p>
								 <span>Delivered in 2-3 business days</span>
								 <div class="clearfix"></div>
				        	</div>	
					   </div>
					   <div class="clearfix"></div>				
				  </div>
			  </div> -->

			  <?php
			  	$pdo = Database::connect();
			  	$count = 0;
			  	$tprice = 0;
			  	if(isset($_SESSION['cart'])){
				  	foreach($_SESSION['cart'] as $prod){
				  		$product = $pdo->prepare("SELECT * FROM product WHERE prod_code = ?");
				  		$product->execute(array($prod));
				  		$product = $product->fetch();
				  		echo '<div class=row>';
					  		echo '<div class="cart-header">';
					  			echo '<div class="cart-sec simpleCart_shelfItem">';
					  				echo '<div class="cart-item cyc">';
						  				echo '<img src="prod_img/'. $product['prod_image'] .'" class="img-responsive" alt=""/>';
						  			echo '</div>';
						  			echo '<div class="cart-item-info">';
						  				echo '<h3><a href="#">' . $product['prod_name'] . '</h3>';
						  				echo '<ul class="qty">';
						  					echo '<li><p>Qty : '. $_SESSION['quantity'][$count] .'</p></li>';
						  					
						  				echo '</ul>';
						  				echo '<div>';
						  					echo '<div class=row>';
						  						echo '<p>Item Price: ' . number_format($product['prod_price'], 2) . '</p>'; 
						  					echo '</div>';
						  					echo '<div class=row>';
						  						echo '<p>Total Price: ' . number_format($product['prod_price'] * $_SESSION['quantity'][$count], 2) . '</p>';
						  						$tprice += $product['prod_price'] * $_SESSION['quantity'][$count];
						  					echo '</div>';
						  				echo '</div>';
						  			echo '</div>';
						  		echo '</div>';
					  		echo '</div>';
				  		echo '</div>';
				  		$count++;
				  	}
			  	}
			  ?>		
		 </div>
		  <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Continue Shopping</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1"><?php echo number_format($tprice) ?></span>
				 <span>Discount</span>
				 <span class="total1">---</span>
				 <span>Delivery Charges</span>
				 <span class="total1">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span><?php echo "Php " . number_format($tprice) ?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="productsummary.php">Place Order</a>
			 <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 
			 </div>
			</div>
		
			<div class="clearfix"> </div>
	 </div>
	 </div>


<!--//content-->
<!--footer-->
  <?php include('footer.php'); ?>
</body>
</html>
			