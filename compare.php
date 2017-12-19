<?php 
  include('database.php');

  $pdo = Database::connect();
  if(!empty($_GET['id'])){
    $prod_code = $_REQUEST['id'];

    $prod = $pdo->prepare("SELECT * FROM product WHERE prod_code = ?");
    $prod->execute(array($prod_code));
    $prod = $prod->fetch(PDO::FETCH_ASSOC);

  }else{
    header('location:index.php');
  }
?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<style type="text/css">
  .img-responsive{
  height: 500px;
  width: 500px;
  }
</style>
<html>
<<<<<<< HEAD
<?php include('head.php'); ?>
=======
<?php include('head.php'); 
      include('Database.php');
?>
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
>>>>>>> b7654f6b294f40f41beec43493b5106c8c430673
<body>
<?php include('header.php'); ?>
  <!-- grow -->
  <div class="alert alert-success">
    <div class="container">
      <h2 style="font-family: verdana;"><?php echo $prod['prod_name'] ?></h2>
    </div>
  </div>
  <!-- grow -->
<<<<<<< HEAD
    <div class="product">
      <div class="container">
        <div class="product-price1">
        <div class="top-sing">
        <div class="col-md-7 single-top"> 
            <div class="flexslider">
              <div> <img <?php echo "src=prod_img/" . $prod['prod_image'] ?> data-imagezoom="true" class="img-responsive"> </div>
=======
<!--content-->
      
  
  <h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Compare Products</h3>
  <div class="container-fluid" style="width: 12.5in;">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span></span>
              <br>
            </div>
            <div class="panel-body">
              <form action="setaddress.php" enctype="multipart/form-data" method="post">
                <div class="row">
                  <!-- <div class="column simpleCart_shelfItem">
                    <div class="product-at ">
                      <a href="single.php"><img class="img-responsive" src="images/pi3.jpg" alt="">
                      <div class="pro-grid">
                        <span class="buy-in">Buy Now</span>
                      </div>
                      </a>  
                    </div>
                    <p class="tun">CLARISSA</p>
                    <div class="ca-rt">
                      <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>           
                    </div>
                  </div> -->
                </div>
            </div>
          </div>
        </div>
        <br>
        <br>
         <button type="submit" class="w3-button pull-right" onclick="plusDivs(1)" style=" font-family: verdana; background-color: #8de78b; color: white; font-weight: bold;"> Address &#10095;</button>
         </form>
      </div>
>>>>>>> b7654f6b294f40f41beec43493b5106c8c430673
    </div>

  </div>
</div>
</div>
</div>
</div>
</body>
</html>