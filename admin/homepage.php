<?php
session_start();
include "../connection.php";
if(!isset($_SESSION["username"])){
	header("Location:login.php");
}
if(isset($con,$_POST["btn-save-language"])){
	$ql = mysqli_query($con,"update table_homepage set language='".$_POST["language"]."'") or die("Can not update");
	
}

else if(isset($con,$_POST["btn-save-title"])){
	$ql = mysqli_query($con,"update table_homepage set title_en='".$_POST["title_en"]."',title_kh='".$_POST["title_kh"]."'") or die("Can not update");
	
}

else if(isset($con,$_POST["btn-save-home-menu"])){
	$ql = mysqli_query($con,"update table_homepage set home_menu_en='".$_POST["home_menu_en"]."',home_menu_kh='".$_POST["home_menu_kh"]."'") or die("Can not update");
	
}
else if(isset($con,$_POST["btn-save-welcome-title"])){
	$ql = mysqli_query($con,"update table_homepage set welcome_title_en='".mres($con,$_POST["welcome_title_en"])."',welcome_title_kh='".mres($con,$_POST["welcome_title_kh"])."'") or die("Can not update");
	
}

else if(isset($con,$_POST["btn-save-welcome-content"])){
	$ql = mysqli_query($con,"update table_homepage set welcome_content_en='".mres($con,$_POST["welcome_content_en"])."',welcome_content_kh='".mres($con,$_POST["welcome_content_kh"])."'") or die("Can not update");
	
}

else if(isset($con,$_POST["btn-save-footer"])){
	$ql = mysqli_query($con,"update table_homepage set footer_en='".$_POST["footer_en"]."',footer_kh='".$_POST["footer_kh"]."'") or die("Can not update");
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
    <h3 class="panel-title">Change Language</h3>
  </div>
  <div class="panel-body">
		<div class="form-group">
		<form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
		<label for="sel1">Choose Language :</label>
		<select class="form-control" id="sel1" name="language">
		
		<?php
		$qs = mysqli_query($con,"select language from table_homepage");
		$row=mysqli_fetch_array($qs,MYSQLI_NUM);
		if($row[0]=='en'){
		echo '<option value="en" selected> English</option>';
		echo '<option value="kh"> Khmer</option>';
		}
		else if($row[0]=='kh')
		{
		echo '<option value="en"> English</option>';
		echo '<option value="kh" selected> Khmer</option>';
		}
		?>
		
		</select>
		<div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-language" id="btn-login" class="btn btn-success kh" value="Save Language" />
                                
                                    </div>
                              </div></form>
		</div>
	 </div>	
	 </div>
	   
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Title Bar:</h3>
  </div>
  
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Title English</span>
                       <input id="login-password" type="text" class="form-control" name="title_en" value="" required>     
<span class="input-group-addon">					   
<?php
$qt =mysqli_query($con,"select title_en from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
echo $row[0];
?>      
</span>         </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Title Khmer</span>
                       <input name="title_kh" class="form-control" type="text" required/>
<span class="input-group-addon">
<?php
$qt =mysqli_query($con,"select title_kh from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
echo $row[0];
?>
</span>
                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-title" id="btn-login" class="btn btn-success kh" value="Save Title" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>

  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Change Home Menu:</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Home Menu English</span>
                       <input id="login-password" type="text" class="form-control" name="home_menu_en" value=""  required>     
<span class="input-group-addon">
<?php
$qt =mysqli_query($con,"select home_menu_en from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
echo $row[0];
?>
</span>       </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Home Menu Khmer</span>
                       <input name="home_menu_kh" class="form-control" type="text" required/>
<span class="input-group-addon">
<?php
$qt =mysqli_query($con,"select home_menu_kh from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
echo $row[0];
?>
</span>
                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-home-menu" id="btn-login" class="btn btn-success kh" value="Save Home Menu" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
 
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Footer :</h3>
	
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Footer English</span>
                        <input name="footer_en" class="form-control" type="text" required> 
<span class="input-group-addon">
<?php
$qt =mysqli_query($con,"select footer_en from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
echo $row[0];
?>
</span>       </div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Footer Khmer</span>
                       <input name="footer_kh" class="form-control" type="text" required>
<span class="input-group-addon">
<?php
$qt =mysqli_query($con,"select footer_kh from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
echo $row[0];
?>
</span>
                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save-footer" id="btn-login" class="btn btn-success kh" value="Save Footer" />
                        
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>
</div>

</body>
</html>