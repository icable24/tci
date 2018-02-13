<?php 
 $pdo = Database::connect();

 $NPO = $pdo->prepare("SELECT count(*) FROM orders WHERE isViewed = 0 AND order_finish = 'Pending'");
 $NPO->execute();
 $NPO = $NPO->fetch();

 $PO = $pdo->prepare("SELECT * FROM orders WHERE isViewed = 0 AND order_finish = 'Pending'");
 $PO->execute();
 $PO = $PO->fetchAll();

 $inq = $pdo->prepare("SELECT count(*) FROM inquiry WHERE statusView = 0 AND status = 'Unread'");
 $inq->execute();
 $inq = $inq->fetch();

 $inquire = $pdo->prepare("SELECT * FROM inquiry WHERE statusView = 0 AND status = 'Unread'");
 $inquire->execute();
 $inquire = $inquire->fetchAll();  

   $user1 = $_SESSION['login_username'];
  $pdo = Database::connect();
  $abc = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
  $abc->execute(array($user1));
  $abc = $abc->fetch(PDO::FETCH_ASSOC); 
?>
<header class="header">
         <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.php" class="navbar-brand">
                  <div class="brand-text hidden-sm-down"><span>Tumandok Craft and Industries Management Information System</span></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning"><?php if($NPO['count(*)'] > 0){echo $NPO['count(*)'];} ?></span></a>
                 <?php 
                    if($NPO['count(*)'] > 0){
                      echo "<ul aria-labelledby='notifications' class='dropdown-menu'>";
                      foreach($PO as $row){
                        $order_id = $row['order_id'];

                        $user = $pdo->prepare("SELECT * FROM account WHERE acc_id = ?");
                        $user->execute(array($row['acc_id']));
                        $user = $user->fetch();

                        $name = $user['acc_fname'] . ' ' . $user['acc_lname'];
                        echo "
                            <li><a rel='nofollow' href='vieworder.php?id=$order_id' class='dropdown-item'> 
                            <div class='notification d-flex justify-content-between'>
                              <div class='notification-content'><i class='fa fa-user'></i>$name</div>
                              <div class='notification-time'><small>Order Number: $order_id</small></div>
                            </div></a></li>
                        ";
                      }
                      echo "</ul>";
                    }
                  ?>
                  
                </li>
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i> <span class="badge badge-info"><?php if($inq['count(*)'] > 0){echo $inq['count(*)'];} ?></span></a>
                 <?php 
                    if($inq['count(*)'] > 0){
                      echo "<ul aria-labelledby='notifications' class='dropdown-menu'>";
                      foreach($inquire as $row){
                        $inquiryID = $row['inquiryID'];
                        $acc_name = $row['acc_name'];
                        echo "
                            <li><a rel='nofollow' href='viewinquiry.php?id=$inquiryID' class='dropdown-item'> 
                            <div class='notification d-flex justify-content-between'>
                              <div class='notification-content'><i class='fa fa-user'></i>$acc_name</div>
                              <div class='notification-time'><small>Inquiry Number: $inquiryID</small></div>
                            </div></a></li>
                        ";
                      }
                      echo "</ul>";
                    }
                  ?>                    
                </li>
                 <?php if($abc['user_type'] != 'inventory'){ ?>
                <li class="nav-item"><a href="../index.php" class="nav-link logout">View Shop</a></li>
                <?php } ?>
                <li class="nav-item"><a href="../php/logout.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>