<!DOCTYPE html>
<style type="text/css">
    .signup-centered{
        margin-top: 5%;
        padding-right: 8%;
        padding-left: 8%;
    }
    .cc{
        margin-right: 15px !important;
        margin-left: 15px !important;
        width: 2.28in !important;
        height: 35px !important;
        color: #555 !important;
        border-color: #dddddd !important;
        background-color: #dddddd !important;

    }
    .nav-tabs>li.active>a{
        background-color: #5cb85c !important;
        color: #fff !important;   
    }
    .nav>li>a{
        padding-top: 5px !important;
    }
    
</style>
<html>
<head>
	<title>Tumandok Craft Industries</title>
    <link rel="icon" type="image/png" href="img/tci.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom_style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php include('head.php'); ?>
</head>
<body class="login">
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8">
				<div class="col-lg-offset-1 col-lg-10">
					<div class="panel panel-info signup-centered">
                		<div class="text-center">
                            <br>
                			<img src="img/tci-logo.png"/>
                            <h2>Signup</h2>
                		</div>
                        <br>
                        <ul class="nav nav-tabs">
                          <li><a data-toggle="tab" href="#menu1" class="cc">Single Buyer</a></li>
                          <li><a data-toggle="tab" href="#menu2" class="cc">Company</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home"><br><br></div>
                          <div id="menu1" class="tab-pane fade">
                            <?php viewByCategory('Single Buyer'); ?>
                          </div>
                          <div id="menu2" class="tab-pane fade">
                            <?php viewByCategory('Company'); ?>
                          </div>
                        </div>
                        <?php 
                            function viewByCategory($category){
                                if($category == 'Single Buyer'){
                        ?>
                                    <form action="php/cust_signup.php?user_type=Single Buyer" method="post">
                                        <?php $_POST['user_type'] = "Single Buyer"?>
                                        <label class="control-label" for="acc_fname">Firstname:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_fname" name="acc_fname" placeholder="Firstname" focus=""/>
                                        </div>

                                        <label class="control-label" for="acc_lname">Lastname:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_lname" name="acc_lname" placeholder="Lastname" focus=""/>
                                        </div>

                                        <label class="control-label" for="acc_email">E-mail:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_email" name="acc_email" placeholder="E-mail Address"></input>
                                        </div>

                                        <label class="control-label" for="password1">Password:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="password" required="" id="password1" name="password1" placeholder="Password"></input>
                                        </div>

                                        <label class="control-label" for="password2">Retype Password:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="password" required="" id="password2" name="password2" placeholder="Password"></input>
                                        </div>

                                        <label class="control-label">Contact Number</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" name="acc_contact" id="acc_contact" required="" placeholder="Contact Number">
                                        </div>

                                        <div class="text-center submit">
                                            <button class="btn btn-success" type="submit">Signup</button>
                                            <a href="index.php"><span class="btn btn-danger">Cancel</span></a>
                                        </div>
                                    </form>
                        <?php  
                                }elseif($category == 'Company'){
                                    
                        ?>
                                    <form action="php/cust_signup.php?user_type=Company" method="post">
                                        <?php $_POST['user_type'] = "Single Buyer"?>

                                        <label class="control-label">Buying Agent:</label>
                                        <br><br>

                                        <label class="control-label" for="acc_fname">Firstname:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_fname" name="acc_fname" placeholder="Firstname"/>
                                        </div>

                                        <label class="control-label" for="acc_lname">Lastname:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_lname" name="acc_lname" placeholder="Lastname" focus=""/>
                                        </div>

                                        <label class="control-label" for="acc_email">E-mail:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_email" name="acc_email" placeholder="E-mail Address"></input>
                                        </div>

                                        <label class="control-label" for="password1">Password:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="password" required="" id="password1" name="password1" placeholder="Password"></input>
                                        </div>

                                        <label class="control-label" for="password2">Retype Password:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="password" required="" id="password2" name="password2" placeholder="Password"></input>
                                        </div>

                                        <label class="control-label">Contact Number</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" name="acc_contact" id="acc_contact" required="" placeholder="Contact Number">
                                        </div>

                                        <br>
                                        <label class="control-label">Company:</label><br><br>
                                        <label class="control-label" for="acc_company">Company Name:</label>
                                        <div class="control-group">
                                            <input type="text" name="acc_company" id="acc_company" class="form-control" required="" placeholder="Company Name" focus>    
                                        </div>

                                        <label class="control-label" for="acc_add">Company Address:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_add" name="acc_add" placeholder="Company Address" focus=""/>
                                        </div>

                                        <label class="control-label" for="acc_comp_contact">Company Contact Number:</label>
                                        <div class="control-group">
                                            <input class="form-control" type="text" required="" id="acc_comp_contact" name="acc_comp_contact" placeholder="Company Contact Number"></input>
                                        </div>

                                        <div class="text-center submit">
                                            <button class="btn btn-success" type="submit">Signup</button>
                                            <a href="index.php"><span class="btn btn-danger">Cancel</span></a>
                                        </div>
                                    </form>
                        <?php  
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</htm>