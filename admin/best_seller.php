
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "tcishop");  
 $query = "SELECT prod_id, count(*) as total FROM cart GROUP BY prod_id";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Tumandok Craft Industries</title>
<link rel="icon" type="image/png" href="../img/tci.png">
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
                      title: 'Best Seller Products of Tumandok',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Tumandok Craft Industries Best Seller</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  
