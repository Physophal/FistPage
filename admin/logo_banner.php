<?php
session_start();
include "../connection.php";
if(!isset($_SESSION["username"])){
	header("Location:login.php");
}
function GetImageExtension($imagetype){
	if(empty($imagetype)) return 'none';
	switch($imagetype){
		case 'image/jpeg' : 
			return '.jpg';break;
		default:return 'none';
		}
	}
	
	if(isset($con,$_POST["btn-save-logo-admin"])){
	 if(!empty($_FILES["logo_admin"]["name"])){
		$file_name=$_FILES["logo_admin"]["name"];//test
		$temp_name = $_FILES["logo_admin"]["tmp_name"];//test
		$imgtype=$_FILES["logo_admin"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg='<span class"text-danger">This file is not JPEG or PNG.</span>';
		}
		else{
			$imagename = "admin_logo".$ext;
			$target = '../images/admin_logo/'.$imagename;
			move_uploaded_file($temp_name,$target);
					
	
	}
	}
	
}
	
 else if(isset($con,$_POST["btn-save-logo-banner"])){
	 if(!empty($_FILES["logo"]["name"])){
		$file_name=$_FILES["logo"]["name"];//test
		$temp_name = $_FILES["logo"]["tmp_name"];//test
		$imgtype=$_FILES["logo"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg='<span class"text-danger">This file is not JPEG or PNG.</span>';
		}
		else{
			$imagename = "logo_banner".$ext;
			$target = '../images/logo_banner/'.$imagename;
			move_uploaded_file($temp_name,$target);
					
	
	}
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
<title>Administration</title></head>
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
		
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		
        <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Logo Admin</h3>
  </div>
  <div class="panel-body">
		<div class="form-group">
		<form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" enctype="multipart/form-data">
		<div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">File</span>
                       <input id="login-password" type="file" class="form-control" name="logo_admin" value="" required>
		</div>
		<div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-logo-admin" id="btn-login" class="btn btn-success kh" value="Save Logo Admin" />
                                
                                    </div>
                              </div></form>
		</div>
	 </div>	</div>
	   
	   
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Logo Banner</h3>
  </div>
  <div class="panel-body">
		<div class="form-group">
		<form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" enctype="multipart/form-data">
		<div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">File</span>
                       <input id="login-password" type="file" class="form-control" name="logo" value="" required>
		</div>
		<div style="margin-bottom: 25px" class="input-group">
		<img class="img-responsive" src="../images/logo_banner/logo_banner.jpg">
		</div>
		
		<div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-logo-banner" id="btn-login" class="btn btn-success kh" value="Save Logo Banner" />
                                
                                    </div>
                              </div></form>
		</div>
	 </div>
	 </div>


   </div>
</body>
</html>