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
<?php include('head.php'); ?>
<body>
<?php include('header.php'); ?>
  <!-- grow -->
  <div class="alert alert-success">
    <div class="container">
      <h2 style="font-family: verdana;"><?php echo $prod['prod_name'] ?></h2>
    </div>
  </div>
  <!-- grow -->
    <div class="product">
      <div class="container">
        <div class="product-price1">
        <div class="top-sing">
        <div class="col-md-7 single-top"> 
            <div class="flexslider">
              <div> <img <?php echo "src=prod_img/" . $prod['prod_image'] ?> data-imagezoom="true" class="img-responsive"> </div>
    </div>

  </div>
</div>
</div>
</div>
</div>
</body>
</html>