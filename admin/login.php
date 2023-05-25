<?php
session_start();
include("../connection.php");
$alert="none";
if(isset($con,$_POST["btn-login"])){
	$username = $_POST["username"];
	 $password = $_POST["password"];
	$qry =mysqli_query($con,"select * from table_admin where admin_name='".$username."' and admin_password='".md5($password)."'");
	$count =mysqli_num_rows($qry);
	if($count>0){
		$_SESSION["username"]=$username;
		header("Location:index.php");		
}
else{
	$alert="block";	
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<link rel="icon" href="http://epagestore.com/img/icon5.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="../js/jquery-1.12.3.min.js"></script>
  	<script src="../js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Login</title>
</head>

<body>
<?php
	include ("admin_header.php");
?>
	<div class="container">  
        	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   
        		<div class="alert alert-danger" role="alert" style="display:<?php echo $alert;?>">
  					<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
  					Username or password is incorrect, please try again!
				</div>   
             
            	<div class="panel panel-default" >
                    <div class="panel-heading">
                    	<div class="panel-title">Admin Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="?forget_password=request" >Forget password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                    <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
                       <div style="margin-bottom: 25px" class="input-group">
     		       	   		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                       		<input name="username" class="form-control" type="text" placeholder="username" required oninvalid="this.setCustomValidity('Please input username')" oninput="setCustomValidity('')"/>
                   	   </div>
	 				   <div style="margin-bottom: 25px" class="input-group">
                       		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                       		<input type="password" id="login-password"  class="form-control" name="password" value="" placeholder="password" required oninvalid="this.setCustomValidity('Please input password')" oninput="setCustomValidity('')">                       </div>
    						<div class="input-group">
                                <div style="margin-top:10px" class="form-group">
                                
                                    	<input type="submit" name="btn-login" id="btn-login" class="btn btn-success" value="Login" />
                             
                                </div>
                            </div>

					</form>
					</div>                     
               </div>  
        </div>
</div>
</body>
</html>