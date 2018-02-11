<?php 
	require('database.php'); 
	$tprice = 0;
?>
<!DOCTYPE html>
<style type="text/css">
	.img-responsive{
		height: 220px !important;
	}

	/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 150px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */ /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 30%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.3s;
    animation-name: animatetop;
    animation-duration: 0.3s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-body {padding: 2px 10px;}

.modal-header{
	background-color: rgba(217, 83, 79, .7);
    color: white;
}
.header2{
	background-color: #bce8f1;
    color: white;
    border-radius: 6px;
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
                    $prod_id = $row['prod_id'];
                    $cart_id = $row['cart_id'];

                    $itemPrice = $product['prod_price'] * $row['quantity'];
                    $tprice += $itemPrice;
                    echo "
                    	<div class='cart-header'>
                    		<a href='#' onclick='showModal($cart_id)' class='close2'></a>
                    		<div class='cart-sec simpleCart_shelfItem'>
                    			<div class='cart-item cyc'>
									 <img src='$prodImage' class='img-responsive' alt=''/>
								</div>
								<div class='cart-item-info'>
									<h3><a href='productdetails.php?id=$productCode'>$productName</a><span>Product Code: $productCode</span></h3>
									<ul class='qty'>
										<li><p>Individual Price  :  $productPrice</p></li>
										<div class='clearfix'></div>
										<li><p>Quantity  :  $quantity</p></li>
									</ul>
									<br>
									<div class='clearfix'></div>
									<a href='#' class='btn btn-success' onclick='updateQuantity($cart_id, $quantity)'>Update Quantity</a>
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
			  <input type="text" id='show' hidden="">
		 </div>
		  <div class="col-md-3 cart-total">
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1"><?php echo number_format($tprice) ?></span>
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
<div id="myModal" class="modal">

 <div class="modal-content">
  <div class="modal-header">
    <span class="close" id="close1">&times;</span>
  </div>
  <div class="modal-body">
    <p>Are you sure you want to remove this product?</p>
    <br>
    <p></p>
  </div>
  <div class="text-center">
  	 <a href="#" onclick="click1()" class="btn btn-success">Yes</a>
  	 <a href="#" onclick="closeModal('myModal')" class="btn btn-danger">No</a>
  </div>
  <br>
</div>

</div>

<div class="modal" id='modal2'>
	<div class="modal-content">
	  	<div class="modal-header header2">
	   		<span class="close" id="close2">&times;</span>
	 	</div>
	  	<div class="modal-body">
	   		<form action="#" method="post" enctype="multipart/form" id="updateform">
	   			<p>Update Product Quantity</p>
	   			<br>
	   			<div class="col-md-4">
	   				<label>Quantity</label>
	   			</div>	
	   			<div class="col-md-8">
	   				<input type="Number" name="newquantity" class="form-control" id='newquantity' min="1">
	   			</div>
	   			<div class="clearfix"></div>
	   			<div class="text-center">
	   				<br>
	   				<button type="submit" class="btn btn-success" onclick="">Submit</button>
	   				<a href="#" onclick="closeModal('modal2')" class="btn btn-danger">Cancel</a>
	   			</div>
	   		</form>
		</div>
 	 <br>
	</div>
</div>
<script type="text/javascript">
	function showModal(cart_id){
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the <span> element that closes the modal
		var span = document.getElementById("close1");

		// When the user clicks on the button, open the modal 
		modal.style.display = "block";

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		document.getElementById('show').value = cart_id;
	}

	function click1(){
		var id = document.getElementById("show").value;

		window.location.replace("php/deletecart.php?id=" + id)
	}
	function closeModal(modal){
		document.getElementById(modal).style.display = "none";
	}

	function updateQuantity(cart_id, quantity){
		var modal = document.getElementById('modal2');

		// Get the <span> element that closes the modal
		var span = document.getElementById("close2");

		// When the user clicks on the button, open the modal 
		modal.style.display = "block";

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		document.getElementById('show').value = cart_id;
		document.getElementById('newquantity').value = quantity;
		document.getElementById('updateform').action = "php/updatequantity.php?id=" + cart_id;
	}
</script>
</html>
			