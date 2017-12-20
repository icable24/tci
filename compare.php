<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
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
.img-responsive{
  width: 500px
  height: 300px;
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
      
  
  <h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Compare Products</h3>
  <div class="container">
    <div class="col-10">
        <!-- <?php
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
        ?> -->
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
<!--footer-->
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>
</html>
      