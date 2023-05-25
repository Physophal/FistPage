<?php

include("connection.php");
if(!isset($_SESSION["lang"])){
$qt =mysqli_query($con,"select language from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
$_SESSION["lang"]=$row[0];
}
?>
<div class="container">
    <div class="row">
      <div class="col-lg-3 l-md-3 col-sm-3 col-xs-12">

 <div class="panel panel-danger" >
  <!-- Default panel contents -->
  <div class="panel-heading" style="color:maroon; text-align: center"><h4><b> <?php
				if($_SESSION["lang"]=="kh") echo "មុឺនុយ";
				else echo "MENU";
				?> </b></h5></div>
  <!-- Table -->
  <table class="table table-hover">
    <thead>
      <tr style="color:maroon;"​​>
	  <th>
				<?php
				if($_SESSION["lang"]=="kh") echo "លេខ";
				else echo "ID";
				?>

              </th>
		
         <th>
				<?php
				if($_SESSION["lang"]=="kh") echo "ឈ្មោះ";
				else echo "Name";
				?>

              </th>
			  <th>
				<?php
				if($_SESSION["lang"]=="kh") echo "តម្លៃ";
				else echo "Price";
				?>

              </th>
	             
      </tr>
    </thead>
    <tbody>
	
      <?php
      $qr= mysqli_query($con,"select * from table_product");
      while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC)){	
	 echo '<tr style="color:maroon;"​​>';
   	  echo "<td>".$row["product_order"]."</td>";
  	  echo "<td>".$row["product_name_".$_SESSION["lang"].""]."</td>";
	  echo "<td><b><button type='button' class='btn btn-primary'>$ ".number_format($row["product_price_".$_SESSION["lang"].""],2,".",",")."</td></button></b>";
	  
	
    
      }
      ?>
    </tbody>
  </table>
  
</div>

   </div>
   
    </div>
	 </div>

