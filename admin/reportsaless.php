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
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#reporttype").change(function(){
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
      <!-- Body Section -->
      <br><br><br>
      	<div class="container-fluid">
        <div class="offset-1 col-10">
          <div class="alert alert-success">
            <div>
              <h1>Total Sales Report</h1>
            </div>
            <div class="card-block">
              <form action="generatesalesreport.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                <br> <br>
                <center>
                <div class="row">
                <div class="col control-group">
                      <label class="control-label" for="inputcategory">Customer Type</label>
                      <div class="controls">
                        <select id="custype" name="custype" style="width: 3in" class="form-control" required="">
                          <option></option>
                          <option value="all">All</option>
                          <option value="SB">Single Buyer</option>
                          <option value="C">Company</option>
                        </select>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                <div class="col control-group">
                      <label class="control-label" for="inputcategory">Report Type</label>
                      <div class="controls">
                        <select id="reporttype" name="reporttype" style="width: 3in" class="form-control" required="">
                          <option></option>
                          <option value="STS">Summary</option>
                          <option value="DTS">Detailed</option>
                        </select>
                    </div>
                  </div>
                </div>
                
                    <br><br>
				<div class="row justify-content-center ">
                  <div class="col-6 STS box">
                    <div class="control-group">
                     <label class="control-label" for="sdate">Start Date:</label>
                                            <div class="controls">
                                                              <input style="background-color: white; text-align: center;" id="sdate" name="sdate" type="sdate" class="form-control datepicker" style="width: 2in">
                    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/js/gijgo.min.js" type="text/javascript"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
                    <script type="text/javascript">
                      // When the document is ready
                      
                        
                        $('#sdate').datepicker({
                          format: "yyyy-mm-dd"
                        });  
                      
                    </script>
                                  </div>
                                  </div>
                                  </div>

                                                        <!-- Text input-->
              
          <div class="col-6 STS box">
                    <div class="control-group">
                      <label class="control-label" for="edate">End Date:</label>
                                            <div class="controls">
                                                              <input style="background-color: white; text-align: center;" id="edate" name="edate" type="edate" class="form-control datepicker" style="width: 2in">
                     <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/js/gijgo.min.js" type="text/javascript"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
                    <script type="text/javascript">
                      // When the document is ready
                        
                        $('#edate').datepicker({
                          format: "yyyy-mm-dd"
                        });
                    </script>
							  									</div>
																</div>
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



      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>