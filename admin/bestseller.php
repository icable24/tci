<?php 
  include('../login_success.php');
  include('../database.php');

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/custom.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom stylesheet - for your changes-->
    <!-- Favicon-->
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
</head>
  <?php  
 $connect = mysqli_connect("localhost", "root", "", "tcishop");  
 $query = "SELECT prod_name prod_id, count(*) as total FROM cart JOIN product ON cart.prod_id=product.prod_id GROUP BY prod_id";  
 $result = mysqli_query($connect, $query);  
 ?>  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Product ID', 'total'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["prod_id"]."', ".$row["total"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,  
                      pieHole: 0.1 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
  <body>
    <!-- Side Navbar -->
    <?php include('sidenavbar.php'); ?>
    <div class="page home-page">
      <!-- navbar-->
      <?php include('header.php'); ?>
      
      <!-- Body Section -->
      <br><br><br><br><br>
      	<div class="container-fluid" style="width: 100%">
          <div class="alert alert-success">
           
            <div class="card-block">
                <div id="printableArea" style="width:100%;">
               <h3 align="center"> <img src="../img/tci.png"> <br><br>
                Tumandok Craft Industries <br><br>
                 <center>
                <h5>Purok, Ma. Morena, Calumangan, Bago City, Negros Occidental,</h5>
<h5>Philippines 6101</h5>
<h5>702-2658|+63917-301-7571</h5></center>
<br>
                Best Seller Products</h3>

 <br>  
                <div id="piechart" style="width: 100%; height: 1000px;"></div>  
<br><br>

<h3 class="pull-right">________________________________ &nbsp;&nbsp;&nbsp; <br>Printed By:</h3>
              </div> 

<script type="text/javascript">
  
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
                        
<br><br><br><br>
<button type="submit" name="submit" onclick="printDiv('printableArea')" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span> Generate </button>	
</center>
</div>
</div>

</div>

      <!-- Footer Section -->
      <?php include('footer.php'); ?>
    </div>
    <!-- Javascript files-->
    <?php include('js.php'); ?>
  </body>
</html>