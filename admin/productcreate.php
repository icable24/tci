<?php 
  include('../login_success.php');
  include('../database.php');
?>
<!DOCTYPE html>
<html>
  <?php include('head.php'); ?>
  <body>
    <!-- Side Navbar -->
    <?php include('sidenavbar.php'); ?>
    <div class="page home-page">
      <!-- navbar-->
      <?php include('header.php'); ?>
      <!-- Body Section -->
      <br>
      <div class="container-fluid">
        <div class="offset-1 col-10">
          <div class="alert alert-success">
            <div>
              <h1>New Product</h1>
            </div>
            <div class="card-block">
              <form action="../php/addprod.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                <div class="row">
                  <div class="col-6">
                    <div class="control-group">
                      <label for="prod_code">Product Code</label>
                      <div class="controls">
                        <input type="text" name="prod_code" id="prod_code" placeholder="Product Code" class="form-control" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="prod_name">
                        Product Name
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" placeholder="Product Name" class="form-control" required="">               
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="pf_name">Finish</label>
                      <div class="controls">
                        <select id="pf_name" name="pf_name"  class="form-control" required="">
                          <option></option>
                          <option >Semi Gloss</option>
                          <option>High Gloss</option>
                          <option>Diamond</option>
                        </select>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="prod_price">Product Price </label>
                      <div class="controls">
                        <input id="prod_price" name="prod_price" step="100" type="number" placeholder="Product Price" class="form-control" required="number">
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="pc_name">Category</label>
                        <div class="controls">
                          <select class="form-control" name="pc_name" id="pc_name" required="">
                            <option></option>
                            <option>Light Furnitures</option>
                            <option>Accessories</option>
                            <option>Wall Decor</option>
                            <option>Luminaries</option>
                            <option>Home Furnishing</option>
                          </select>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-start">
                  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="prod_desc">Description</label>
                      <textarea class="form-control" rows="5" name="prod_desc" id="prod_desc"></textarea>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row justify-content-start">
                      <div class="col-12">
                        <div class="control-group">
                          <label for="prod_image" class="control-label">Upload Image</label>
                          <div class="controls">
                            <input type="hidden" name="size" value="1000000">
                            <input type="file" id="prod_image" name="prod_image" accept="image/gif, image/jpeg, image/png, image/jpg" onchange="readURL(this);">
                              <br>
                              <div class="row justify-content-center">
                                <img id="blah" src="#" alt="" />
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="row">
                <div class="col">
                  <label>Dimension (in cm):</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="radio1">
                    <input type="radio" name="test" id="lwh" value="radio1" checked="" onclick="btnCheck()" />
                  </label> 
                </div>
                <div class="col">
                  <label for="radio2">
                    <input type="radio" name="test" value="radio2" onclick="btnCheck2()">
                  </label>
                </div>
              </div>
              <div class="row justify-content-start">
                <div class="col-6">
                  <div class="row justify-content-center">
                    <div class="col-4">
                      <div class="control-group">
                        <label for="prod_length" class="control-label">Length</label>
                        <div class="controls">
                          <input type="number" step="0.1" class="form-control" name="prod_length" id="prod_length" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="control-group">
                        <label for="prod_width" class="control-label">Width</label>
                        <div class="controls">
                          <input type="number" step="0.1" class="form-control" name="prod_width" id="prod_width" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="control-group">
                        <label for="prod_height" class="control-label">Height</label>
                        <div class="controls">
                          <input type="number" step="0.1" class="form-control" name="prod_height" id="prod_height" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row justify-content-center">
                    <div class="col-4">
                      <div class="control-group">
                        <label for="prod_diameter">Diameter</label>
                        <div class="controls">
                          <input type="number" name="prod_diameter" id="prod_diameter" step="0.1" class="form-control" disabled="">
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="control-group">
                        <label for="prod_height2">Height</label>
                        <div class="controls">
                          <input type="number" name="prod_height2" id="prod_height2" step="0.1" class="form-control" disabled="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
              </div>
                <div class="footer">
                  <div class="form-actions text-center forms">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-secondary" href="productlist.php">Cancel</a>
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