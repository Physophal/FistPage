 <div class="well well-lg" style="background-color:black; color:white; text-align: center;">

	 <a href="/" style="color:white;">
					   
<?php
			  $qt =mysqli_query($con,"select footer_".$_SESSION["lang"]." from table_homepage");
					$row=mysqli_fetch_array($qt,MYSQLI_NUM);
						echo $row[0];
			  ?>

</div>