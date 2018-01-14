<?php 
  include('../login_success.php');
  include('../database.php');

  $pdo = Database::connect();

  $featured = $pdo->prepare("SELECT * FROM featuredprod ORDER BY featured_id");
  $featured->execute();
  $featured = $featured->fetchAll();

  $prod =array();

    if(!empty($featured)){
	  $ct = 0;
	  foreach($featured as $row){
	  	$prod[$ct] = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
	  	$prod[$ct]->execute(array($row["prod_id"]));
	  	$prod[$ct] = $prod[$ct]->fetch();
	  	$ct++;
	  }
    }
?>
<!DOCTYPE html>
<style>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
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
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
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

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
<html>
	<?php 
		include("head.php");
	?>
	<body>
	<?php
		include('sidenavbar.php'); 
	?>
	<div class="page home-page">
		<?php 
			include("header.php");
		?>
		<br>
		<br>
		<div class="container-fluid">
			<div class="offset-1 col-10">
          		<div class="alert alert-success">
            		<div>
            			<div>
			              	<h1>Featured Products</h1>
			            </div>
			            <div class="card-block">
			            	<?php 
	            				$img = array();

	            				$a = 0;
	            				foreach($prod as $row){
	            					$img[$a] = "../prod_img/" . $row['prod_image'];
	            					$a++;	
	            				}
	            			?>
	            			<div class="row">
	            				<div class="offset-10">
	            					<a href="productlist.php" class="btn btn-primary">Add Product</a>
	            				</div>
	            			</div>
	            			<div class="clearfix"></div>
	            			<br><br>
	            			<?php if(!empty($prod[0])){ ?>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>1</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[0] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[0]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[0]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[0]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[0]['prod_id'] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<?php } ?>
			            	<?php if(!empty($prod[1])){ ?>
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>2</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[1] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[1]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[1]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[1]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[1]['prod_id'] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<?php } ?>
			            	<?php if(!empty($prod[2])){ ?>
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>3</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[2] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[2]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[2]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[2]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[2]['prod_id'] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<?php } ?>
			            	<?php if(!empty($prod[3])){ ?>
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>4</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[3] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[3]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[3]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[3]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[3]['prod_id'] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<?php } ?>
			            	<?php if(!empty($prod[4])){ ?>	
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>5</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[4] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[4]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[4]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[4]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[0]['prod_id'] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<?php } ?>
			            	<div class="clearfix"></div>
			            </div>
            		</div>
            	</div>
            </div>	
		</div>
	</div>
	<div id="modal" class="modal">
  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-body">
	      <p>Are you sure you want to remove this product?</p>
	      <div class="row" style="text-align: center;">
	      	<div class="col" style="text-align: center;">
	      		<p><?php echo $prod[0]["prod_name"] ?></p>
	      	</div>
	      </div>
	      <div class="row" style="text-align: center;">
	      	<div class="col">
	      		<a href='../php/removeFeature.php?id=<?php echo $prod[0]["prod_id"] ?>' class="btn btn-success">Yes</a>
	      		<button class="btn btn-danger" id="btnclose1" data-dismiss="modal"><span">No</span></button>
	      	</div>
	    </div>
	  </div>
	</div>
</div>
<div id="modal2" class="modal">
  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-body">
	      <p>Are you sure you want to remove this product?</p>
	      <div class="row" style="text-align: center;">
	      	<div class="col" style="text-align: center;">
	      		<p><?php echo $prod[1]["prod_name"] ?></p>
	      	</div>
	      </div>
	      <div class="row" style="text-align: center;">
	      	<div class="col">
	      		<a href='../php/removeFeature.php?id=<?php echo $prod[1]["prod_id"] ?>' class="btn btn-success">Yes</a>
	      		<button class="btn btn-danger"><span id="modclose2">No</span></button>
	      	</div>
	    </div>
	  </div>
	</div>
</div>
<div id="modal3" class="modal">
  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-body">
	      <p>Are you sure you want to remove this product?</p>
	      <div class="row" style="text-align: center;">
	      	<p style="margin-left: 30%;"><?php echo $prod[2]["prod_name"] ?></p>
	      </div>
	      <div class="row" style="text-align: center;">
	      	<div class="col">
	      		<a href='../php/removeFeature.php?id=<?php echo $prod[2]["prod_id"] ?>' class="btn btn-success">Yes</a>
	      		<button class="btn btn-danger"><span id="modclose3">No</span></button>
	      	</div>
	    </div>
	  </div>
	</div>
</div>
<div id="modal4" class="modal">
  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-body">
	      <p>Are you sure you want to remove this product?</p>
	      <div class="row" style="text-align: center;">
	      	<p style="margin-left: 30%;"><?php echo $prod[3]["prod_name"] ?></p>
	      </div>
	      <div class="row" style="text-align: center;">
	      	<div class="col">
	      		<a href='../php/removeFeature.php?id=<?php echo $prod[3]["prod_id"] ?>' class="btn btn-success">Yes</a>
	      		<button class="btn btn-danger"><span id="modclose4">No</span></button>
	      	</div>
	    </div>
	  </div>
	</div>
</div>
<div id="modal5" class="modal">
  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-body">
	      <p>Are you sure you want to remove this product?</p>
	      <div class="row" style="text-align: center;">
	      	<p style="margin-left: 30%;"><?php echo $prod[4]["prod_name"] ?></p>
	      </div>
	      <div class="row" style="text-align: center;">
	      	<div class="col"> 
	      		<a href='../php/removeFeature.php?id=<?php echo $prod[4]["prod_id"] ?>' class="btn btn-success">Yes</a>
	      		<button class="btn btn-danger"><span id="modclose5">No</span></button>
	      	</div>
	    </div>
	  </div>
	</div>
</div>
<?php include('js.php'); ?>
	</body>
</html>