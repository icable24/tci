<?php
$conn = mysqli_connect("localhost", "root", "", "tcishop");
$query = "SELECT * FROM orders JOIN account ON orders.acc_id=account.acc_id ORDER BY order_id desc";
$sql = mysqli_query($conn, $query);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Date Range Search with jQuery DatePicker using Ajax, PHP & MySQL | softAOX Tutorial</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>
<body>
<br/>
<div class="container">
<h2 align="center">Date Range Search with jQuery DatePicker using Ajax, PHP & MySQL</h2>
<br/>
<br/>
<div class="col-md-2">
<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-2">
<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<div class="col-md-8">
<input type="button" name="range" id="range" value="Range" class="btn btn-success"/>
</div>
<div class="clearfix"></div>
<br/>
<div id="purchase_order">
<table class="table table-bordered">
<tr>
<th width="10%">Order Number</th>
<th width="35%">Customer Name</th>
<th width="5%">Price</th>
<th width="10%">Purchased Date</th>

</tr>
<?php
while($row= mysqli_fetch_array($sql))
{
	?>
    <tr>
    <td><?php echo $row["order_id"]; ?></td>
    <td><?php echo $row["acc_fname"].' '.$row["acc_lname"]; ?></td>
    <td><?php echo $row["order_amount"]; ?></td>
    <td><?php echo $row["date_ordered"]; ?></td>
    </tr>
    <?php
}
?>
</table>
<input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'mm-dd-yy'
	});
	$(function(){
		$("#From").datepicker();
		$("#to").datepicker();
	});
	$('#range').click(function(){
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"sample2.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#purchase_order').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
</body>
</html>