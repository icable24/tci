<?php 
  include('../login_success.php');
  include('../database.php');
  $user_name = $_SESSION['login_username'];

  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $perPage = 20;

// Positioning
  $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

  $pdo = Database::connect();
  $name = $pdo->prepare("SELECT * FROM account WHERE user_name like '$user_name'");
  $name->execute();
  $name = $name->fetch(PDO::FETCH_ASSOC);

  $p = $pdo->prepare("SELECT count(*) FROM product");
  $p->execute();
  $p = $p->fetch(PDO::FETCH_ASSOC);

  $total = $p['count(*)'];
  $pages = ceil($total / $perPage);

  $prod = $pdo->prepare("SELECT * FROM product LIMIT {$start},{$perPage}");
  $prod->execute();
  $prod = $prod->fetchAll();
?>
<!DOCTYPE html>
<html>
  <?php include('head.php'); ?>
  <body>
<!-- Search -->
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
      <br>
      <div class="container">
        <div>
          <!--<a href="productcreate.php" class="btn btn-info btn-md">Add Product</a>-->
          <div> <input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder="Search..">                 
              <select id="filters" name="filters" onChange="myFilter()" placeholder="filter" class="pull-right">
              <option disabled selected style="color: gray">Filter</option>
              <option></option>
              <option>Light Furnitures</option>
              <option>Accessories</option>
              <option>Wall Decor</option>
              <option>Luminaries</option>
              <option>Home Furnishing</option>
            </select>
            </div>
          <br><br>
          <?php if($name['user_type'] != 'inventory'){ ?><div><h1>Products <span class="pull-right"><a href="productcreate.php" class="btn btn-success">Add Product</a></span></h1></div>
          <?php } ?>
          <br>
         </div>
         <table class="table" id="myTable">
            <thead>
              <tr class="alert-success">
                <th>Product ID</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Size/Dimensions</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php       

                //display all products in the database
                foreach ($prod as $row) {
                $query = $pdo->prepare("SELECT * FROM productcategory WHERE pc_id = ?");
                  $query->execute(array($row['pc_name']));
                  $pc = $query->fetch(PDO::FETCH_ASSOC);  
                  echo '<tr>';
                    echo '<td>'.$row['prod_code'] . '</td>';
                    echo '<td>'. '<img src="../prod_img/'. $row['prod_image'] . '" alt="Product Image" style="width:55px;height:55px;"/>' . '</td>';
                    echo '<td>'.$row['prod_name']. '</td>';
                    echo '<td>'.$pc['pc_name'].'</td>';
                    echo '<td>'.' Php '.$row['prod_price'].'</td>';
                    if($row['prod_length']!='0' && $row['prod_width'] != '0' && $row['prod_height'] != '0'){
                      echo '<td>'.$row['prod_length'].' x '. $row['prod_width'] . ' x ' . $row['prod_height'] .' cm</td>';
                    }else{
                      echo '<td>'.$row['prod_diameter']. ' Dia. x '. $row['prod_height2'] . ' Ht.'. ' cm</td>';
                    }
                    if($name['user_type'] != 'inventory'){
                        echo '<td>
                            <a class="btn btn-primary btn-md" href="productupdate.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="View"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-warning btn-md" href="../php/addfeature.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="Feature"><span class="fa fa-star"></span></a>
                            <a class="btn btn-info btn-md" href="addinventory.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="Add Inventory"><span class="fa fa-cube"></span></a>
                            </td>';  
                    }else{
                        echo '
                            <td>
                              <a class="btn btn-primary btn-md" href="productview.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="View"><span class="fa fa-eye"></span></a>
                            </td>';  
                          }               
                  echo '</tr>';
                }
                Database::disconnect();
              ?>
            </tbody>
         </table>
         <div class="row">
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
      </div>
      <!-- Footer Section -->
     <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
    <!-- for Search -->
    <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
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
  </body>
</html>