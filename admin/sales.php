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
              <h1>Sales Report</h1>
            </div>
            <div class="card-block">
              <form action="../php/addprod.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                
                <div class="control-group">
                      <label class="control-label" for="pf_name">Report Category</label>
                      <div class="controls">
                        <select id="pf_name" name="pf_name" style="width: 2in" class="form-control" required="">
                          <option></option>
                          <option >Best Seller</option>
                          <option>Total Sales Report</option>
                        </select>
                    </div>
                  </div>
                    <br><br>
				<div class="row justify-content-center">
                  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="sdate">Start Date:</label>
                      										  <div class="controls">
                                                              <input id="sdate" name="sdate" type="sdate" class="form-control datepicker" style="width: 2in">
							    		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#sdate').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
										</script>
							  								  </div>
							  								  </div>
							  								  </div>

                                                        <!-- Text input-->
							
				  <div class="col-6">
                    <div class="control-group">
                      <label class="control-label" for="edate">End Date:</label>
                      										  <div class="controls">
                                                              <input id="edate" name="edate" type="edate" class="form-control datepicker" style="width: 2in">
							    		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#edate').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
										</script>
							  									</div>
																</div>
																</div>
				</div>

							<br></br>


                                                     <!-- Select Basic -->

				<div class="row">
                <div class="col">
                  <label for="radio1">
                    <span><a href="#specify"><input type="radio" name="test" id="all" value="radio1" checked="" onclick="btnCheck()" /> &nbsp;All</a></span>
                  </label> 
                </div>
                <div class="col">
                  <label for="radio2">
                    <span>
                    	<input type="radio" name="test" id="specify" value="radio2" onclick="btnCheck2()">
                     &nbsp;Specify</span>
                  </label>
                </div>
              	</div>
                        
<br><br><br><br>
<button type="submit" name="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span> Generate </button>	
</center>
</div>
</div>
</div>
</div>
</form>
</div>



      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>