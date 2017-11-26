x<!--A Design by W3layouts 
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

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<body>
<!--header-->
<?php include('header.php'); ?>
	<!-- grow -->
	<div class="grow" style="background-color: #dff0d8; border-color: #d6e9c6">
		<div class="container">
			<h2 style="color: #3c763d; font-weight: regular;">Place Order</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
			
  
  <h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Payment</h3>
  <div class="container-fluid" style="width: 12.5in;">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span></span>
              <br>
            </div>
            <div class="panel-body">
              <form action="paynoteinfo.php" enctype="multipart/form-data" method="post">
                <table>
                  <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                  <tr>
                  </tr>
                </table>
              </div>
        </div>
        <br>
        <br>
        <button type="submit" class="w3-button pull-right" onclick="plusDivs(1)" style=" font-family: verdana; background-color: #8de78b; color: white; font-weight: bold;"> Proceed &#10095;</button>
         <a href="setaddress.php" class="w3-button pull-right" style="margin-right: 0.78in; font-family: verdana; background-color: #8de78b; color: white; font-weight: bold; width: 1.2in; text-decoration: none" title="Product Summary">  &#10094; &nbsp; Back </a>
         </form>
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
			