<?php 
 include("database.php");
 include("head.php");
?>

<!DOCTYPE html>
<html>
<?php 
	include("header.php");

	 $pdo = Database::connect();

	 if(isset($_GET['id'])){
	 	$order_id = $_REQUEST['id'];

	 	$user_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
	 	$user_id->execute(array($_SESSION['login_username']));
	 	$user_id = $user_id->fetch();

	 	$order = $pdo->prepare('SELECT * FROM orders WHERE order_id = ?');
	 	$order->execute(array($order_id));
	 	$order = $order->fetch();
	 }else{
	 	header("location: orderhistory.php");
	 }
?>
<body>
	<div class="alert-success">
		<div class="container">
			<h4 style="font-family: verdana;">Order# <?php echo $order['order_id'] ?> <span class="pull-right">Status: <?php echo $order['order_finish'] ?></span></h4>
		</div>
	</div>
	<div class="container">
		<div class="check">
			<?php 
				$cart = $pdo->prepare("SELECT * FROM cart WHERE order_id = ?");
				$cart->execute(array($order['order_id']));
				$cart = $cart->fetchAll();
				$ct = 0;

				foreach($cart as $row){
					$product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
					$product->execute(array($row['prod_id']));
					$product = $product->fetch();

					$prodName = $product['prod_name'];
					$prodCode = $product['prod_code'];
					$prodImg = "prod_img/" . $product['prod_image'];
					$prodPrice = $product['prod_price'];
					$quantity = $row['quantity'];

					$ct++;
					echo"
                		<div class='col-md-6'>
                			<div class='cart-item'>
								 <img src='$prodImg' alt='' style='height:120px;width:120px;'/>
							</div>
							<div class='cart-item-info'>
								<h3><a href='#'>$prodName</a><span>Product Code: $prodCode</span></h3>
								<ul class='qty'>
									<li><p>Individual Price  :  $prodPrice</p></li>
									<div class='clearfix'></div>
									<li><p>Quantity  :  $quantity</p></li>
								</ul>	
						    </div>
                		</div>	
					";

					if($ct % 2 == 0){
						echo "<br><br><br><br><br><br><br><br>";
					}
				}
			?>
		</div>
	</div>
</body>
</html>