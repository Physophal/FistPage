<?php
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

if(isset($con,$_POST["btn-save-company-profile-title"])){
	$ql = mysqli_query($con,"update table_about set company_profile_title_en='".mres($con,$_POST["company_profile_title_en"])."',company_profile_title_kh='".mres($con,$_POST["company_profile_title_kh"])."'") or die("Can not update");
	}
else if(isset($con,$_POST["btn-save-company-profile-content"])){
	$ql = mysqli_query($con,"update table_about set company_profile_content_en='".mres($con,text_area($_POST["company_profile_content_en"]))."',company_profile_content_kh='".mres($con,text_area($_POST["company_profile_content_kh"]))."'") or die("Can not update");
	}
else if(isset($con,$_POST["btn-save-company-mission"])){
	$ql = mysqli_query($con,"update table_about set company_mission_en='".mres($con,$_POST["company_mission_en"])."',company_mission_kh='".mres($con,$_POST["company_mission_kh"])."'") or die("Can not update");
	}
else if(isset($con,$_POST["btn-save-company-mission-content"])){
	$ql = mysqli_query($con,"update table_about set company_mission_content_en='".mres($con,text_area($_POST["company_mission_content_en"]))."',company_mission_content_kh='".mres($con,text_area($_POST["company_mission_content_kh"]))."'") or die("Can not update");
	}
	
else if(isset($con,$_POST["btn-save-company-image"])){
	//test.jpg
	if(!empty($_FILES["company_image"]["name"])){
		$file_name=$_FILES["company_image"]["name"];//test
		$temp_name = $_FILES["company_image"]["tmp_name"];//test
		$imgtype=$_FILES["company_image"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg='<span class"text-danger">This file is not JPEG or PNG.</span>';
		}
		else{
			$imagename = "company_image".$ext;
			$target = '../images/company_image/'.$imagename;
			move_uploaded_file($temp_name,$target);
				
	}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/jquery-1.12.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
<title>About</title></head>
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
    <h3 class="panel-title">Company Profile Title:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Company Profile Title English:</span>
                       <input id="login-password" type="text" class="form-control" name="company_profile_title_en" value=""  required>            </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Company Profile Title Khmer</span>
                       <input name="company_profile_title_kh" class="form-control" type="text" required/>

                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-company-profile-title" id="btn-login" class="btn btn-success kh" value="Save Company Profile Title" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Company Profile Content:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Company Profile Content English:</span>
                       <textarea id="login-password" class="form-control" name="company_profile_content_en" required></textarea>           </div>

			   <div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Company Profile Content Khmer</span>
                       <textarea id="login-password" class="form-control" name="company_profile_content_kh" required></textarea>

                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-company-profile-content" id="btn-login" class="btn btn-success kh" value="Save Company Profile Content" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Company Mission:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Company Mission English:</span>
                       <input id="login-password" type="text" class="form-control" name="company_mission_en" value=""  required>            </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Company Mission Khmer</span>
                       <input name="company_mission_kh" class="form-control" type="text" required/>

                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-company-mission" id="btn-login" class="btn btn-success kh" value="Save Company Mission" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Company Mission Content:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Company Mission Content English:</span>
                       <textarea id="login-password" type="text" class="form-control" name="company_mission_content_en" value=""  required></textarea>            </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Company Mission Content Khmer</span>
                       <textarea name="company_mission_content_kh" class="form-control" type="text" required></textarea>

                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-company-mission-content" id="btn-login" class="btn btn-success kh" value="Save Company Mission" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Company Image</h3>
  </div>
  <div class="panel-body">
    <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" enctype="multipart/form-data">
			   <div style="margin-bottom: 25px" class="input-group">
                     
                       <input id="login-password" type="file" class="form-control" name="company_image" value="" placeholder="Select an Image" required>     </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-company-image" id="btn-login" class="btn btn-success kh" value="Save" />
                                
                                    </div>
                                </div>

  </form>
  </div>
  </div>
			
			
		</div>

</body>
</html>