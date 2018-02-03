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
			<h2 style="color: #3c763d; font-weight: regular;">Contact Us</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
			
  <br><br>
  <div class="container-fluid" style="width: 8.7in;">
        <div class="col-lg-12">
          <div class="panel panel-default">
            
            <div class="panel-body">
              <form action="index.php" enctype="multipart/form-data" method="post">
                <div>
                  <h1>Hello,</h1>
                  <br>
                  <p style="font-size: 25px; text-align: justify-all;">Thank you for your email. </p>
                    <p style="font-size: 20px">Answering questions are a top priority for us. A member of our team will follow up with you today to reply to your inquiry. Please check your email for updates.</p>
                  <br><br><br>
                  <p class="pull-right" style="font-size: 20px">Regards,
                  <br><br>
                  Tumandok Craft Industry Team
                  <br>
                  </p>
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
			