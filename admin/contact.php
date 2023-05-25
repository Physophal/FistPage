﻿<?php
session_start();
include "../connection.php";
if(!isset($_SESSION["username"])){
	header("Location:login.php");

}

function text_area($txt){
$txt = nl2br($txt);
$txt = stripcslashes($txt);
return $txt;	
}


if(isset($con,$_POST["btn-save-contact-title"])){
	$ql = mysqli_query($con,"update table_contact set contact_title_en='".mres($con,$_POST["contact_title_en"])."',contact_title_kh='".mres($con,$_POST["contact_title_kh"])."'") or die("Can not update");
	
}
else if(isset($con,$_POST["btn-save-contact-content"])){
	$ql = mysqli_query($con,"update table_contact set contact_content_en='".mres($con,text_area($_POST["contact_content_en"]))."',contact_content_kh='".mres($con,text_area($_POST["contact_content_kh"]))."'") or die("Can not update");
	
}
 else if(isset($con,$_POST["btn-save-contact-map"])){
	$ql = mysqli_query($con,"update table_contact set contact_map_en='".mres($con,$_POST["contact_map_en"])."',contact_map_kh='".mres($con,$_POST["contact_map_kh"])."'") or die("Can not update");
	
}

else if(isset($con,$_POST["btn-save-map"])){
	//test.jpg
	if(!empty($_FILES["company_map"]["name"])){
		$file_name=$_FILES["company_map"]["name"];//test
		$temp_name = $_FILES["company_map"]["tmp_name"];//test
		$imgtype=$_FILES["company_map"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg='<span class"text-danger">This file is not JPEG or PNG.</span>';
		}
		else{
			$imagename = "company_map".$ext;
			$target = '../images/map/'.$imagename;
			move_uploaded_file($temp_name,$target);
			}
	}
	}
	function GetImageExtension($imagetype){
	if(empty($imagetype)) return 'none';
	switch($imagetype){
		case 'image/jpeg' : 
			return '.jpg';break;
		case 'image/png' : 
			return '.png';break;
		default:return 'none';
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
    <h3 class="panel-title">Change Contact Title:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Change Contact Title English:</span>
                       <input id="login-password" type="text" class="form-control" name="contact_title_en" value=""  required>            </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Change Contact Title Khmer</span>
                       <input name="contact_title_kh" class="form-control" type="text" required/>

                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-contact-title" id="btn-login" class="btn btn-success kh" value="Save Contact Title" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Contact Content:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Change Contact Content English:</span>
                       <textarea id="login-password" class="form-control" name="contact_content_en"​ ​required></textarea>            </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Change Contact Content Khmer</span>
                       <textarea id="login-password" class="form-control" name="contact_content_kh" required></textarea>

                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-contact-content" id="btn-login" class="btn btn-success kh" value="Save Contact Content" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Contact Map:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Change Contact Map English:</span>
                       <input id="login-password" type="text" class="form-control" name="contact_map_en" value=""  required>            </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Change Contact Map Khmer</span>
                       <input name="contact_map_kh" class="form-control" type="text" required/>

                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-contact-map" id="btn-login" class="btn btn-success kh" value="Save Contact Map" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Company Map</h3>
  </div>
  <div class="panel-body">
    <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" enctype="multipart/form-data">
			   <div style="margin-bottom: 25px" class="input-group">
                     
                       <input id="login-password" type="file" class="form-control" name="company_map" value="" placeholder="Select an Image" required>     </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-map" id="btn-login" class="btn btn-success kh" value="Save" />
                                
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  
</div>

</body>
</html>