<?php 
       
    include('database.php');

    $pdo = Database::connect();

    $cartPrice = 0;
    $num = 0;
?>
<header>
<!--header-->
<div class="header" style="background-color: #999999">
           <p style="margin-right: 0.70in">
                <?php session_start(); 
                if(!isset($_SESSION['login_username'])){ ?>
                    <a style="text-decoration: none; color: white" class="pull-right" href="signup.php">Signup</a> 
                    &nbsp;&nbsp; 
                    <a style="text-decoration: none;" class="pull-right">|</a> 
                    &nbsp;&nbsp;
                    <a style="text-decoration: none; color: white" class="pull-right" href="login.php">Login</a>
                <?php }else{ ?>
                    <a style="text-decoration: none; color: white" class="pull-right" href="php/logout.php">Logout</a> 
                    &nbsp;&nbsp;
                <?php } ?>
                   <!-- &nbsp;&nbsp; <a class="pull-right">|</a> &nbsp;&nbsp;
                    <a href="#"><i class="facebok pull-right" style="align-items: center;"> </i></a>
                    &nbsp;&nbsp; <a class="pull-right">|</a> &nbsp;&nbsp;
                    <a href="#"><i class="twiter pull-right"> </i></a>
                    &nbsp;&nbsp; <a class="pull-right">|</a> &nbsp;&nbsp;
                    <a href="#"><i class="inst pull-right"> </i></a>
                    &nbsp;&nbsp; <a class="pull-right">|</a> &nbsp;&nbsp;
                    <a href="#"><i class="goog pull-right"> </i></a>-->        
            </p>
        </div>
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="social">
                <ul>
                    <li><a href="#"><i class="facebok"> </i></a></li>
                    <li><a href="#"><i class="twiter"> </i></a></li>
                    <li><a href="#"><i class="inst"> </i></a></li>
                    <li><a href="#"><i class="goog"> </i></a></li>
                        <div class="clearfix"></div>    
                </ul>
            </div>
            <div class="header-left">
            
                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form action="#" method="post">
                            <input class="sb-search-input" placeholder="Enter your search term..." type="search"  id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                </div>
                <!-- search-scripts -->
                    <script src="js/classie.js"></script>
                    <script src="js/uisearch.js"></script>
                        <script>
                            new UISearch( document.getElementById( 'sb-search' ) );
                        </script>
                    <!-- //search-scripts -->
                <div class="ca-r"   >
                    <div class="cart box_1">
                        <?php if(isset($_SESSION['login_username'])){
                                echo '<a href="checkout.php">';
                            }
                            else{
                                echo '<a href="#" data-toggle="modal" data-target="#myModal">';
                            }
                         ?>
                        <h3> <div class="total">

                            <span><?php

                            if(!empty($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $pprice){
                                    $tprice = $pdo->prepare("SELECT * FROM product WHERE prod_code = ?");
                                    $tprice->execute(array($pprice));
                                    $tprice = $tprice->fetch();

                                    $cartPrice += $tprice['prod_price'];
                                }
                            } 
                            echo "Php " . number_format($cartPrice, 2); ?>
                                
                            </span> </div>
                            <img src="images/cart.png" alt=""/></h3>
                        </a>
                        </div>
                </div>
            </div>
                
        </div>
        </div>
        <div class="container">
            <div class="head-top">
                <div class="logo">
                    <h1><a href="index.php"><img src="img/tci-logo.png"></a></h1>
                </div>
                <br>
          <div class=" h_menu4">
                <ul class="memenu skyblue" style="font-family: verdana; font-weight: regular">
                    <li><a class="color1" href="index.php">Home</a>
                    <li><a class="color1" href="#">Products</a>
                    <div class="mepanel">
                        <div class="row">
                            <div class="*">
                                <div class="h_nav">
                                    <ul>
                                    <li><a href="productcatalog.php?id=1">Light Furnitures</a></li>
                                    <li><a href="productcatalog.php?id=2">Accessories</a></li>
                                    <li><a href="productcatalog.php?id=3">Wall Decor</a></li>
                                    <li><a href="productcatalog.php?id=4">Luminaries</a></li>
                                    <li><a href="productcatalog.php?id=5">Home Furnitures</a></li>
                                    </ul>   
                                </div>                          
                            </div>
                        </div>
                    </div>
                    <li><a class="color6" href="contact.php">Contact Us</a></li>
                    <li><a href="compare.php">Compare Product</a></li>
              </ul> 
            </div>
                
                <div class="clearfix"> </div>
        </div>
        </div>

        </header>
        <script type="text/javascript">
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').focus()
            })
        </script>
        