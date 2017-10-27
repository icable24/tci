<!DOCTYPE html>
<html>
<head>
	<title>Tumandok Craft Industries</title>
    <link rel="icon" type="image/png" href="img/tci.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom_style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
        <div class="container-fluid header">
        	<a href="header.php" class="white">Tumandok Craft Industries</a>       
             <div class="pull-right menu ">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle white" data-toggle="dropdown"><i class="fa fa-user"></i>Josephine Locsin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="php/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
	        <div class="pull-right menu">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle white" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>  
                </div> 
            </div>
        </div>
        <div class="container-fluid subheader">
        	<img src="img/tci-logo.png">
        </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <div class="collapse navbar-collapse container modules fontsizeheader" >
            <ul class="nav navbar-nav modules">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown white">PROFILES</a>
                    <ul class="dropdown-menu">
                        <li><a href="productlist.php"  class="fontsizeheader">PRODUCTS</a></li>
                        <li><a href="customerlist.php"  class="fontsizeheader">CUSTOMER</a></li>
                        <li><a href="employeelist.php"  class="fontsizeheader">EMPLOYEES</a></li>
                    </ul>                        
                </li>
                    <li class="menu">
                         <a href="viewinventory.php">INVENTORY</a>    
                    </li>
                    <li class="menu">
                         <a href="#">ORDERS</a>    
                    </li>
                    <li class="menu">
                         <a href="#">REPORTS</a>    
                    </li>
            </ul>
        </div> 
	</nav>
</body>
</html>

</html>