
<?php
  require 'database.php';
  $tprice = 0;
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

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<body>
<!--header-->
<?php include('header.php'); ?>
  <?php 
    $acc_email = $_SESSION['login_username'];
  $pdo = Database:: connect();
  $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $user_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
        $user_id->execute(array($acc_email));
        $user_id = $user_id->fetch(PDO:: FETCH_ASSOC);
  ?>
  <!-- grow -->
  <div class="grow" style="background-color: #dff0d8; border-color: #d6e9c6">
    <div class="container">
      <h2 style="color: #3c763d; font-weight: regular;">Place Order</h2>
    </div>
  </div>
  <!-- grow -->
<!--content-->
      <div>
  	<h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Address</h3>
  <div class="container-fluid" style="width: 12.5in;">
        <div class="col-lg-12">
          <div class="panel panel-default" >
            <div class="panel-heading">
              <span>Please fill out your you delivery address:</span>
              <br>
            </div>
            <div class="panel-body">
              <form action="./php/check.php" enctype="multipart/form-data" method="post">
                <div class="row">
                  <div class="column">
                   <label class="control-label" for="name">
                        Name
                      </label>
                      <div class="controls">
                        <input id="name" name="name" value="<?php echo $user_id['acc_fname'].' '.$user_id['acc_lname'] ?>" type="text" class="form-control" required="" disabled>               
                      </div>
                      <br><br>
                      <label class="control-label" for="acc_company">
                        Company
                      </label>
                      <div class="controls">
                        <input id="acc_company" name="acc_company" value="<?php echo $user_id['acc_company'] ?>" type="text" class="form-control" disabled="">               
                      </div>
                      <br>
                      <label class="control-label" for="shippingaddress">
                        Complete Delivery Address *
                      </label>
                      <div class="controls">
                        <textarea id="shippingaddress" value="<?php echo $user_id['acc_add'] ?>" name="shippingaddress" type="text" class="form-control" required=""></textarea>            
                      </div>
                     
                  </div>
                  <div class="column">
                     <label class="control-label" for="country">Country *</label>
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
                      <br><br>
                      <label class="control-label" for="state">
                        State/Province *
                      </label>
                      <div class="controls">
                        <input id="state" name="state" type="text" class="form-control" required="">               
                      </div>
                       <br>
                    <label class="control-label" for="city">
                        City *
                      </label>
                      <div class="controls">
                        <input id="city" name="city" type="text" class="form-control" required="">               
                      </div>
                      
                  </div>
                  <div class="column">
                    <label class="control-label" for="acc_email">
                        Email
                      </label>
                      <div class="controls">
                        <input id="acc_email" name="acc_email" value="<?php echo $user_id['acc_email']?>" type="text" class="form-control" required="" disabled>               
                      </div>
                       <br>
                      <label class="control-label" for="acc_contact">
                        Tel. No. / Mobile No. * <br><small>(Format: xxx-xxxx / +63xxxxxxxxxx)</small>
                      </label>
                      <div class="controls">
                        <input id="acc_contact" name="acc_contact" value="<?php echo $user_id['acc_contact']?>" type="text" class="form-control" required="">               
                      </div>
                      <br>
                      <label class="control-label" for="zip_code">
                        Zip/Postal Code *
                      </label>
                      <div class="controls">
                        <input id="zip_code" name="zip_code" type="Number" class="form-control" required="">
                      </div>
                     
                  </div>
                 
                </div>
            
          </div>
        </div>
      
      </div>
    </div>

     <h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Payment</h3>
  <div class="container-fluid" style="width: 12.5in;">
   <table>
              <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
               
                <?php 
                $acc_email =  $_SESSION['login_username'];
                $user_id = $pdo->prepare("SELECT acc_id FROM account WHERE acc_email = '$acc_email'");
                $user_id->execute();
                $user_id = $user_id->fetch(PDO::FETCH_ASSOC);

                $cartProd = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND cart_finish = 'No'");
                $cartProd->execute(array($user_id['acc_id']));
                $cartProd = $cartProd->fetchAll();

                foreach($cartProd as $row){
                    $product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
                    $product->execute(array($row['prod_id']));
                    $product = $product->fetch();

                    $prodImage = "prod_img/". $product['prod_image'];
                    $productName = $product['prod_name'];
                    $productCode = $product['prod_code'];
                    $productPrice = "Php " . number_format($product['prod_price'], 2);
                    $prodTPrice =  "Php " . number_format($product['prod_price'] * $row['quantity'], 2);
                    $quantity = $row['quantity'];

                    $itemPrice = $product['prod_price'] * $row['quantity'];
                    $tprice += $itemPrice;


              
              echo '<tr>';
              echo '<th>';
              echo '<span>' . $product['prod_code'] . '</span>';
              echo '</th>';
              echo '<th>';
              echo '<span>' . $product['prod_name'] . '</span>';
              echo '</th>';
              echo '<th>';
              echo '<span>' . $product['prod_price'] . '</span>';
              echo '</th>';
              echo '<th>';
              echo '<span>' . $quantity . '</span>';
              echo '</th>';
              echo '<th>';
              echo '<span>'. $prodTPrice .'</span>';
              echo '</th>';
              echo '</tr>';
              
            }
          
              ?>
            </table>

            <?php
            echo '<table>';
             echo '<tr>';
              echo '<th>';
              echo '<span class="pull-right" style="margin-right:0.99in">' . 'Php '. number_format($tprice,2) . '</span>';
              echo '</th>';
              echo '</tr>';
              echo '</table>';
            ?>
              </div>
        </div>
        <br>
        <br>
        <br>
        <br>
         <button type="submit" class="w3-button pull-right" onclick="plusDivs(1)" style=" font-family: verdana; background-color: #8de78b; color: white; font-weight: bold;"> Payment&nbsp;&nbsp;&#10095;</button>
         <a href="checkout.php" class="w3-button pull-right" style="margin-right: 0.78in; font-family: verdana; background-color: #8de78b; color: white; font-weight: bold; width: 1.2in; text-decoration: none" title="Product Summary">  &#10094; &nbsp; Back </a>
         </form>
      </div>
    </div>
</div>
    <br>
    <br>
          
<?php include('footer.php'); ?>
</body>
</html>
