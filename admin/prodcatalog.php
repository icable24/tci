<?php
  include('../login_success.php');
  include('../database.php');
?>
<!DOCTYPE html>
<html>
  <?php include('head.php');?>
  <body>
    <!-- Side Navbar -->
    <?php include('sidenavbar.php');?>
    <div class="page home-page">
      <!-- navbar-->
      <?php include('header.php');?>
      <!-- Body Section -->
      <br><br><br>
      	<div class="container-fluid">
        <div class="offset-1 col-10">
          <div class="alert alert-success">
            <br>
            <div align="center">
              <span class="fa fa-tags fa-3x"></span>
              <h1>Product Catalog Report</h1>
            </div>
            <div class="card-block" style="height: 4in">
              <form action="generateprodcatalog.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                
                    <br> <br> <br>
                    <center>
                      <div class="control-group">
                      <label class="control-label" for="inputcategory">Product Category</label>
                      <div class="controls">
                        <select  style="width: 5in;" class="form-control" required="required" id="productcategory" name="pcategory">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Product Category ------</option>
                          <option value="all">All</option>
                          <option value="LF">Light Furniture</option>
                          <option value="A">Accessories</option>
                          <option value="WD">Wall Decor</option>
                          <option value="L">Luminaries</option>
                          <option value="HF">Home Furnishing</option>
                        </select>
                    </div>
                  </div>
                  
                   <br><br><br>
<button type="submit" name="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Generate </button>
</center>
</div>
</div>

</div>
</div>
</form>

      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>