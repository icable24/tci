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
.img-responsive{
  width: 500px
  height: 300px;
}
</style>

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
<!--content-->
      
  
  <h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Compare Products</h3>
  <div class="container">
    <div class="col-10">
        <?php
          $pdo = Database::connect();

          for($i = 0; $i < 3; $i++){
            $pp = $pdo->prepare("SELECT * FROM product WHERE prod_code = ?");
            $pp->execute(array($_SESSION['compare'][$i]));
            $pp = $pp->fetch();

            echo '<div class="column simpleCart_shelfItem">';
              echo '<div class="row">'; 
                echo '<div class="product-at ">';
                  echo '<img src="prod_img/'. $pp['prod_image'] .'" class="img-responsive" alt=""/>';
                echo '</div>';
              echo '</div>';
              echo '<div class="row">';
                echo '<div class="product-at ">';
                  echo '<img src="prod_img/'. $pp['prod_image'] .'" class="img-responsive" alt=""/>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          }
        ?>
        <div class="table-responsive">
          <table class="table table-hover table-striped" id="myTable">
            <thead class="success-info">
            
          </thead>
            <?php 
              $pdo = Database::connect();

              for($i = 0; $i < 3; $i++){
                $pp = $pdo->prepare("SELECT * FROM product WHERE prod_code = ?");
                $pp->execute(array($_SESSION['compare'][$i]));
                $pp = $pp->fetch();

                echo '';
              }
            ?>
        </table>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>
</body>
</html>
