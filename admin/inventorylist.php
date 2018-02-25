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
        <div>            
              <select id="filters" name="filters" onChange="myFilter()" placeholder="filter" class="pull-right" style="width: 4.5in">
              <option disabled selected style="color: gray">Filter</option>
              <option></option>
              <option>G/F Cybergate Center Robinsons, Singcang</option>
              <option>ANP, City Walk Robinsons Mall, Mandalagan</option>
            </select>
            </div>
          <br><br>
        <div><h1>Inventory</h1></div>
        <br>
        <table class="table" id="myTable">
          <thead>
            <tr class="alert-success">
              <th>Product ID</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Store Location</th>
              <th>Quantity</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php  
              $inventory = $pdo->prepare("SELECT * FROM inventory WHERE NOT storeid = 3 LIMIT {$start},{$perPage}");
              $inventory->execute();
              $inventory = $inventory->fetchAll();
              foreach($inventory as $row){
                $prod = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
                $prod->execute(array($row['prod_id']));
                $prod = $prod->fetch();
                $store = $pdo->prepare("SELECT * FROM store WHERE storeid = ?");
                $store->execute(array($row['storeid']));
                $store = $store->fetch();
                $prod_id = $prod['prod_code'];
                $prod_image = "../prod_img/" . $prod['prod_image'];
                $prod_name = $prod['prod_name'];
                $quantity = $row['quantity'];
                $store = $store['storename'];
                $inventory_id = $row['inventory_id'];
                echo "
                  <tr>
                    <td>$prod_id</td>
                    <td><img src='$prod_image' alt='Product Image' style='width:50px; height: 50px;'/></td>
                    <td>$prod_name</td>
                    <td>$store</td>
                    <td>$quantity</td>
                    <td><a href='inventoryhistory.php?id=$inventory_id' class='btn btn-success'>View</a>
                    <a href='pulloutinventory.php?id=$inventory_id' class='btn btn-success'>Pullout Stock</a></td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
        <div class="offset-5 col">
          <div class="row">
       <nav class="text-center">
          <ul class="pagination">
          <?php if($page > 1){?>
            <li class="pager">
              <a href="?page=<?php echo $page-1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          <?php }?>
          
          <?php for($x = 1; $x <= $pages; $x++) : ?>
            <li class="pager"><a href="?page=<?php echo $x; ?>"  <?php if($x === $page){echo 'class=active disabled';} ?>><?php echo $x; ?></a></li>
          <?php endfor; ?>
          
          <?php if($page < $pages){?>
            <li class="pager">
              <a href="?page=<?php echo $page+1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          <?php }?>
          
          </ul>
      </nav>
      </div>
        </div>
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