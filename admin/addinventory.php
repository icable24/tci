<?php 
  include('../login_success.php');
  include('../database.php');
  $pdo = Database::connect();
  if(isset($_GET['id'])){
    $id = $_REQUEST['id'];
  }
  $product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
  $product->execute(array($id));
  $product = $product->fetch();
  $prod_id = $product['prod_code'];
  $prod_name = $product['prod_name'];
  $inv = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ?");
  $inv->execute(array($id));
  $inv = $inv->fetch();

  $rob = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ? AND storeid = 1");
  $rob->execute(array($id));
  $rob = $rob->fetchAll();

  $anp = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ? AND storeid = ?");
  $anp->execute(array($id, 2));
  $anp = $anp->fetchAll();

  $bago = $pdo->prepare("SELECT * FROM inventory WHERE prod_id = ? AND storeid = ?");
  $bago->execute(array($id, 3));
  $bago = $bago->fetchAll();


  if($inv){
    $quantity = $inv['quantity'];
  }else{
    $quantity = 0;
  }
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
      <!-- Body Section -->
      <br>
      <div class="container-fluid">
        <div class="offset-3 col-6">
          <div class="alert alert-success">
            <div><h1>Add Inventory</h1></div>
            <div class="card-block">
                <div class="offset-9">
                  <a href="productlist.php" class="btn btn-primary">Add Product</a>
                </div>
                <form action=" <?php echo '../php/addinv.php?id='. $id?>" id="myform" name="myform" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="id" id="id" <?php if(isset($id)){echo $id;} ?>>
                  <div class="control-group">
                    <label class="control-label">Product ID</label>
                    <div class="controls">
                      <input class="form-control" type="text" name="prod_id" placeholder="Product ID" <?php if(isset($id)){echo "value='$prod_id'";} ?> disabled></input>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Product Name</label>
                    <div class="controls">
                      <input type="text" name="prod_name" placeholder="Product Name" class="form-control" disabled <?php if(isset($id)){echo "value='$prod_name'";} ?>>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Location</label>
                    <div class="controls">
                      <select class="form-control" name="store" id="store">
                        <option></option>
                        <option value="1">G/F Cybergate Center Robinsons, Singcang</option>
                        <option value="2">ANP, City Walk Robinsons Mall, Mandalagan</option>
                        <option value="3">Purok Ma. Morena, Calumangan Bago City</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">On Shelf</label>
                    <div class="controls">
                      <input type="number" name="quantity" class="form-control" id="quantity" disabled>
                      <?php var_dump($bago); ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Add Quantity</label>
                    <div class="controls">
                      <input type="Number" name="newquantity" class="form-control" placeholder="New Quantity" required>
                    </div>
                  </div>
                  <br>
                  <div class="footer">
                    <div class="form-actions text-center forms">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <a class="btn btn-secondary" href="inventorylist.php">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <script type="text/javascript">
      var select = document.getElementById("quantity");

      select.onchange = function checkStock(){
        var store = document.getElementById("store").value;

        if(store == '1'){
          document.getElementById("quantity").value = 1;
        }elseif(store == '2'){
          document.getElementById("quantity").value = 2;
        }else{
          document.getElementById("quantity").value = 3;
        }
      }
    </script>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>