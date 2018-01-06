<?php 
	require('database.php'); 
	$tprice = 0;
?>
<!DOCTYPE html>
<style type="text/css">
	.img-responsive{
		height: 220px !important;
	}
</style>
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
			  <?php 
			  	$acc_email =  $_SESSION['login_username'];
                $user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
                $user_id->execute();
                $user_id = $user_id->fetch(PDO::FETCH_ASSOC);

                $cartProd = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? and cart_finish = ?");
                $cartProd->execute(array($user_id['acc_id'], "No"));
                $cartProd = $cartProd->fetchAll();

                foreach($cartProd as $row){
                    $product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
                    $product->execute(array($row['prod_id']));
                    $product = $product->fetch();

                    $prodImage = "prod_img/". $product['prod_image'];
                    $productName = $product['prod_name'];
                    $productCode = $product['prod_code'];
                    $productPrice = "Php " . number_format($product['prod_price'], 2);
                    $prodTPrice =  "Php " . number_format($product['prod_price'] * $row['quantity'], 2);
                    $quantity = $row['quantity'];

                    $itemPrice = $product['prod_price'] * $row['quantity'];
                    $tprice += $itemPrice;
                    echo "
                    	<div class='cart-header'>
                    		<div class='close2'></div>
                    		<div class='cart-sec simpleCart_shelfItem'>
                    			<div class='cart-item cyc'>
									 <img src='$prodImage' class='img-responsive' alt=''/>
								</div>
								<div class='cart-item-info'>
									<h3><a href='#'>$productName</a><span>Product Code: $productCode</span></h3>
									<ul class='qty'>
										<li><p>Individual Price  :  $productPrice</p></li>
										<div class='clearfix'></div>
										<li><p>Quantity  :  $quantity</p></li>
									</ul>
									<div class='delivery'>
										 <p>Total Price : $prodTPrice</p>
										 <div class='clearfix'></div>
							        </div>	
							   </div>
								<div class='clearfix'></div>
                    		</div>
                    	</div>
                    ";
                }
			  ?>

		 </div>
		  <div class="col-md-3 cart-total">
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
			 <a class="order" href="placeorder.php">Place Order</a>
			</div>
		
			<div class="clearfix"> </div>
	 </div>
	 </div>


<!--//content-->
<!--footer-->
  <?php include('footer.php'); ?>
</body>
</html>
			