<?php 
  include('../login_success.php');
  include('../database.php');
  $pdo = Database::connect();
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 9;

// Positioning
    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

    $p = $pdo->prepare("SELECT count(*) FROM inventory WHERE NOT storeid = 3");
  $p->execute();
  $p = $p->fetch(PDO::FETCH_ASSOC);

  $total = $p['count(*)'];
    $pages = ceil($total / $perPage);
?>
<!DOCTYPE html>
<html>
  <?php include('head.php'); ?>
  <body>
    <style>
    select, input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]{
   background-image: url('../img/searchicon.png');
}
select{
   width: 20%;
    background-image: url('../img/filter-icon.png');
}
input[type=text]:focus {
    width: 50%;
}
    .pager{
  margin-right: 5px;
  margin-left: 5px;
}
.active{
  color: #666666;
  text-decoration: underline;
}
    </style>
    <!-- Side Navbar -->
    <?php include('sidenavbar.php'); ?>
    <div class="page home-page">
      <!-- navbar-->
      <?php include('header.php'); ?>
      <!-- Body Section -->
      <br>
      <div class="container">
          <br>
        <div><h1>Inventory</h1></div>
        <br>
        <table class="table" id="myTable">
          <thead>
            <tr class="alert-success">
              <th>Product ID</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php  
              $inventory = $pdo->prepare("SELECT inventory_id, prod_id, SUM(quantity), storeid FROM inventory WHERE NOT storeid = 3 GROUP BY prod_id");
              $inventory->execute();
              $inventory = $inventory->fetchAll();
              foreach($inventory as $row){
                $prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
                $prod->execute(array($row['prod_id']));
                $prod = $prod->fetch();
                $prod_id = $prod['prod_code'];
                $prod_image = "../prod_img/" . $prod['prod_image'];
                $prod_name = $prod['prod_name'];
                $quantity = $row['SUM(quantity)'];
                $inventory_id = $row['inventory_id'];
                $prod_code = $prod['prod_id'];
                echo "
                  <tr>
                    <td>$prod_id</td>
                    <td><img src='$prod_image' alt='Product Image' style='width:50px; height: 50px;'/></td>
                    <td>$prod_name</td>
                    <td>$quantity</td>
                    <td class='text-right'>
                    <a href='inventorydetails.php?id=$prod_code' class='btn btn-success'>Details</a>
                    <a href='inventoryhistory.php?id=$inventory_id' class='btn btn-success'>History</a>
                    <a href='pulloutinventory.php?id=$prod_code' class='btn btn-success'>Pullout</a></td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
      </div>

       <script>
function myFilter() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("filters");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>