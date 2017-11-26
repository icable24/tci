<!DOCTYPE html>
<style type="text/css">
    .signup-centered{
        margin-top: 5%;
        padding-right: 8%;
        padding-left: 8%;
    }
</style>
<html>
<head>
	<title>Tumandok Craft Industries</title>
    <link rel="icon" type="image/png" href="img/tci.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom_style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    	<form action="php/cust_signup.php?user_type=customer" method="post">
                            <?php $_POST['user_type'] = "customer"?>
                    		<label class="control-label" for="acc_fname">Firstname:</label>
                    		<div class="control-group">
                    			<input class="form-control" type="text" required="" id="acc_fname" name="acc_fname" placeholder="Firstname" focus=""/>
                    		</div>

                            <label class="control-label" for="acc_lname">Lastname:</label>
                            <div class="control-group">
                                <input class="form-control" type="text" required="" id="acc_lname" name="acc_lname" placeholder="Lastname" focus=""/>
                            </div>

                            <label class="control-label" for="acc_add">Address:</label>
                            <div class="control-group">
                                <input class="form-control" type="text" required="" id="acc_add" name="acc_add" placeholder="Address" focus=""/>
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
                    </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>