<?php
session_start();
if(!isset($_SESSION["username"])){
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="http://epagestore.com/img/icon5.png">
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
        <div class="col-lg-7 col-md-9 col-sm-9 col-xs-12">


<h1> Welcome To Admin</h1>


</div>

</body>
</html>