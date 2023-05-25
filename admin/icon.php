<?php
session_start();
include "../connection.php";
if(!isset($_SESSION["username"])){
	header("Location:login.php");
}
function GetImageExtension($imagetype){
	if(empty($imagetype)) return 'none';
	switch($imagetype){
		case 'image/png' : 
			return '.png';break;
		default:return 'none';
		}
	}
	
	if(isset($con,$_POST["btn-save-icon"])){
	 if(!empty($_FILES["icon"]["name"])){
		$file_name=$_FILES["icon"]["name"];//test
		$temp_name = $_FILES["icon"]["tmp_name"];//test
		$imgtype=$_FILES["icon"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg='<span class"text-danger">This file is not PNG.</span>';
		}
		else{
			$imagename = "icon".$ext;
			$target = '../images/icon/'.$imagename;
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
    <h3 class="panel-title">Change Icon</h3>
  </div>
  <div class="panel-body">
		<div class="form-group">
		<form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" enctype="multipart/form-data">
		<div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">File</span>
                       <input id="login-password" type="file" class="form-control" name="icon" value="" required>
		</div>
		<div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-icon" id="btn-login" class="btn btn-success kh" value="Save Icon" />
                                
                                    </div>
                              </div></form>
		</div>
	 </div>	</div>
	   
	   
	


   </div>
</body>
</html>