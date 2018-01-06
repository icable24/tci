<?php 
  include('../login_success.php');
  include('../database.php');

  $pdo = Database::connect();

  $featured = $pdo->prepare("SELECT * FROM featuredprod ORDER BY featured_id");
  $featured->execute();
  $featured = $featured->fetchAll();

  $prod =array();

  for($i = 0; $i < 5; $i++){
  	$prod[$i] = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
  	$prod[$i]->execute(array($featured[$i]["prod_id"]));
  	$prod[$i] = $prod[$i]->fetch();
  }
?>
<!DOCTYPE html>
<html>
	<?php 
		include("head.php");
	?>
	<body>
	<?php
		include('sidenavbar.php'); 
	?>
	<div class="page home-page">
		<?php 
			include("header.php");
		?>
		<br>
		<br>
		<div class="container-fluid">
			<div class="offset-1 col-10">
          		<div class="alert alert-success">
            		<div>
            			<div>
			              	<h1>Featured Products</h1>
			            </div>
			            <div class="card-block">
			            	<?php 
	            				$img = array();
	            				for($a = 0; $a < 5; $a++){
	            					$img[$a] = "../prod_img/" . $prod[$a]['prod_image'];
	            				}
	            			?>
	            			<div class="row">
	            				<div class="offset-10">
	            					<a href="#" class="btn btn-primary">Add Product</a>
	            				</div>
	            			</div>
	            			<div class="clearfix"></div>
	            			<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>1</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[0] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[0]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[0]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[0]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="<?php echo $prod[0]['prod_code'] ?>">Remove</a>
			            		</div>
			            	</div>
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>2</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[1] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[1]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[1]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[1]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[1]["prod_code"] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>3</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[2] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[2]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[2]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[2]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[2]["prod_code"] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>4</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[3] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[3]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[3]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[3]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[3]["prod_code"] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<div class="clearfix"></div>
			            	<br><br>
			            	<div class="row">
			            		<div class="col-1">
			            			<br><br><br>
			            			<label><h3>5</h3></label>
			            		</div>
			            		<div class="col-3">
			            			<img src="<?php echo $img[4] ?>" style="width: 150px; height: 150px;" alt="Image">
			            		</div>
			            		<div class="col-6">
			            			<div class="row">
			            				<label><?php echo $prod[4]["prod_name"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo $prod[4]["prod_code"] ?></label>
			            			</div>
			            			<div class="row">
			            				<label><?php echo "Php " . number_format($prod[4]['prod_price'], 2) ?></label>
			            			</div>
			            		</div>
			            		<div class="">
			            			<br><br>
			            			<a href="../php/removeFeature.php?id=<?php echo $prod[4]["prod_code"] ?>" class="btn btn-danger">Remove</a>
			            		</div>
			            	</div>
			            	<div class="clearfix"></div>
			            </div>
            		</div>
            	</div>
            </div>	
		</div>
	</div>
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog "> 

    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 40%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Donor List</h4>
      </div>
      <div class="modal-body">
      <?php 
      require 'dbconnect.php';
      $pdo = Database::connect();
	  $donor = $pdo->prepare("
		SELECT SQL_CALC_FOUND_ROWS * 
		FROM donor WHERE dremarks = 'Accepted'
	");
	$donor->execute();

	$donor = $donor->fetchAll(PDO::FETCH_ASSOC);
      ?>
    	<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr class="alert-info">
							<th>Donor ID</th>
							<th>Name</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>	
					<tbody>					
						<?php								
							foreach ($donor as $row) {
								echo '<tr>';
									echo '<td>'. $row['did'] . '</td>';
									echo '<td>'.$row['dfname'] . ' ' . substr($row['dmname'], 0 , 1) . '. ' .  $row['dlname'].'</td>';
									echo '<td class="text-center">
													<a class="btn btn-primary btn-md" href="bloodcollection.php?id='.$row['did'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit">
									  		  </td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
					</tbody>
				</table>
			</div>
      </div>
    </div>
  </div>
</div>
	</body>
</html>