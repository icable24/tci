<?php 
 $pdo = Database::connect();

 $NPO = $pdo->prepare("SELECT count(*) FROM orders WHERE order_finish = 'Pending'");
 $NPO->execute();
 $NPO = $NPO->fetch();

 $PO = $pdo->prepare("SELECT * FROM orders WHERE order_finish = 'Pending'");
 $PO->execute();
 $PO = $PO->fetchAll();
?>
<header class="header">
         <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.php" class="navbar-brand">
                  <div class="brand-text hidden-sm-down"><span>Tumandok Craft and Industries Management Information System</span></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning"><?php echo $NPO['count(*)']; ?></span></a>
                 <!--  <?php 
                    if($notif > 0){
                      foreach($PO as $row){
                        $order_id = $row['order_id'];

                        $user = $pdo->prepare("SELECT * FROM account WHERE acc_id = ?");
                        $user->execute(array($row['acc_id']));
                        $user = $user->fetch();

                        $name = $user['acc_fname'] . ' ' . $user['acc_lname'];
                        $amount = $row['order_amount'];
                        echo "
                          <ul aria-labelledby='notifications' class='dropdown-menu'>
                            <li><a rel='nofollow' href='purchaseorder.php?id=php' class='dropdown-item'> 
                            <div class='notification d-flex justify-content-between'>
                              <div class='notification-content'><i class='fa fa-envelope'></i></div>
                              <div class='notification-time'><small>$amount</small></div>
                            </div></a></li>
                          </ul>
                        ";
                      }
                    } 
                  ?> -->
                </li>
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><!-- <span class="badge badge-info">10</span> --></a>
                    <!-- <ul aria-labelledby="notifications" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                    </ul> -->
                </li>
                <li class="nav-item"><a href="../index.php" class="nav-link logout">View Shop</a></li>
                <li class="nav-item"><a href="../php/logout.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>