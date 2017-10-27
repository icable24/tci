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
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1>New Product</h1>
              <br>
            </div>
            <div class="panel-body">
              <form action="#" enctype="multipart/form-data" method="post">
                <div class="row justify-content-center">
                  <div class="col-5">
                    <div class="control-group">
                      <label class="control-label" for="prod_name">
                        Product Name
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" placeholder="Product Name" class="form-control" required="">               
                      </div>
                    </div>
                  </div>
                  <div class="col-5">
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
                  <div class="col-5">
                    <div class="control-group">
                      <label class="control-label" for="prod_price">Product Price </label>
                      <div class="controls">
                        <input id="prod_price" name="prod_price" step="100" type="number" placeholder="Product Price" class="form-control" required="number">
                      </div>
                    </div>
                  </div>
                  <div class="col-5">
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
                  <div class="col-5">
                    <div class="control-group">
                      <label class="control-label" for="prod_desc">Description</label>
                      <textarea class="form-control" rows="5" name="prod_desc" id="prod_desc"></textarea>
                    </div>
                  </div>
                  <div class="col-5">
                      <div>
                        <div class="control-group">
                          <label for="dimension" class="control-label">Dimension</label>
                        </div>
                        <div class="row justify-content-center">
                          <div class="col-4">
                            <div class="control-group">
                              <label for="" class="control-label">Length</label>
                              <div class="controls">
                                <input type="number" step="0.01" class="form-control" name="prod_length" required>
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
                        <div class="row justify-content-start">
                          <div class="col-4">
                            <div class="control-group">
                              <label for="prod_image" class="control-label">Upload Image</label>
                              <div class="controls">
                                <input type="hidden" name="size" value="1000000">
                                <input type="file" name="image">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
  </body>
</html>