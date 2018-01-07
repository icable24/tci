<?php 
  include('../login_success.php');
  include('../database.php');

  $pdo = Database::connect();

  $featured = $pdo->prepare("SELECT * FROM featuredprod ORDER BY featured_id");
  $featured->execute();
  $featured = $featured->fetchAll();

  $prod =array();

  for($i = 0; $i < 5; $i++){
  	$prod[$i] = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
  	$prod[$i]->execute(array($featured[$i]["prod_id"]));
  	$prod[$i] = $prod[$i]->fetch();
  }
?>
<!DOCTYPE html>
<style>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
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
    background-color: #ff9800;
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
    float: right !important;
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
	            				for($a = 0; $a < 5; $a++){
	            					$img[$a] = "../prod_img/" . $prod[$a]['prod_image'];
	            				}
	            			?>
	            			<div class="row">
	            				<div class="offset-10">
	            					<a href="productlist.php" class="btn btn-primary">Add Product</a>
	            				</div>
	            			</div>
	            			<div class="clearfix"></div>
	            			<br><br>
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
			            			<button class="btn btn-danger" id="myBtn1">Remove</button>
			            		</div>
			            	</div>
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
			            			<button class="btn btn-danger" id="myBtn2">Remove</button>
			            		</div>
			            	</div>
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
			            			<button class="btn btn-danger" id="myBtn3">Remove</button>
			            		</div>
			            	</div>
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
			            			<button class="btn btn-danger" id="myBtn4">Remove</button>
			            		</div>
			            	</div>
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
			            			<button class="btn btn-danger" id="myBtn5" <?php if(empty($prod[4]["prod_id"])){
			            				echo "disabled";
			            			} ?>>Remove</button>
			            		</div>
			            	</div>
			            	<div class="clearfix"></div>
			            </div>
            		</div>
            	</div>
            </div>	
		</div>
	</div>
	<div id="modal1" class="modal">
  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-body">
	      <p>Are you sure you want to remove this product?</p>
	      <div class="row" style="text-align: center;">
	      	<p style="margin-left: 20%;"><?php echo $prod[0]["prod_name"] ?></p>
	      </div>
	      <div class="row" style="text-align: center;">
	      	<div class="col">
	      		<a href='../php/removeFeature.php?id=<?php echo $prod[0]["prod_id"] ?>' class="btn btn-success">Yes</a>
	      		<button class="btn btn-danger"><span id="modclose1">No</span></button>
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
	      	<p style="margin-left: 20%;"><?php echo $prod[1]["prod_name"] ?></p>
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
	      	<p style="margin-left: 20%;"><?php echo $prod[2]["prod_name"] ?></p>
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
	      	<p style="margin-left: 20%;"><?php echo $prod[3]["prod_name"] ?></p>
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
	      	<p style="margin-left: 20%;"><?php echo $prod[4]["prod_name"] ?></p>
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
	<script>
// Get the modal
var modal1 = document.getElementById('modal1');
var modal2 = document.getElementById('modal2');
var modal3 = document.getElementById('modal3');
var modal4 = document.getElementById('modal4');
var modal5 = document.getElementById('modal5');

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");
var btn4 = document.getElementById("myBtn4");
var btn5 = document.getElementById("myBtn5");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var cc1 = document.getElementById("modclose1");
var cc2 = document.getElementById("modclose2");
var cc3 = document.getElementById("modclose3");
var cc4 = document.getElementById("modclose4");
var cc5 = document.getElementById("modclose5");

// When the user clicks the button, open the modal 
btn1.onclick = function() {
    modal1.style.display = "block";
}

btn2.onclick = function() {
    modal2.style.display = "block";
}

btn3.onclick = function() {
    modal3.style.display = "block";
}

btn4.onclick = function() {
    modal4.style.display = "block";
}

btn5.onclick = function() {
    modal5.style.display = "block";
}


cc1.onclick = function() {
    modal1.style.display = "none";
}
cc2.onclick = function() {
    modal2.style.display = "none";
}
cc3.onclick = function() {
    modal3.style.display = "none";
}
cc4.onclick = function() {
    modal4.style.display = "none";
}
cc5.onclick = function() {
    modal5.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
   modal1.style.display = "none";
    modal2.style.display = "none";
    modal3.style.display = "none";
    modal4.style.display = "none";
    modal5.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
    if (event.target == modal5) {
        modal5.style.display = "none";
    }
}
</script>

</html>