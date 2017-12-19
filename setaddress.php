
<?php
  require 'database.php';
?>
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
  <?php 
    $acc_email = $_SESSION['login_username'];
  $pdo = Database:: connect();
  $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $cust = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
        $cust->execute(array($acc_email));
        $cust = $cust->fetch(PDO:: FETCH_ASSOC);
  ?>
  <!-- grow -->
  <div class="grow" style="background-color: #dff0d8; border-color: #d6e9c6">
    <div class="container">
      <h2 style="color: #3c763d; font-weight: regular;">Place Order</h2>
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
                   <label class="control-label" for="p_name">
                        Name
                      </label>
                      <div class="controls">
                        <input value="<?php echo $cust['acc_fname'].' '.$cust['acc_lname'] ?>" disabled  type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="p_company">
                        Company
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="p_address">
                        Address
                      </label>
                      <div class="controls">
                        <input id="prod_name" value="<?php echo $cust['acc_add'] ?>" disabled name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="p_contact">
                        Tel. No. / Mobile No.
                      </label>
                      <div class="controls">
                        <input id="acc_contact" name="acc_contact" value="<?php echo $cust['acc_contact']?>" type="text" class="form-control" required="" disabled>               
                      </div>
                  </div>
                  <div class="column">
                    <label class="control-label" for="p_state">
                        City/State
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="p_zip">
                        Zip/Postal Code
                      </label>
                      <div class="controls">
                        <input id="prod_name" name="prod_name" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="p_country">Country</label>
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
                      <label class="control-label" for="p_addinfo">
                        Additional Information
                      </label>
                      <div class="controls">
                        <textarea id="prod_name" name="prod_name" type="text" class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="column">
                    <br><br><br><br><br><br>
                    <center>
                    <button type="submit" class="w3-button center" onclick="plusDivs(1)" style=" font-family: verdana; background-color: #8de78b; color: white; font-weight: bold;"> Update Details</button>
                    </center>
                  </div>
                 <!-- <div class="column" style="background-color: #ebebc6; width: 3.8in; margin-top: 0.30in; height: 3.68in" >
                    <input class="pull-right " title="Update Address" type="image" src="img/products/edit.png" alt="Submit" width="48" height="48">
                    <br>
                    <br>
                    <span>
                      <?php
                      echo $cust['acc_fname'].' '.$cust['acc_lname'];
                      echo "<br>";
                      echo $cust['acc_add'];
                      echo "<br>";
                      echo $cust['acc_contact'];
                      ?>
                    </span>
                  </div> -->
                </div>
            
          </div>
        </div>
        <br>
        <br>
         <button type="submit" class="w3-button pull-right" onclick="plusDivs(1)" style=" font-family: verdana; background-color: #8de78b; color: white; font-weight: bold;"> Payment&nbsp;&nbsp;&#10095;</button>
         <a href="productsummary.php" class="w3-button pull-right" style="margin-right: 0.78in; font-family: verdana; background-color: #8de78b; color: white; font-weight: bold; width: 1.2in; text-decoration: none" title="Product Summary">  &#10094; &nbsp; Back </a>
         </form>
      </div>
    </div>

    <br>
    <br>
          
<?php include('footer.php'); ?>
</body>
</html>
