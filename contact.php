<?php

include("connection.php");
if(!isset($_SESSION["lang"])){
$qt =mysqli_query($con,"select language from table_homepage");
$row=mysqli_fetch_array($qt,MYSQLI_NUM);
$_SESSION["lang"]=$row[0];
}
if(isset($_POST["btn-search"])){
	$text_search = $_POST["text_search"];
	header("location:product.php?start=1&search=".$text_search);
	
}
?>


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<div class="container">
  <div style="text-align:center">
    <h2><b style="color:maroon;"><h4>Contact Us</b></h4></h2>
    <b style="color:maroon;"><h4>Swing by for a cup of coffee, or leave us a message:</b></h4>
  </div>
  <div class="row">
    <div class="column">
	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.212618035079!2d104.98921661462987!3d11.536600191808452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109577df10dfb59%3A0x6f2d4c7d664e724d!2z4Z6F4Z684Z6b4Z6F4Z634Z6P4Z-S4Z6P4Z6A4Z624Z6g4Z-S4Z6c4Z-BL2Nob2xjaGV0Y2FmZQ!5e0!3m2!1sen!2skh!4v1615098355667!5m2!1sen!2skh" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
         </div>
    <div class="column">
      <form action="/action_page.php">
	  <label for="fname"><b style="color:maroon;"><p>Address : </b>  #18, St. 168, Sangkat Chak Ongre Krom, Khan Mean Chey, Phnom Penh.<p></label>
		 <!-- <label for="fname"><b style="color:maroon;"><p>Email : </b> sinean.leang@gmail.com</p></label> -->
	       
        <label for="lname"><b style="color:maroon;"><p>Tell : </b> (+855)95 332 223</p></label>
        
        <!-- <label for="country"><b style="color:maroon;"><p>Facebook Page: </b><a href="https://www.facebook.com/%E1%9E%85%E1%9E%BC%E1%9E%9B%E1%9E%85%E1%9E%B7%E1%9E%8F%E1%9F%92%E1%9E%8F%E1%9E%80%E1%9E%B6%E1%9E%A0%E1%9F%92%E1%9E%9C%E1%9F%81Chol-Chet-Cafe-962339533870614/?ref=page_internal">ចូលចិត្តកាហ្វេ/Chol Chet Cafe </a></label> -->
       
		<br /></p><label for="fname"><b style="color:maroon;"><p>Copyright </b></p></label><br />
        </select>
      
      </form>
    </div>
  </div>
</div>
</div>
</div>
<div class="container">
<div class="row">
 <div class="col-lg-12 l-md-12 col-sm-12 col-xs-12">
   <div class="well well-lg" style="color:maroon; background-color:black;">
      <?php
		
		include "footer.php";

		?>
    </div>
	</div>
	 </div>
	</div>