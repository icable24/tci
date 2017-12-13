<!DOCTYPE html>
<html>
<?php 	
	include('head.php');
	include('database.php');

	$pdo = Database::connect();

	if(!empty($_GET['id'])){
		$pc_id = $_REQUEST['id'];

		$category = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = $pc_id");
		$category->execute();
		$category = $category->fetch(PDO::FETCH_ASSOC);

	}else{
		header('location:index.php');
	}
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
    width: 33.33%;
    padding: 10px;/* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

.img-responsive{
	height: 400px;
	width: 300px;
}
</style>
<body>
<?php  include('header.php'); ?>
	<!-- Product Catalog Header -->
	<div class="alert alert-success">
		<div class="container">
			<h2 style="font-family: verdana;"><?php echo $category['pc_name']; ?></h2>
		</div>
	</div>
	<br>
	<div class="container-fluid">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<?php 
						if(isset($_SESSION['login_username'])){
							$pc_id = $category['pc_id'];
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$product= $pdo->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM product WHERE pc_name = ? ORDER BY prod_code');
							$product->execute(array($pc_id));
							$product = $product->fetchAll(PDO::FETCH_ASSOC);

							foreach($product as $row){
								echo '<div class="column simpleCart_shelfItem">';
									echo '<div class="product-at ">';
										echo '<a href="productdetails.php'. "?id=". $row['prod_code'].'">';
											echo '<img class="img-responsive" src="prod_img/' . $row['prod_image'] . '" alt ="'. $row['prod_image'] . '">';
											echo '<div class="pro-grid">';
												echo '<span class="buy-in">Buy Now</span>';
											echo '</div>';
										echo '</a>';
									echo '</div>';
									echo '<p class="tun">'. $row['prod_name'] . '</p>';
									echo '<div class="ca-rt">';
										echo '<p class="number item_price"><i> </i> Php '. number_format($row['prod_price'], 2) . '</p>'	;
									echo '</div>';
								echo '</div>';
								}
						}else{
							$pc_id = $category['pc_id'];
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$product= $pdo->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM product WHERE pc_name = ? ORDER BY prod_code');
							$product->execute(array($pc_id));
							$product = $product->fetchAll(PDO::FETCH_ASSOC);

							foreach($product as $row){
								echo '<div class="column simpleCart_shelfItem">';
									echo '<div class="product-at ">';
										echo '<a href="productdetails.php'. "?id=". $row['prod_code'].'">';
											echo '<img class="img-responsive" src="prod_img/' . $row['prod_image'] . '" alt ="'. $row['prod_image'] . '">';
											echo '<div class="pro-grid">';
												echo '<span class="buy-in">View</span>';
											echo '</div>';
										echo '</a>';
									echo '</div>';
									echo '<p class="tun">'. $row['prod_name'] . '</p>';
									echo '<div class="ca-rt">';
									echo '</div>';
								echo '</div>';
										}
										 
									}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
  <?php include('footer.php'); ?>
</body>
</html>