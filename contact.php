<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	require 'database.php';
?>

<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<body>
	<?php include('header.php'); ?>
	<!--<?php 

	$acc_email //= $_SESSION['login_username'];
  //$pdo //= Database:: connect();
 // $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      //  $user_id = $pdo->prepare("SELECT * FROM account WHERE acc_email = ?");
      //  $user_id->execute(array($acc_email));
       // $user_id = $user_id->fetch(PDO:: FETCH_ASSOC);
	?>-->


	<!-- grow -->
	<div class="grow" style="background-color: #dff0d8; border-color: #d6e9c6">
		<div class="container">
			<h2 style="color: #3c763d">Contact</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
<div class="contact">
			
			<div class="container">
				<h4 >Please use the form below and we’ll get back as soon as possible.</h4>
				<div class="contact-form">

				<div class="col-md-8 contact-grid">
					<form action="./php/addinquiry.php" method="post">
						
						<input id="acc_name" name="acc_name" type="text" placeholder="Enter Fullname" required>
						<input id="acc_email" name="acc_email" type="text" placeholder="Enter Email" required>
						<input id="subject" name="subject" placeholder="Enter Subject" type="text">
						<textarea id="message" name="message" cols="77" rows="6" required placeholder="Message"></textarea>
					<div class="send">
					<input type="submit" value="Send">
					</div>
					</form>
				</div> 
		
			
				<div class="col-md-4 contact-in">

						<div class="address-more">
						<h4>Showroom Address:</h4>
							<p>G/F Cybergate Robinsons</p>
							<p>Singcang, Bacolod City,</p>
							<p>Negros Occidental, Philippines 6100 </p>
						<h5>Tel. No.:</h5><p>(6334) 707.7174</p>
						<h5>Email:</h5><p>info@tumandok.com</p>
						</div>
						<div class="address-more">
						<h4>Factory:</h4>
							<p>Purok, Ma. Morena, Calumangan,</p>
							<p>Bago City, Negros Occidental,</p>
							<p>Philippines 6101</p>
						<h5>Tel. No.:</h5><p>(+6334) 476.1050 | 702.2658</p>
						<h5>Mobile. No.:</h5><p>+63917.301.7571</p>
						<h5>Email:</h5><p>tci.bcdphilippines@gmail.com</p>
						</div>		
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3921.1597963327113!2d122.93206111448492!3d10.644691264522953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aed029b41b9df5%3A0x2b66742f4a5f8ee8!2sTumandok+Crafts+Industries!5e0!3m2!1sen!2sph!4v1507864485808" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
		
	</div>
<!--//content-->
<!--footer-->
  <?php include('footer.php'); ?>
</body>
</html>
			