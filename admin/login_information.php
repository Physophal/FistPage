<?php
session_start();
include("../connection.php");
$admin_id="";
$admin_email="";
$admin_password="";
$msg_password="";
$msg_email="";
if(!isset($_SESSION["username"])){
	header("Location:login.php");
}

else{
	$qry_admin=mysqli_query($con,"select * from table_admin where admin_name='".$_SESSION["username"]."'");
	while($row=mysqli_fetch_array($qry_admin,MYSQLI_ASSOC)){
		$admin_id=$row["admin_id"];
		$admin_email=$row["admin_id"];
		$admin_password=$row["admin_id"];
		
		}
	
}




if(isset($_POST["btn-save-password"])){
	$new_password= $_POST["new_password"];
	$confirm_password= $_POST["confirm_password"];
	if($new_password==$confirm_password){
		$qry_password =mysqli_query($con, "update table_admin set admin_password='".md5($new_password)."' where admin_id='".$admin_id."'");	
		$msg_password="Your password has been update successfully!";
	}
	else{
		$msg_password="Sorry! Your password doesn't match";
	}
	
	}
	
	
	else if(isset($_POST["btn-save-email"])){
	$new_email= mres($_POST["new_email"]);
	$confirm_email= mres($_POST["confirm_email"]);
	if($new_email==$confirm_email){
		$qry_email =mysqli_query($con, "update table_admin set admin_email='".($new_email)."' where admin_id='".$admin_id."'");	
		$msg_email="Your email has been update successfully!";
	}
	else{
		$msg_email="Sorry! Your email doesn't match";
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
<title>Login Information</title></head>
<body>
<?php
include("admin_header.php");
?>
<div class="container">
    <div class="row">
         
         
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
       
        
         <?php
include("left_menu.php");
?>

        </div>
        <div class="col-lg-7 col-md-9 col-sm-9 col-xs-12">
       <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Password</h3>
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">New Password</span>
                       <input id="login-password" type="password" class="form-control" name="new_password" value="" placeholder="New Password" required>                       </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Confirm Password</span>
                       <input name="confirm_password" class="form-control" type="password" placeholder="Confirm Password" required/>
                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-password" id="btn-login" class="btn btn-success kh" value="Save" />
                        
                        <?php
						if($msg_password!=""){
							echo $msg_password;
							}
						?>
                                    </div>
                                </div>

  </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Email</h3>
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">New Email</span>
                       <input id="login-password" type="text" class="form-control" name="new_email" value="" placeholder="New Email" required>                       </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Confirm Email</span>
                       <input name="confirm_email" class="form-control" type="text" placeholder="Confirm Email" required/>
                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-email" id="btn-login" class="btn btn-success kh" value="Save" />
                                      
                                      <?php
						if($msg_email!=""){
							echo $msg_email;
							}
						?>
                                   
                                    </div>
                                </div>

  </form>
  </div>
</div>
</div>

</body>
</html>