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
      <br><br><br><br><br>
      	<div class="container-fluid">
        <div class="offset-1 col-10">
          <div class="alert alert-success">
            <div>
              <h1>Sales Report</h1>
            </div>
            <div class="card-block">
              <form action="generatesalesreport.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                <center>
                  <div class="control-group">
                      <label class="control-label" for="inputcategory">Report Category</label>
                      <div class="controls">
                        <select id="salesreport" name="sreport" style="width: 2in; height:0.35in" class="form-control" required="">
                          <option></option>
                          <option value="BS">Best Seller</option>
                          <option value="TSR">Total Sales Report</option>
                        </select>
                    </div>
                  </div>
                <br><br>
                  <div class="control-group">
                  <label class="control-label" for="demo">Date Range</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="demo" name="daterange" placeholder="YYYY-MM-DD" style="width: 3in" focus=""/>
                                        </div>
                                        <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
                                        <script type="text/javascript">
                                          $(document).ready(function () {
                                        $('#demo').daterangepicker({
    "startDate": "01/31/2018",
    "endDate": "02/13/2018"
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
                                      });
                                          </script>
                  </div>
                        
<br><br><br><br>
<button type="submit" name="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span> Generate </button>	
</center>
</form>
</div>
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