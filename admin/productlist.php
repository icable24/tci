<?php 
  include('../login_success.php');
  include('../database.php');

  $user_name = $_SESSION['login_username'];
  $pdo = Database::connect();
  $name = $pdo->prepare("SELECT * FROM account WHERE user_name like '$user_name'");
  $name->execute();
  $name = $name->fetch(PDO::FETCH_ASSOC); 
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
      <br>
      <div class="container">
         <div>
          <a href="productcreate.php" class="btn btn-info btn-md">Add Product</a>
          <br><br>
         </div>
         <table class="table">
            <thead>
              <tr class="alert-success">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Size/Dimensions</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php       
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT * FROM product ORDER BY prod_id ASC';

                foreach ($pdo->query($sql) as $row) {

                $query = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = ?");
                  $query->execute(array($row['pc_id']));
                  $pc = $query->fetch(PDO::FETCH_ASSOC);  

                  echo '<tr>';
                    echo '<td>'.$row['prod_id'] . '</td>';
                    echo '<td>'.$row['prod_name']. '</td>';
                    echo '<td>'.$pc['pc_name'].'</td>';
                    echo '<td>'.' Php '.$row['prod_price'].'</td>';
                    echo '<td>'.$row['prod_length'].' x '. $row['prod_width'] . ' x ' . $row['prod_height'] .'</td>';
                    echo '<td class="text-center">
                          <a class="btn btn-primary btn-md" href="productupdate.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="View"><span class="glyphicon glyphicon-edit"></span></a>
                          </td>';                 
                  echo '</tr>';
                  
                }
                Database::disconnect();
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