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
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#reportcategory").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
      <br><br><br><br>
      	<div class="container-fluid">
        <div class="offset-1 col-10">
          <div class="alert alert-success">
            <div>
              <h1>Product Catalog Report</h1>
            </div>
            <div class="card-block">
              <form action="generateprodcatalog.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                
                    <br>
                    <center>
                      <div class="control-group">
                      <label class="control-label" for="inputcategory">Report Category</label>
                      <div class="controls">
                        <select  style="width: 3in" class="form-control" required="required" id="reportcategory" name="rcategory">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Category ------</option>
                          <option value="BS">By Store</option>
                          <option value="BP">By Product</option>
                        </select>
                    </div>
                  </div>
                  <br><br>
                   <div class="BS box">
                      <label class="control-label" for="inputcategory">Store Location</label>
                      <div class="controls">
                        <select  style="width: 5in;" class="form-control" required="required" id="storelocation" name="slocation">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Store Location ------</option>
                          <option value="CCR">G/F Cybergate Center Robinsons, Singcang</option>
                          <option value="ANP">ANP, City Walk Robinsons Mall, Mandalagan</option>

                        </select>
                    </div>
                  </div>
                  <br>
                   <div class="BS box">
                      <label class="control-label" for="inputcategory">Product Category</label>
                      <div class="controls">
                        <select  style="width: 5in;" class="form-control" required="required" id="productcategory" name="p1category">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Product Category ------</option>
                          <option value="all1">All</option>
                          <option value="LF1">Light Furniture</option>
                          <option value="A1">Accessories</option>
                          <option value="WD1">Wall Decor</option>
                          <option value="L1">Luminaries</option>
                          <option value="HF1">Home Furnishing</option>
                        </select>
                    </div>
                  </div>

                   <div class="BP box">
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
                  </center>
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