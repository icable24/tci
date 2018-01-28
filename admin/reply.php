<?php 
	include('../login_success.php');
 	include('../database.php');

 	
	 $pdo = Database::connect();
		if(!empty($_GET['id'])){
		$inquiryID = $_REQUEST['id'];

		$inquiry = $pdo->prepare("SELECT * FROM inquiry WHERE inquiryID = ?");
		$inquiry->execute(array($inquiryID));
		$inquiry = $inquiry->fetch(PDO::FETCH_ASSOC);

	}else{
		header('location:index.php');
	}
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
		<?php include("header.php");?>
		<br><br>
		<div class="container-fluid">
			
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
				 <td class='class-center'>
                    <a href='index.php' class='btn btn-primary pull-right' data-toggle='tooltip' title='Send'><span>Send</span></a>
                  </td>
				</div>		
			</div>			
		</div>
		
		<?php include("footer.php"); ?>
	</div>	
	<?php include("js.php"); ?>
</body>
</html>