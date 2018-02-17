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
    </style>
    <!-- Side Navbar -->
    <?php include('sidenavbar.php'); ?>
    <div class="page home-page">
      <!-- navbar-->
      <?php include('header.php'); ?>
      <br>
      <div class="container">
        <div>
          
          <div> <input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder="Search..">                 
              <select id="filters" name="filters" onChange="myFilter()" placeholder="filter" class="pull-right">
              <option disabled selected style="color: gray">Filter</option>
              <option></option>
              <option>Company</option>
              <option>Single Buyer</option>
            </select>
            </div>
                 <br><br>
          <div><h1>Products</h1></div>
          <br>
         </div>
         <table class="table" id="myTable">
            <thead>
              <tr class="alert-success">
                <th>Customer Type</th>
                <th>Customer Name</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>

                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php       
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //sql statement to get products and sort by product code
                $sql = 'SELECT * FROM account WHERE user_type != "admin" and user_type != "inventory" ORDER BY user_type ASC';

                //display all products in the database
                foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
                echo '<td>'.  $row["user_type"]. ' </td>' ;
                echo '<td>'. $row['acc_fname'] ." ". $row['acc_lname'] . '</td>';
                echo '<td>'.$row['acc_company'].'</td>';
                echo '<td>'.$row['acc_email'].'</td>';
                echo '<td>'.$row['acc_contact'].'</td>';
                echo '<td>'.$row['acc_add'].'</td>';
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

    <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
    td = tr[i].getElementsByTagName("td")[0];
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