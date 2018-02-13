<?php 
  include('../login_success.php');
  include('../database.php');

  $user_name = $_SESSION['login_username'];
  $pdo = Database::connect();
  $name = $pdo->prepare("SELECT * FROM account WHERE user_name like '$user_name'");
  $name->execute();
  $name = $name->fetch(PDO::FETCH_ASSOC); 

  if(!empty($_GET['id'])){
  	$prod_id = $_REQUEST['id'];

  	$product = $pdo->prepare("SELECT * FROM product WHERE prod_id = '$prod_id'");
  	$product->execute();
  	$product = $product->fetch(PDO::FETCH_ASSOC);

  	$pf_name = $product['pf_name'];
  	$finish = $pdo->prepare("SELECT * FROM productfinish WHERE pf_id = $pf_name");
  	$finish->execute();
  	$finish = $finish->fetch(PDO::FETCH_ASSOC);

  	$pc_name = $product['pc_name'];
  	$category = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = $pc_name");
  	$category->execute();
  	$category = $category->fetch(PDO::FETCH_ASSOC);
  }else{
  	header('location:productlist.php');
  }
?>
<!DOCTYPE html>
<html>
	<?php include('head.php'); ?>
	 <!-- Side Navbar -->
    <?php include('sidenavbar.php'); ?>
    <div class="page home-page">
      <!-- navbar-->
      <?php include('header.php'); ?>
      <br>
      <div class="container-fluid">
      	<div class="offset-1 col-10">
      		<div class="alert alert-success">
      			<div>
      				<h1>View Product</h1>
      			</div>
      			<div class="card-block">
      				<form action="../php/updateprod.php?id=<?php echo $product['prod_id'] ?>" id="myform" name="myform" enctype="multipart/form-data" method="post">
		                <div class="row">
		                  <div class="col-6">
		                    <div class="control-group">
		                      <label for="prod_code">Product Code</label>
		                      <div class="controls">
		                        <input type="text" name="prod_code" id="prod_code" placeholder="<?php echo $product['prod_code'] ?>" class="form-control" required="" disabled="">
		                      </div>
		                    </div>
		                  </div>
		                </div>
		                <div class="row justify-content-center">
		                  <div class="col-6">
		                    <div class="control-gr  oup">
		                      <label class="control-label" for="prod_name">
		                        Product Name
		                      </label>
		                      <div class="controls">
		                        <input id="prod_name" name="prod_name" type="text" value="<?php echo $product['prod_name'] ?>" class="form-control" required="" disabled>               
		                      </div>
		                    </div>
		                  </div>
		                  <div class="col-6">
		                    <div class="control-group">
		                      <label class="control-label" for="pf_name">Finish</label>
		                      <div class="controls">
		                        <input type="text" id="pf_name" name="pf_name" value="<?php echo $finish['pf_name']; ?>" class="form-control" required="" disabled="">
		                    </div>
		                    </div>
		                  </div>
		                </div>
		                <div class="row justify-content-center">
		                  <div class="col-6">
		                    <div class="control-group">
		                      <label class="control-label" for="prod_price">Product Price </label>
		                      <div class="controls">
		                        <input id="prod_price" name="prod_price" step="100" type="number" placeholder="Product Price" class="form-control" required="number" value="<?php echo $product['prod_price'] ?>" disabled>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="col-6">
		                    <div class="control-group">
		                      <label class="control-label" for="pc_name">Category</label>
		                        <div class="controls">
		                          <input type="text" value="<?php echo $category['pc_name']; ?>" class="form-control" name="pc_name" id="pc_name" disabled>
		                        </div>
		                    </div>
		                  </div>
		                </div>
		                <div class="row justify-content-start">
		                  <div class="col-6">
		                    <div class="control-group">
		                      <label class="control-label" for="prod_desc">Description</label>
		                      <textarea class="form-control" rows="5" name="prod_desc" id="prod_desc" disabled=""><?php echo $product['prod_desc'] ?></textarea>
		                    </div>
		                  </div>
		                  <div class="col-6">
		                    <div class="row justify-content-start">
		                      <div class="col-12">
		                        <div class="control-group">
		                          <label for="prod_image" class="control-label">Product Image</label>
		                          <div class="controls">
		                           <img src="<?php echo "../prod_img/" . $product['prod_image'] ?>" style="height: 100px;width: 100px;">
		                          </div>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		              <div class="row">
		                <div class="col">
		                  <label>Dimension:</label>
		                </div>
		              </div>

		              <div class="row justify-content-start">
		              	<?php if($product['prod_length']!='0' && $product['prod_width'] != '0' && $product['prod_height'] != '0'){ ?>
		                <div class="col-6">
		                  <div class="row justify-content-center">
		                    <div class="col-4">
		                      <div class="control-group">
		                        <label for="prod_length" class="control-label">Length</label>
		                        <div class="controls">
		                          <input type="number" step="0.1" class="form-control" name="prod_length" id="prod_length" required value="<?php echo $product['prod_length']; ?>" disabled>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="col-4">
		                      <div class="control-group">
		                        <label for="prod_width" class="control-label">Width</label>
		                        <div class="controls">
		                          <input type="number" step="0.1" class="form-control" name="prod_width" id="prod_width" required value="<?php echo $product['prod_width']; ?>" disabled>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="col-4">
		                      <div class="control-group">
		                        <label for="prod_height" class="control-label">Height</label>
		                        <div class="controls">
		                          <input type="number" step="0.1" class="form-control" name="prod_height" id="prod_height" required value="<?php echo $product['prod_height']; ?>" disabled>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		                <?php }else{ ?>
		                <div class="col-6">
		                  <div class="row justify-content-center">
		                    <div class="col-4">
		                      <div class="control-group">
		                        <label for="prod_diameter">Diameter</label>
		                        <div class="controls">
		                          <input type="number" name="prod_diameter" id="prod_diameter" step="0.1" class="form-control" value="<?php echo $product['prod_diameter']; ?>" disabled>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="col-4">
		                      <div class="control-group">
		                        <label for="prod_height2">Height</label>
		                        <div class="controls">
		                          <input type="number" name="prod_height2" id="prod_height2" step="0.1" class="form-control" value="<?php echo $product['prod_height2']; ?>" disabled>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		                <?php } ?>
		              </div>  
		              </div>
		                <div class="footer">
		                  <div class="form-actions text-center forms">
		                    <a class="btn btn-success" href="productlist.php">Back</a>
		                  </div>
		                </div>
		              </form>
      			</div>
          </div>
        </div>
      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
    <script type="text/javascript">
      // readURL for uploading product images
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
      }
      
      //enable diamension by length, width and height
      function btnCheck2(){
        document.getElementById('prod_length').disabled = true;
        document.getElementById('prod_width').disabled = true;
        document.getElementById('prod_height').disabled = true;
        document.getElementById('prod_diameter').disabled = false;
        document.getElementById('prod_height2').disabled = false;
      }

      // enable dimension by diameter, height
      function btnCheck(){
        document.getElementById('prod_length').disabled = false;
        document.getElementById('prod_width').disabled = false;
        document.getElementById('prod_height').disabled = false;
        document.getElementById('prod_diameter').disabled = true;
        document.getElementById('prod_height2').disabled = true;
      }
  </script>
  </body>
</html>