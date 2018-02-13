<style type="text/css">
  nav.side-navbar.shrink{
    width: 100px;
    text-align: center;
  }
</style>
<?php 
  $user_name = $_SESSION['login_username'];
  $pdo = Database::connect();
  $name = $pdo->prepare("SELECT * FROM account WHERE acc_email like '$user_name'");
  $name->execute();
  $name = $name->fetch(PDO::FETCH_ASSOC); 
?>
<?php if($name['']) ?>
<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <div class="sidenav-header-inner text-center"><img src="<?php echo "img/" . $name['acc_fname'] . ".jpg" ?>"" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5 text-uppercase">
          <?php
            echo $name['acc_fname']." ".$name['acc_lname'];
          ?>  
        </h2><span class="text-uppercase">
        </span>
      </div>
      <div class="sidenav-header-logo"><a href="../index.php" class="brand-small text-center"><strong class="text-primary">TCI</strong></a></div>
    </div>
    <div class="main-menu">
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li><a href="index.php"> <i class="icon-home"></i><span>Home</span></a></li> 
      </ul>
    </div>
    <div class="admin-menu">
      <ul id="side-admin-menu" class="side-menu list-unstyled"> 
         <li><a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-padnote"></i><span>Profiles</span>
          <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
          <ul id="pages-nav-list" class="collapse list-unstyled">
            <li><a href="#product-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-form"></i><span>Product</span>
              <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
              <ul id="product-nav-list" class="collapse list-unstyled">
                <li> <a href="productlist.php"><span>Product List</span></a></li>i>
              </ul>
            </li> 
          </ul>
        </li>
      <li><a href="#transact-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Transaction</span>
        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
        <ul id="transact-nav-list" class="collapse list-unstyled">
          <li><a href="#inventory-nav-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-cube"></i><span>Inventory</span><div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
            <ul id="inventory-nav-list" class="collapse list-unstyled">
              <li><a href="inventorylist.php"><span>Inventory List</span></a></li>
              <li><a href="addinventory.php"><span>Add New Inventory</span></a></li>
              <li><a href="pulloutinventory.php"><span>Pull Out Inventory</span></a></li>  
              <li><a href="pulloutlist.php"><span>Pull Out List</span></a></li>    
            </ul>
          </li>
        </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>