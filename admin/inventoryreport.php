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
      <br>
      	<div class="container-fluid">
        <div class="offset-1 col-10">
          <div class="alert alert-success">
            <div>
              <h1>Inventory Report</h1>
            </div>
            <div class="card-block">
              <form action="generateinventoryreport.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                
                    <br>
                    <center>
                      <div class="control-group">
                      <label class="control-label" for="inputcategory">Report Category</label>
                      <div class="controls">
                        <select  style="width: 3in" class="form-control" required="required" id="inputcategory" name="rcategory">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Category ------</option>
                          <option value="BC" disabled="">By Company</option>
                          <option value="BP">By Product</option>
                        </select>
                    </div>
                  </div>
                  <br><br>
                   <div class="control-group">
                      <label class="control-label" for="inputcategory">Store Location</label>
                      <div class="controls">
                        <select  style="width: 5in;" class="form-control" required="required" id="inputcategory" name="slocation" disabled="">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Store Location ------</option>
                          <option value="R">Robinsons</option>
                        </select>
                    </div>
                  </div>

                  <br><br>
                   <div class="control-group">
                      <label class="control-label" for="inputcategory">Product Category</label>
                      <div class="controls">
                        <select  style="width: 5in;" class="form-control" required="required" id="inputcategory" name="pcategory">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Product Category ------</option>
                          <option value="all">All</option>
                          <option value="LF">Light Furniture</option>
                          <option value="A">Accessories</option>
                          <option value="WD">Wall Decor</option>
                          <option value="L">Luminaries</option>
                          <option value="HF">Home Furniture</option>
                        </select>
                    </div>
                  </div>
                  </center>
                   <br><br><br>
<button type="submit" name="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Generate </button>
</center>
</div>
</div>
</div>
</div>
</form>
<br>
</form>
</div>
      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>