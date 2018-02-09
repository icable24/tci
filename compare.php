<?php 
  session_start();
  include("database.php");
  if(isset($_SESSION['login_username'])){
  $pdo = Database::connect();
  $account = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
  $account->execute(array($_SESSION['login_username']));
  $account = $account->fetch();
  $compare = $pdo->prepare("SELECT * FROM compare WHERE acc_id = ?");
  $compare->execute(array($account['acc_id']));
  $compare = $compare->fetchAll();
  }
?>

<!DOCTYPE html>
<html>
<?php 
  include("head.php");
?>
<body>
<?php include("header.php"); ?>
  <div class="alert alert-success">
    <div class="container">
      <h3 style="font-family: verdana;">Compare Products <span class="pull-right"><?php if(isset($_SESSION['login_username'])){ ?><a href="productcategory.php" class="btn btn-success">Add Product</a></span><?php } ?></h3>
    </div>
  </div>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row text-center">
          <div class='col-md-3' style=" text-align: left;">
            <div class='row' style="height: 138px;">
              <br><br>
              <h3>&nbsp;&nbsp;&nbsp;&nbsp;Product Image:</h3>
            </div>
            <div class="clearfix"></div>
            <div class='row'>
              <h3>&nbsp;&nbsp;&nbsp;&nbsp;Product Name:</h3>
            </div>
            <div class="clearfix"></div><br><br>
            <div class='row'>
              <h3>&nbsp;&nbsp;&nbsp;&nbsp;Product Code:</h3>
            </div>
            <div class="clearfix"></div><br><br>
            <div class='row'>
              <h3>&nbsp;&nbsp;&nbsp;&nbsp;Category:</h3>
            </div>
            <div class="clearfix"></div><br><br>
            <div class='row'>
              <h3>&nbsp;&nbsp;&nbsp;&nbsp;Product Finish:</h3>
            </div>
            <div class="clearfix"></div><br><br>
            <div class='row'>
              <h3>&nbsp;&nbsp;&nbsp;&nbsp;Dimension:</h3>
            </div>
            <div class="clearfix"></div><br><br>
            <div class='row'>
              <h3>&nbsp;&nbsp;&nbsp;&nbsp;Product Price:</h3>
            </div>
            <div class="clearfix"></div><br><br>
          </div>
        <?php 
        if(isset($_SESSION['login_username'])){
          foreach($compare as $row){
            $product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
            $product->execute(array($row['prod_id']));
            $product = $product->fetch();
            $pf = $pdo->prepare("SELECT * FROM productfinish WHERE pf_id = ?");
            $pf->execute(array($product['pf_name']));
            $pf = $pf->fetch();
            $pc = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = ?");
            $pc->execute(array($product['pc_name']));
            $pc = $pc->fetch();
            $image = "prod_img/" . $product['prod_image'];
            $prod_name = $product['prod_name'];
            $prod_code = $product['prod_code'];
            $prod_cat = $pc['pc_name'];
            $prod_fin = $pf['pf_name'];
            $prod_id = $product['prod_id'];
            if($product['prod_length']!='0' && $product['prod_width'] != '0' && $product['prod_height'] != '0'){
              $dimension = $product['prod_length'].' x '. $product['prod_width'] . ' x ' . $product['prod_height'];
            }else{
              $dimension = $product['prod_diameter']. ' Dia. x '. $product['prod_height2'] . ' Ht.';
            }
            $prod_price = "Php " . number_format($product['prod_price'], 2);
            echo "
              <div class='col-md-3'>
                <div class='row'>
                  <img src='$image' style='height:100px; width=100px;'>
                </div>
                <div class='clearfix'></div><br><br>
                <div class='row'>
                  <h3>$prod_name</h3>
                </div>
                <div class='clearfix'></div><br><br>
                <div class='row'>
                  <h3>$prod_code</h3>
                </div>
                <div class='clearfix'></div><br><br>
                <div class='row'>
                  <h3>$prod_cat</h3>
                </div>
                <div class='clearfix'></div><br><br>
                <div class='row'>
                  <h3>$prod_fin</h3>
                </div>
                <div class='clearfix'></div><br><br>
                <div class='row'>
                  <h3>$dimension</h3>
                </div>
                <div class='clearfix'></div><br><br>
                <div class='row'>
                  <h3>$prod_price</h3>
                </div>
                <div class='clearfix'></div><br><br>
                <div class='row'>
                  <a class='btn btn-danger' href='php/removecompare.php?id=$prod_id'>Remove</a>
                  <a class='btn btn-success' style='width:1in' href='php/addToCart.php?id=$prod_code'>Add</a>

                </div>
              </div>
            ";
          }
        }
        ?> 
        </div>
      </div>  
    </div>
  </div>
<?php include("footer.php"); ?>
</body>
</html>