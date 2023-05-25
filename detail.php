<?php
session_start();
include("connection.php");
if(!isset($_SESSION["lang"])){
$qt =mysqli_query($con,"select language from table_homepage");
$row=mysqli_fetch_array($qt,MYSQL_NUM);
$_SESSION["lang"]=$row[0];
}
?>
<?php
include "header.php";

?>

<div class="container">
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
	
      <?php
		
		include "slideshow.php";

		?>
 
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="panel panel-default col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:20px;">
<?php
  $qry = mysqli_query($con,"select * from table_product where product_id='".$_GET["pro"]."'");
   $row= mysqli_fetch_array($qry,MYSQLI_ASSOC);
echo '<img src="images/product/'.$row["product_image"].'" style="width:100%;" class="img-responsive"/>'
 ?>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:20px;">
<?php
$qry = mysqli_query($con,"select * from table_product where product_id='".$_GET["pro"]."'");
   $row= mysqli_fetch_array($qry,MYSQLI_ASSOC);
echo '<h3>'.$row["product_name_".$_SESSION["lang"]].'</h3>';
echo '<p>'.$row["product_description_".$_SESSION["lang"]].'</p>';
echo "<td ><button type='button' class='btn btn-danger'>$ <b>".
	  number_format($row["product_price"],2,".",",")
	  ."</td></button></b><br /><br />";
?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:20px;">
	
      <?php
		
		include "right_bar.php";

		?>
 
</div>
</div>
</div>

   <div class="col-lg-12 l-md-12 col-sm-12 col-xs-12">
   <div class="well well-lg" style="color:white; background-color:black;">
      <?php
		
		include "footer.php";

		?>
    </div>
	</div>

</div>
</body>
</html>