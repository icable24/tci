<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 10px;
    height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>
<body>
<!--header-->
<?php include('header.php'); ?>
  <!-- grow -->
  <div class="grow">
    <div class="container">
      <h2 style="font-family: verdana">Furnitures and Home Accessories</h2>
    </div>
  </div>
  <!-- grow -->
<!--content-->
<br>
  <div class="container-fluid">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="column simpleCart_shelfItem">
                    <div class="product-at ">
                    <a href="single.php"><img class="img-responsive" src="images/pi3.jpg" alt="">
                    <div class="pro-grid">
                    <span class="buy-in">Buy Now</span>
                    </div>
                    </a>  
                    </div>
                    <p class="tun">CLARISSA</p>
                    <div class="ca-rt">
                    <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>           
                    </div>
                    </div>
                  
                    <div class="column simpleCart_shelfItem">
                    <div class="product-at ">
                    <a href="single.php"><img class="img-responsive" src="images/pi1.jpg" alt="">
                    <div class="pro-grid">
                    <span class="buy-in">Buy Now</span>
                    </div>
                    </a>  
                    </div>
                    <p class="tun">CLARISS</p>
                    <div class="ca-rt">
                    <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>           
                    </div>         
                    </div>

                    <div class="column simpleCart_shelfItem">
                    <div class="product-at ">
                    <a href="single.php"><img class="img-responsive" src="images/pi5.jpg" alt="">
                    <div class="pro-grid">
                    <span class="buy-in">Buy Now</span>
                    </div>
                    </a>  
                    </div>
                    <p class="tun">CLARISSA</p>
                    <div class="ca-rt">
                    <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>           
                    </div>  
                    </div>

                    <div class="column simpleCart_shelfItem" style="margin-top: 2in; margin-bottom: 1in">
                    <div class="product-at ">
                    <a href="single.php"><img class="img-responsive" src="images/pi.jpg" alt="">
                    <div class="pro-grid">
                    <span class="buy-in">Buy Now</span>
                    </div>
                    </a>  
                    </div>
                    <p class="tun">CLARISSA</p>
                    <div class="ca-rt">
                    <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>           
                    </div>          
                    </div>

                </div>
                <br>
                <br>

        </div>
        </div>
        </div>
      </div>

    <br>
    <br>
<!--//content-->
<!--
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script> -->
<!--footer-->
<?php include('footer.php'); ?>
</body>
</html>
      