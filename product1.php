<?php

if(!isset($_SESSION["lang"])){
$qt =mysqli_query($con,"select language from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
$_SESSION["lang"]=$row[0];
}


?>
<?php
if(!isset($con,$_GET["page"])) {$page = 1;}
else {$page = $_GET["page"];}

if(isset($con,$_GET["cate"])){
$cate= $_GET["cate"];
   $qry = mysqli_query($con,"select category_name_".$_SESSION["lang"]." from table_category where category_id='".$_GET["cate"]."'");
   $row= mysqli_fetch_array($qry,MYSQLI_NUM);
   echo '<h3>'.$row[0]."</h3>";
   
}

   ?>

       <?php
		
      $q= mysqli_query($con,"select * from table_product order by product_id desc limit 0, 9" );
					
		echo'<div class="row">';
		 while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
	  echo'<div class="well well-lg col-lg-2 col-md-2 col-sm-2 col-xs-12 border=2" style=" background-color: white; text-align: center; color:maroon;​ ">';			
      echo "<tr>";
      echo "<td><img src='images/product/".$row["product_image"]."' width='100%'/></td><br /><br />";
      echo "<td><h4><b>".$row["product_name_".$_SESSION["lang"].""]."</td></h4></b><br />";
	  echo "<td ><button type='button' class='btn btn-danger'>$ <b>".
	  number_format($row["product_price_".$_SESSION["lang"].""],2,".",",")
	  ."</td></button></b><br /><br />";
	  echo "<td><p style=' word-break: break-all;'>".$row["product_description_".$_SESSION["lang"].""]."</p></td>";
	        
	  echo "</tr>";
	   echo '</div>';
      }
	  echo '</div>';
      ?>
	  
	   
	  
