<?php
session_start();
include("connection.php");
if(!isset($_SESSION["lang"])){
$qt =mysqli_query($con,"select language from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
$_SESSION["lang"]=$row[0];
}

$range = 4;
$divide="";
$cate="";
$page=0;
$search="";
$start="";
//$_SESSION['search']="search=".$_GET["search"];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="http://epagestore.com/img/icon5.png">
  <script src="js/jquery-1.12.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style type="text/css">

<title>
<?php
					$qt =mysqli_query($con,"select title_".$_SESSION["lang"]." from table_homepage");
					$row=mysqli_fetch_array($qt,MYSQLI_NUM);
					echo $row[0];
			?>
</title>

</head>
<body style=" background-color: silver;">
 	<?php

		include "header.php";
		?>
	<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php
		
		include ("slideshow.php");
		
	?>
	
</div>
   </div>
   </div>
   <div class="container">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
     <?php
		
		include ("product.php");
		
	?>
    </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
       <?php
		
		include ("right_bar.php");
		
	?>
    </div>
 
  </div>
</div>
   	<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <?php
		
		include ("product1.php");
		
	?>
	
</div>
   </div>
   </div>
   	<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <?php
		
		include ("footer.php");
		
	?>
	
</div>
   </div>
   </div>
</body>
</html>