<!DOCTYPE html>
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
			<div class="col-lg-offset-3 col-lg-6">
				<div class="col-lg-offset-1 col-lg-10">
					<div class="panel panel-info centered">
                		<div class="text-center">
                			<img src="img/tci-logo.png"/>
                		</div>
                    	<form action="php/check_login.php" method="post">
                    		<label class="control-label" for="email">E-mail Address:</label>
                    		<div class="form-group input-group">
                    			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    			<input class="form-control" type="text" required="" id="email" name="email" placeholder="Email Address" focus=""/>
                    		</div>

                    		<label class="control-label" for="password">Password:</label>
                    		<div class="form-group input-group">
                    			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    			<input class="form-control" type="password" required="" id="password" name="password" placeholder="Password"></input>
                    		</div>
                            <div><span style="color: #ff0000">The Email or Password you entered is incorrect!</span></div>
                    		<div class="text-center submit">
                    			<button class="btn btn-success" type="submit">Login</button>
                                <a href="index.php"><span class="btn btn-danger">Back</span></a>
                    		</div>
                    	</form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>