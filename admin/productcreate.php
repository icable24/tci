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
              <form action="../php/addprod.php" enctype="multipart/form-data" method="post">
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
                          <option >Glossy</option>
                          <option>Matte</option>
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
                          <select class="form-control" name="pc_name" id="pc_name">
                            <option></option>
                            <option>Light Furnitures</option>
                            <option>Gifts and Housewares</option>
                            <option>Luminaries</option>
                          </select>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="prod_desc">Description</label>
                      <textarea class="form-control" rows="5" name="prod_desc" id="prod_desc"></textarea>
                    </div>
                  </div>
                  <div class="col-6">
                      <div>
                        <div class="row justify-content-end">
                          <div class="col-12">
                            <div class="control-group">
                              <label for="prod_image" class="control-label">Upload Image</label>
                              <div class="controls">
                                <input type="hidden" name="size" value="1000000">
                                <input type="file" name="image" accept="image/gif, image/jpeg, image/png, image/jpg" onchange="readURL(this);">
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
                  </div>
                  <div class="row">
                    <div class="col">
                      <label>Dimension:</label>
                    </div>
                  </div>
                  <div class="row justify-content-start">
                    <div class="col-6">
                      <div class="row justify-content-center">
                        <div class="col-4">
                          <div class="control-group">
                            <label for="" class="control-label">Length</label>
                            <div class="controls">
                              <input type="number" step="0.1" class="form-control" name="prod_length" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="control-group">
                            <label for="" class="control-label">Width</label>
                            <div class="controls">
                              <input type="number" step="0.01" class="form-control" name="prod_width" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="control-group">
                            <label for="" class="control-label">Height</label>
                            <div class="controls">
                              <input type="number" step="0.01" class="form-control" name="prod_height" required>
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
  </script>
  </body>
</html>