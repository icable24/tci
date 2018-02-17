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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#reporttype").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".boxx").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".boxx").hide();
            }
        });
    }).change();
});
</script>
     <br><br><br>
        <div class="container-fluid">
        <div class="offset-1 col-10">
          <div class="alert alert-success">
            <div align="center">
              <span class="fa fa-truck fa-3x"></span>
              <h1>Order Report</h1>
            </div>
            <div class="card-block">
              <form action="generateorder.php" id="myform" name="myform" enctype="multipart/form-data" method="post">
                
                    <br> 
                    <center>
                      <div class="control-group">
                      <label class="control-label" for="inputcategory">Customer Type</label>
                      <div class="controls">
                        <select  style="width: 3in" class="form-control" required="required" id="custype" name="custype">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Type ------</option>
                          <option value="SB">Single Buyer</option>
                          <option value="C">Company</option>
                        </select>
                    </div>
                  </div>
                  <br>
                      <div class="control-group">
                      <label class="control-label" for="inputcategory">Report Category</label>
                      <div class="controls">
                        <select  style="width: 3in" class="form-control" required="required" id="reportcategory" name="rcategory">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Category ------</option>
                          <option value="D">Delivery</option>
                          <option value="CO">Cancelled Orders</option>
                        </select>
                    </div>
                  </div>
                  <br>
                  <div class="D box">
                     <label class="radio-inline"><input type="radio" name="optradio" value="DO">&nbsp;&nbsp;Discounted Orders</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="radio-inline"><input type="radio" name="optradio" value="NO">&nbsp;&nbsp;Non-discounted Orders</label>
                  </div>
                  <br>
                   <div class="D box">
                      <label class="control-label" for="inputcategory">Report Type</label>
                      <div class="controls">
                        <select  style="width: 3in;" class="form-control" required="required" id="reporttype" name="rtype">
                          <option value="none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------ Select Type ------</option>
                          <option value="Sm">Summary</option>
                          <option value="Dl">Detailed</option>

                        </select>
                    </div>
                  </div>

                  <br>
              
        <div class="row justify-content-center D box">
                  <div class="col-6 Sm boxx">
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
              
          <div class="col-6 Sm boxx">
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


        <div class="row justify-content-center">
                  <div class="col-6 CO box">
                    <div class="control-group">
                      <label class="control-label" for="ssdate">Start Date:</label>
                                            <div class="controls">
                                                              <input style="background-color: white; text-align: center;" id="ssdate" name="ssdate" type="ssdate" class="form-control datepicker" style="width: 2in">
                    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/js/gijgo.min.js" type="text/javascript"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
                    <script type="text/javascript">
                      // When the document is ready
                      
                        
                        $('#ssdate').datepicker({
                          format: "yyyy-mm-dd"
                        });  
                      
                    </script>
                                  </div>
                                  </div>
                                  </div>

                                                        <!-- Text input-->
              
          <div class="col-6 CO box">
                    <div class="control-group">
                      <label class="control-label" for="eedate">End Date:</label>
                                            <div class="controls">
                                                              <input style="background-color: white; text-align: center;" id="eedate" name="eedate" type="eedate" class="form-control datepicker" style="width: 2in">
                     <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/js/gijgo.min.js" type="text/javascript"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.2/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
                    <script type="text/javascript">
                      // When the document is ready
                      
                        
                        $('#eedate').datepicker({
                          format: "yyyy-mm-dd"
                        });  
                      
                    </script>
                                  </div>
                                </div>
                                </div>
        </div>
                 
                   <br><br>
<button type="submit" name="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Generate </button>
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