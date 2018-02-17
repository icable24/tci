<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

</head>
<body>
<style type="text/css">

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
    width: 2in;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #33b35a;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


</style>

<?php

$connection = mysqli_connect("localhost", "root", "", "tcishop");

$queryString1 = "SELECT COUNT(*)  AS total1 FROM account WHERE user_type != 'admin' AND user_type != 'inventory'";
$queryString8 = "SELECT COUNT(*)  AS total8 FROM account WHERE user_type = 'Company'";
$queryString9 = "SELECT COUNT(*)  AS total9 FROM account WHERE user_type = 'Single Buyer'";

$queryString2 = "SELECT COUNT(*)  AS total2 FROM product";
$queryString3 = "SELECT COUNT(*)  AS total3 FROM product WHERE pc_name = '1'";
$queryString4 = "SELECT COUNT(*)  AS total4 FROM product WHERE pc_name = '2'";
$queryString5 = "SELECT COUNT(*)  AS total5 FROM product WHERE pc_name = '3'";
$queryString6 = "SELECT COUNT(*)  AS total6 FROM product WHERE pc_name = '4'";
$queryString7 = "SELECT COUNT(*)  AS total7 FROM product WHERE pc_name = '5'";


$query1 = mysqli_query($connection, $queryString1);
$query2 = mysqli_query($connection, $queryString2);
$query3 = mysqli_query($connection, $queryString3);
$query4 = mysqli_query($connection, $queryString4);
$query5 = mysqli_query($connection, $queryString5);
$query6 = mysqli_query($connection, $queryString6);
$query7 = mysqli_query($connection, $queryString7);
$query8 = mysqli_query($connection, $queryString8);
$query9 = mysqli_query($connection, $queryString9);


$row1 = mysqli_fetch_object($query1);
$row2 = mysqli_fetch_object($query2);
$row3 = mysqli_fetch_object($query3);
$row4 = mysqli_fetch_object($query4);
$row5 = mysqli_fetch_object($query5);
$row6 = mysqli_fetch_object($query6);
$row7 = mysqli_fetch_object($query7);
$row8 = mysqli_fetch_object($query8);
$row9 = mysqli_fetch_object($query9);




?>
<br><br>
<table align="center">
   <tr>
      <td class="circle-tile ">
        <a href="customerlist.php"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
      </td>
    </tr>
    <tr></tr>
  <tr>
     <td class="circle-tile ">
        <div class="circle-tile-content green">
          <div class="circle-tile-number text-faded "><?php echo $row8->total8;?></div>
          <a class="circle-tile-footer" style="color: white">Company</a>
        </div>
      </td>
  
      <td class="circle-tile ">
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-number text-faded "><?php echo $row9->total9;?></div>
          <a class="circle-tile-footer" style="color: white">Single Buyer</a>
        </div>
      </td>
      <td class="circle-tile ">
        <div class="circle-tile-content green">
          <div class="circle-tile-number text-faded "><?php echo $row1->total1;?></div>
          <a class="circle-tile-footer" style="color: white">Total Customers</a>
        </div>
      </td>
  </tr>
</table>

<br><br>
<table align="center">
    <tr>
     <td class="circle-tile ">
      <a href="productlist.php"><div class="circle-tile-heading green"><i class="fa fa-archive fa-fw fa-3x"></i></div></a>
    </td>
    </tr>
     
  <tr>
      <td class="circle-tile ">
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-number text-faded "><?php echo $row3->total3;?></div>
          <a class="circle-tile-footer" style="color: white">Light Furnitures</a>
        </div>
      </td>
     
      <td class="circle-tile ">
        <div class="circle-tile-content green">
          <div class="circle-tile-number text-faded "><?php echo $row4->total4;?></div>
          <a class="circle-tile-footer" style="color: white">Accessories</a>
        </div>
      </td>
  
      <td class="circle-tile ">
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-number text-faded "><?php echo $row5->total5;?></div>
          <a class="circle-tile-footer" style="color: white">Wall Decor</a>
        </div>
      </td>
     
      <td class="circle-tile ">
        <div class="circle-tile-content green">
          <div class="circle-tile-number text-faded "><?php echo $row6->total6;?></div>
          <a class="circle-tile-footer" style="color: white">Luminaries</a>
        </div>
      </td> 
   
      <td class="circle-tile ">
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-number text-faded "><?php echo $row7->total7;?></div>
          <a class="circle-tile-footer" style="color: white">Home Furnishing</a>
        </div>
      </td> 
      <td class="circle-tile ">
        <div class="circle-tile-content green">
          <div class="circle-tile-number text-faded "><?php echo $row2->total2;?></div>
          <a class="circle-tile-footer" style="color: white">Total Products</a>
        </div>
      </td>
  </tr> 
</table>
</body>
</html>
