<?php 
	require('database.php');
	$tprice = 0;
	if(isset($_GET['id'])){
		$id = $_REQUEST['id'];
	}else{
		header("location: checkout.php");
	}
	$pdo = Database::connect();
	$cart = $pdo->prepare("SELECT * FROM cart WHERE cart_id = ?");
	$cart->execute(array($id));
	$cart = $cart->fetch();
	$product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
	$product->execute(array($cart['prod_id']));
	$product = $product->fetch();
	$prod_img = "prod_img/" . $product['prod_image'];
?><!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<body>
<?php include('header.php'); ?>

	<div class="grow" style="background-color: #dff0d8; border-color: #d6e9c6">
		<div class="container">
			<h2 style="color: #3c763d; font-weight: regular;">Delete Item</h2>
		</div>
	</div>
	<div class="container">
		<div class="clearfix"><br><br></div>
		<div class="col-md-offset-2 col-md-8">
			<div style="background-color: #ebccd1; height: 50px;">
				<div class="clearfix"></div>
				<h3>&nbsp;&nbsp;&nbsp;&nbsp;Remove this product from cart?</h3>
			</div>
			<div class="panel panel-body panel-danger" style="border-color: #ebccd1;">
				<form class="form-horizontal" action="php/deletecart.php" method="post" enctype="multipart/form">
					<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<div class="col-md-8">
						<h4>Product Code: <?php echo $product['prod_code'] ?></h4>
						<div class="clearfix"></div>
						<h4>Product Name: <?php echo $product['prod_name'] ?></h4>
						<div class="clearfix"></div>
						<h4>Quantity: <?php echo $cart['quantity'] ?></h4>
					</div>
					<div class="col-md-4">
						<img src="<?php echo $prod_img ?>" style="height: 180px; width: 180px;">
					</div>
					<div class="clearfix"></div>
					<br>
					<div class="panel">
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-success">Yes</button>
						<a href="checkout.php" class="btn btn-danger">No</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>