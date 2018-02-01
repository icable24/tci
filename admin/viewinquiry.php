<?php 
	include('../login_success.php');
 	include('../database.php');

 	$pdo = Database::connect();

 	if(isset($_GET['id'])){
 		$inquiryID = $_GET['id'];
 	}else{
 		header("location: inquiry.php");
 	}

 	$setViewed = $pdo->prepare("UPDATE inquiry SET statusView = ? WHERE inquiryID = ?");
 	$setViewed->execute(array(1, $inquiryID));

 	$setStatus = $pdo->prepare("UPDATE inquiry SET status = ? WHERE inquiryID = ?");
 	$setStatus->execute(array('read', $inquiryID));
?>
<!DOCTYPE html>
<style type="text/css">
	.img-class{
		width:75px;
		height: 75px;
	}
</style>
<html>
<?php 
	include("head.php");
?>
<body>
<?php
	include("sidenavbar.php");
?>
	<div class="page home-page">
		<?php
		include("header.php");
		$pdo = Database::connect();
		$inquiry = $pdo->prepare("SELECT * FROM inquiry WHERE inquiryID = ?");
		$inquiry->execute(array($inquiryID));
		$inquiry = $inquiry->fetch();

		?>
		<br><br>
		<div class="container-fluid">
			
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-12">	
				<div class="alert alert-success">
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">From: &nbsp;&nbsp;&nbsp;<?php echo $inquiry['acc_name'];?></th>
						</tr>
					</thead>
				</table>
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">Email: &nbsp;&nbsp;&nbsp;<?php echo $inquiry['acc_email'];?></th>
						</tr>
					</thead>
				</table>
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">Subject: &nbsp;&nbsp;&nbsp;<?php echo $inquiry['subject'];?></th>
						</tr>
					</thead>
				</table>
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">Message:</th>
						</tr>
					</thead>
					<tbody>
						<tr class="alert-success">
							<th style="text-align: justify;"><?php echo $inquiry['message'];?></th>
						</tr>
						
					</tbody>
				
					</table>
				</div>	

					<!--<?php
					//echo "
					// <td class='class-center'>
                   // <a href='#' onclick='myFunction()' class='btn btn-primary pull-right' data-toggle='tooltip' title='Reply'><span>Reply</span></a>
                 // </td>
                  	//	";
                  	?>
-->
				</div>		
			</div>			
		</div>
		<!--
<br>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
</script>
		<div class="container-fluid" id="myDIV" style="display:none">
			
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-12">	
				<div class="alert alert-success">
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">To: &nbsp;&nbsp;&nbsp;<?php echo $inquiry['acc_name'];?></th>
						</tr>
					</thead>
				</table>
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">Email: &nbsp;&nbsp;&nbsp;<?php echo $inquiry['acc_email'];?></th>
						</tr>
					</thead>
				</table>
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">Subject: &nbsp;&nbsp;&nbsp;<?php echo $inquiry['subject'];?></th>
						</tr>
					</thead>
				</table>
				<table class="table">
					<thead>
						<tr class="alert-success">
							<th style="text-align: justify;">Message:</th>	
						</tr>
					</thead>
					<tbody>
						<tr class="alert-success">
							<th ><textarea id="message" name="message"  cols="137" rows="6" type="text" required="" placeholder="Message"></textarea></th>
						</tr>	
					</tbody>
					</table>
				</div>	

					<?php
					//echo "
					// <td class='class-center'>
                    //<a href='reply.php?id=$inquiryID' class='btn btn-primary pull-right' data-toggle='tooltip' title='Send'><span>Send</span></a>
                 // </td>
                  		//";
                  ?>

				</div>		
			</div>			
		</div>
-->
		
		<?php include("footer.php"); ?>
	</div>	
	<?php include("js.php"); ?>
</body>
</html>