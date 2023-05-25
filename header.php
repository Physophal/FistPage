<?php

include("connection.php");
if(!isset($_SESSION["language"])){
$qt =mysqli_query($con,"select language from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
$_SESSION["language"]=$row[0];
}
if(isset($_POST["btn-search"])){
	$text_search = $_POST["text_search"];
	header("location:product.php?start=1&search=".$text_search);
	
}
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
					$qt =mysqli_query($con,"select title_".$_SESSION["language"]." from table_homepage");
					$row=mysqli_fetch_array($qt,MYSQLI_NUM);
					echo $row[0];
			?>
</title>
<style>
body {
	h1, h2, h3, h4, h5, h6,
  font-family: Arial, Helvetica, sans-serif ;
  font-family: "Lato", sans-serif;
	background-color: white;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  left: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: maroon;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  
}
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 100%;
  height: 100%;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: ;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: ;
}

</style>
</head>
<body>
<div class="well well-lg" style=" background-color: white;  margin-top: 0px;">

<div class="container" style="margin-top: 0px;">
    <div class="row">
   	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color: white; margin-top: 0px;">

<nav class="nav" style="margin-top: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:maroon; margin-left: 0px;"><span class="glyphicon glyphicon-phone" style="color:maroon; margin-left: 0px;"></span>
		<?php
				if($_SESSION["lang"]=="kh") echo "ទំនាក់ទំនង:";
				else echo "Call Us:";
				?>

	  </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#" style="color:maroon;">
		<?php
				if($_SESSION["lang"]=="kh") echo "(+855) 95 332 223";
				else echo "(+855)  95 332 223";
				?>
	  </a></li>
          </ul>
	<ul class="nav navbar-nav navbar-right" >
      <!-- <li><a href="#" style="color:maroon;"> 
		<?php
			//	if($_SESSION["lang"]=="kh") echo "គណនីរបស់ខ្ញុំ";
				//else echo "My Account";
				?> -->
	  <!-- </a></li> -->
      <li><a href="about.php" style="color:maroon;">
		<?php
				if($_SESSION["lang"]=="kh") echo "អំពីយើង";
				else echo "About Us";
				?>
	  </a></li>
	   <li><a href="contact.php" style="color:maroon;"> 
		<?php
				if($_SESSION["lang"]=="kh") echo "ទំនាក់ទំនងមកយើងខ្ញុំ";
				else echo " Contact Us";
				?>
	  </a></li>
    </ul>
  </div>
</nav>
 </div>
  </div>
   </div><hr style="height:1px;border-width:0;color:gray; background-color:maroon; margin-top: 0px;">
   <div class="container">
  <div class="row" style="background-color: white; color:maroon; margin-top: 0px;">
   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	   <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()" style="color:maroon;">&#9776;</span> -->

      <!-- <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color:maroon;">&times;</a>
  <a href="#"><span class="glyphicon glyphicon-home" style="color:maroon;"> Home</a>
  <a href="product.php"><span class="glyphicon glyphicon-shopping-cart" style="color:maroon;"> Products</a>
  <a href="about.php"><span class="glyphicon glyphicon-user" style="color:maroon;"> About Us</a>
  <a href="contact.php"><span class="glyphicon glyphicon-envelope" style="color:maroon;"  > Contact Us</a>
</div> -->
      
    </div>
	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	       <img src="images/logo/logo.png" class="img-rounded" alt="Cinque Terre" width="100px" height="70px"> 
    </div>

   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<ul class="nav navbar-nav"> 	
    <form class="navbar-form navbar-left" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <div class="input-group" style="width: 100%;">
    <!-- <input type="text" class="form-control" placeholder="Search"​​​ name="text_search" style="width: 100%;"> -->
    <!-- <div class="input-group-btn" >
      <button class="btn btn-default" type="submit" name="btn-search" style="background-color: maroon; color: white;">
        <i class="glyphicon glyphicon-search" ></i>
      </button>
    </div> -->
  </div>
</form>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="text-align: right"/>
      <h4 style="color:maroon;">
		<?php
				if($_SESSION["lang"]=="kh") echo "សូមស្វាគមន៍:";
				else echo "WELCOME GUEST!";
				?>

	  </h4>
	  <ul class="nav navbar-nav navbar-right" style="text-align: right"/>
      <li><a href="#" style="color:maroon;">
		<?php
				if($_SESSION["lang"]=="kh") echo "ភាសា :";
				else echo " Language :";
				?><span class="glyphicon glyphicon-flag" style="color:maroon; margin-left: 0px;"></span>
	 </a></li>
	   			
     <li> <ul class="nav navbar-nav">
			
			 <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe" style="color:maroon;"  ></span>
				<?php
				if($_SESSION["lang"]=="kh") echo "ខ្មែរ";
				else echo "English";
				?>
<span class="caret"></span></a>
              <ul class="dropdown-menu" id="custom">
            <li ><a href="change_language.php?lang=kh">ខ្មែរ</a></li>
            <li><a href="change_language.php?lang=en">English</a></li>
          </ul>
              </li>
		
	    </div>
  </div>
</div>
</div>

 </body>
</html>
