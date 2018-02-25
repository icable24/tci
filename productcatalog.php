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

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  	$perPage = 9;

// Positioning
  	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

  	$p = $pdo->prepare("SELECT count(*) FROM product WHERE pc_name = ?");
	$p->execute(array($category['pc_id']));
	$p = $p->fetch(PDO::FETCH_ASSOC);

	$total = $p['count(*)'];
    $pages = ceil($total / $perPage);
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
    margin-right: 1.65%;
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
	height: 350px;
	width: 300px;
}

.pagination > li > a:hover{
	background-color: #8ce78a;
	border-color: #8ce78a;
}

.page1{
	border-color: #dff0d8 !important;
	background-color: #dff0d8 !important;
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
							$product= $pdo->prepare("SELECT * FROM product WHERE pc_name = $pc_id LIMIT {$start},{$perPage}");
							$product->execute();
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
									echo '<div class="cleafix"></div><br>';
									echo '<p style="color:#6e7786;">'. $row['prod_name'] . '</p>';
									echo "<div class='clearfix'></div><br>";
										echo '<span> Php '. number_format($row['prod_price'], 2) . '</span>'	;
								echo '</div>';
								}
						}else{


							$pc_id = $category['pc_id'];
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$product= $pdo->prepare("SELECT * FROM product WHERE pc_name = $pc_id LIMIT {$start},{$perPage}");
							$product->execute();
							$product = $product->fetchAll(PDO::FETCH_ASSOC);

							foreach($product as $row){

								echo '<div class="column simpleCart_shelfItem">';
									echo '<div class="product-at ">';
										echo '<a href="productdetailsnotlogin.php'. "?id=". $row['prod_code'].'" >';
											echo '<img class="img-responsive" src="prod_img/' . $row['prod_image'] . '" alt ="'. $row['prod_image'] . '">';
											echo '<div class="pro-grid">';
												echo '<span class="buy-in">View</span>';
											echo '</div>';
										echo '</a>';
									echo '</div>';
									echo '<div class="cleafix"></div><br>';
									echo '<p style="color:#6e7786;">'. $row['prod_name'] . '</p>';
								echo '</div>';
										}
										 
							}
						?>
					</div>
					<div class="row">
        <div class="offset-5 col">
          <div class="row">
       <nav class="text-center">
          <ul class="pagination">
          <?php if($page > 1){?>
            <li>
              <a href="productcatalog.php?id=<?php echo $category['pc_id']; ?>&page=<?php echo $page-1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          <?php }?>
          
          <?php for($x = 1; $x <= $pages; $x++) : ?>
            <li><a href="productcatalog.php?id=<?php echo $category['pc_id']; ?>&page=<?php echo $x; ?>" <?php if($x === $page){echo "class=page1";} ?>><?php echo $x; ?></a></li>
          <?php endfor; ?>
          
          <?php if($page < $pages){?>
            <li>
              <a href="productcatalog.php?id=<?php echo $category['pc_id']; ?>&page=<?php echo $page+1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          <?php }?>
          
          </ul>
      </nav>
      </div>
        </div>
      </div>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
  <?php include('footer.php'); ?>
</body>
</html>