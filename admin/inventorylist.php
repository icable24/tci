<?php 
  include('../login_success.php');
  include('../database.php');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
  $pdo = Database::connect();
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
      <div class="container">
        <div><h1>Inventory</h1></div>
        <br>
        <table class="table">
          <thead>
            <tr class="alert-success">
              <th>Product ID</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Store Location</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php  
              $inventory = $pdo->prepare("SELECT * FROM inventory");
              $inventory->execute();
              $inventory = $inventory->fetchAll();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
              foreach($inventory as $row){
                $prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
                $prod->execute(array($row['prod_id']));
                $prod = $prod->fetch();
<<<<<<< HEAD
                $store = $pdo->prepare("SELECT * FROM store WHERE storeid = ?");
                $store->execute(array($row['storeid']));
                $store = $store->fetch();
=======
<<<<<<< HEAD
                $store = $pdo->prepare("SELECT * FROM store WHERE storeid = ?");
                $store->execute(array($row['storeid']));
                $store = $store->fetch();
=======

                $store = $pdo->prepare("SELECT * FROM store WHERE storeid = ?");
                $store->execute(array($row['storeid']));
                $store = $store->fetch();

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
                $prod_id = $prod['prod_code'];
                $prod_image = "../prod_img/" . $prod['prod_image'];
                $prod_name = $prod['prod_name'];
                $quantity = $row['quantity'];
                $store = $store['storename'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
                echo "
                  <tr>
                    <td>$prod_id</td>
                    <td><img src='$prod_image' alt='Product Image' style='width:50px; height: 50px;'/></td>
                    <td>$prod_name</td>
                    <td>$store</td>
                    <td>$quantity</td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
      </div>
      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>