<!DOCTYPE html>
<html>
<?php 	
	include('head.php');
	$con = mysqli_connect("localhost", "root", "", "tcishop"); 
	$query = $_GET['query']; 
?>
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
    /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

.img-responsive{
	height: 400px;
	width: 300px;
}
</style>
<body>
<?php  include('header.php'); ?>
	<!-- Product Catalog Header -->
	<div class="alert alert-success">
		<div class="container">
			<h2 style="font-family: verdana;"><?php echo 'Results for'.' '.$query ?></h2>
		</div>
	</div>
	<br>
	<div class="container-fluid">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($con, $query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($con, "SELECT * FROM product WHERE (`prod_name` LIKE '%".$query."%') OR (`prod_desc` LIKE '%".$query."%')");
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
            	if(isset($_SESSION['login_username'])){
               echo '<div class="column simpleCart_shelfItem">';
									echo '<div class="product-at ">';
										echo '<a href="productdetails.php'. "?id=". $results['prod_code'].'">';
											echo '<img class="img-responsive" src="prod_img/' . $results['prod_image'] . '" alt ="'. $results['prod_image'] . '">';
											echo '<div class="pro-grid">';
												echo '<span class="buy-in">View</span>';
											echo '</div>';
										echo '</a>';
									echo '</div>';
									echo '<p class="tun">'. $results['prod_name'] . '</p>';
									echo '<div class="ca-rt">';
										echo '<p class="number item_price"><i> </i> Php '. number_format($results['prod_price'], 2) . '</p>'	;
									echo '</div>';
								echo '</div>';
								
                            }else{
                            	echo '<div class="column simpleCart_shelfItem">';
									echo '<div class="product-at ">';
										echo '<a href="productdetails.php'. "?id=". $results['prod_code'].'" >';
											echo '<img class="img-responsive" src="prod_img/' . $results['prod_image'] . '" alt ="'. $results['prod_image'] . '">';
											echo '<div class="pro-grid">';
												echo '<span class="buy-in">View</span>';
											echo '</div>';
										echo '</a>';
									echo '</div>';
									echo '<p class="tun">'. $results['prod_name'] . '</p>';
									echo '<div class="ca-rt">';
									echo '</div>';
								echo '</div>';
                            }
                            
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "<p style='color:red'>Minimum length is ".$min_length. "</p>";
    }
?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
  <?php include('footer.php'); ?>
</body>
</html>
 