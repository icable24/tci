<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 10px;
    height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>
<body>
<!--header-->
<?php include('header.php'); ?>
  
  <!-- grow -->
  <div class="grow">
    <div class="container">
      <h2 style="font-family: verdana">Place Order</h2>
    </div>
  </div>
  <!-- grow -->
<!--content-->
      
  	<h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Address</h3>
  <div class="container-fluid" style="width: 12.5in;">
        <div class="col-lg-12">
          <div class="panel panel-default" style="height: 5in;">
            <div class="panel-heading">
              <span>Please fill out your you delivery address:</span>
              <br>
            </div>
            <div class="panel-body">
              <form action="payment.php" enctype="multipart/form-data" method="post">
                <div class="row">
                  <div class="column">
                   <label class="control-label" for="prod_name">
                        First Name
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="prod_name">
                        Last Name
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="prod_name">
                        Company
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="prod_name">
                        Address
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="prod_name">
                        Tel. No. / Mobile No.
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                  </div>
                  <div class="column">
                    <label class="control-label" for="prod_name">
                        City
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="prod_name">
                        State
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="prod_name">
                        Zip/Postal Code
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="pf_name">Country</label>
                      <div class="controls">
                      <select id="country" name="country" class="form-control" required="">
                                    <option>Brunei</option>
                                    <option>Cambodia</option>
                                    <option>Indonesia</option>
                                    <option>Laos</option>
                                    <option>Malaysia</option>
                                    <option>Myanmar</option>
                                    <option>Philippines</option>
                                    <option>Singapore</option>
                                    <option>Thailand</option>
                                    <option>Vietnam</option>
                      </select>
                      </div>
                      <br>
                      <label class="control-label" for="prod_name">
                        Additional Information
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                  </div>
                  <div class="column" style="background-color: #ebebc6; width: 3.8in; margin-top: 0.30in; height: 3.68in" >
                    <input class="pull-right " title="Update Address" type="image" src="img/products/edit.png" alt="Submit" width="48" height="48">
                    <span></span>
                  </div>
                </div>
            
          </div>
        </div>
        <br>
        <br>
         <button type="submit" class="w3-button pull-right" onclick="plusDivs(1)" style=" font-family: verdana; background-color: #8de78b; color: white; font-weight: bold;"> Address &#10095;</button>
         <a href="productsummary.php" class="w3-button pull-right" style="margin-right: 0.78in; font-family: verdana; background-color: #8de78b; color: white; font-weight: bold; width: 1.2in; text-decoration: none" title="Product Summary">  &#10094; &nbsp; Back </a>
         </form>
      </div>
    </div>

    <br>
    <br>
          
<?php include('footer.php'); ?>
</body>
</html>
