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
	<div class="grow" style="background-color: #dff0d8; border-color: #d6e9c6">
		<div class="container">
			<h2 style="color: #3c763d; font-weight: regular;">Place Order</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
			
  
  <h3 style="font-family: verdana; background-color: #ebebc6; text-align: center; ">Payment Note information</h3>
  <div class="container-fluid" style="width: 12.5in;">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span>Your order has been placed!</span>
              <br>
            </div>
            <div class="panel-body">
              <form action="index.php" enctype="multipart/form-data" method="post">
                <div>
                  <h5 style="color: red">ATLEAST 50% downpayment upon confirmation of order, balance 1 week before delivery.</h5>
                  <br>
                  <h5 style="font-weight: bold;">Bank Details</h5>
                  <div style="text-align: justify;">
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Bank Name: <span style="font-weight: bold">PHILIPPINE NATIONAL BANK</span></h5>
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Address: <span style="font-weight: bold">Lacson St., Bacolod City</span></h5>
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Account Name: <span style="font-weight: bold">JOSEPHINE T. LOCSIN</span></h5>
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Account Number: <span style="font-weight: bold">303103600010</span></h5>
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Swift Code: <span style="font-weight: bold">PNBMPHMM</span></h5>
                  </div>
                  <br>
                  <div style="text-align: center;">
                  <h5 style="color: red; text-align: center;">SURCHARGE:</h5>
                    <span>P200.00 for below P5000.00, Order.</span><br>
                    <span>Minimum order of P5000.00 net.</span>
                  </div>
                  <br><br>
                  <h4>*ONCE PAYMENT HAS BEEN RECEIVED TCI WILL INFORM YOU IMMEDIATELY.</h4>
                </div>
              </div>
        </div>
        <br>
        <br>
        <button type="submit" class="w3-button pull-right" onclick="plusDivs(1)" style=" font-family: verdana; background-color: #8de78b; color: white; font-weight: bold;"> Back to Home</button>
         
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
			