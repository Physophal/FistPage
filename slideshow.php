<?php

include("connection.php");
if(!isset($_SESSION["lang"])){
$qt =mysqli_query($con,"select language from table_homepage");

}
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 well well-lg" style="padding:1px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
       <?php
             $qu = mysqli_query($con,"select * from table_slideshows");
             $count = mysqli_num_rows($qu);
             for($i=0;$i<$count;$i++){
             echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
             }
      ?>
    </ol>

    <!-- Wrapper for slides -->
     <div class="carousel-inner" role="listbox">
      <?php
	  $qi=mysqli_query($con,"select slide_name from table_slideshows order by slide_id desc");
	  $i=0;
	  while($row=mysqli_fetch_array($qi,MYSQLI_ASSOC)){
		  if($i==0){
			  echo '<div class="item active"><img src="images/slideshows/'.$row["slide_name"].'" width="100%"></div>';
		  }
		  else{
			  echo '<div class="item"><img src="images/slideshows/'.$row["slide_name"].'" width="100%"></div>';
		  }
		  $i++;
	
	  }
	  
	  
	  ?>
      </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
