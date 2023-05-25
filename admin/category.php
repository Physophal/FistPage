<?php
session_start();
include "../connection.php";
if(!isset($_SESSION["username"])){
	header("Location:login.php");
}
$category_id="";
$category_name_en="";
$category_name_kh="";
$category_order="";
$category_price="";
if(isset($con,$_POST["btn-save-category"])){
	
	$category_name_en= $_POST["category_name_en"];
	$category_name_kh = $_POST["category_name_kh"];
	$category_order = $_POST["category_order"];
	$category_price = $_POST["category_price"];
	$qry=mysqli_query($con,"insert into table_category values('','".$category_name_en."','".$category_name_kh."','".$category_order."','".$category_price."')") 
	or die("can not insert to table category");
	
}
else if(isset($con,$_GET["delete_id"])){
	$qry=mysqli_query($con,"delete from table_category where category_id='".$_GET["delete_id"]."'") or die("can not delete category");
	
}
else if(isset($con,$_GET["edit_id"])){
		$qry=mysqli_query($con,"select * from table_category where category_id='".$_GET["edit_id"]."'");
		while($row=mysqli_fetch_array($qry,MYSQLI_NUM)){
			$category_id=$row["0"];
			$category_name_en=$row["1"];
			$category_name_kh=$row["2"];
			$category_order=$row["3"];
			$category_price=$row["4"];
			
		}
	
}
else if (isset($con,$_POST["btn-edit-category"])){
	$qry=mysqli_query($con,"update table_category set category_name_en='".$_POST["category_name_en"]."',category_name_kh='".$_POST["category_name_kh"]."',
	category_order='".$_POST["category_order"]."',category_price='".$_POST["category_price"]."', where 
	category_id='".$_POST["category_id"]."'
	");
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
	   include ("left_menu.php");
        ?>
        
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
         <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Category Manager</h3>
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
   <input type="hidden" name="category_id" value='<?php echo $category_id;?>'/>
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Category Name EN</span>
                       <input id="login-password" type="text" class="form-control" name="category_name_en" value='<?php echo $category_name_en;?>' required ></div>

<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Category Name Kh</span>
                       <input name="category_name_kh" class="form-control" type="text" required value='<?php echo $category_name_kh;?>'/>
                   	   </div>
					   <div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Category Order</span>
                       <input name="category_order" class="form-control" type="text" required value='<?php echo $category_order;?>'/>
                   	   </div>
					    <div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Category Price</span>
                       <input name="category_price" class="form-control" type="text" required value='<?php echo $category_price;?>'/>
                   	   </div>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                    <input type="submit" name="btn-save-category" id="btn-login" class="btn btn-success kh" value="Save Category" />
					<input type="submit" name="btn-edit-category" id="btn-login" class="btn btn-success kh" value="Update Category" />
					
                                    </div>
                                </div>

  </form>
  </div>
</div>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">All Categories</div>
  <!-- Table -->
  <table class="table table-hover">
    <thead>
      <tr>
        
        <th>Category Name En</th>
		<th>Category Name KH</th>
        <th>Category Order</th>
		<th>Category Price</th>
        <th>Action</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
      $qr= mysqli_query($con,"select * from table_category");
      while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC)){
      echo "<tr>";
      //echo "<td>".$row["category _id"]."</td>";
      echo "<td>".$row["category_name_en"]."</td>";
	  echo "<td>".$row["category_name_kh"]."</td>";
	  echo "<td>".$row["category_order"]."</td>";
	  echo "<td>".$row["category_price"]."</td>";
      echo "<td>
	  <a href='?delete_id=".$row["category_id"]."' onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a> | 
	  <a href='?edit_id=".$row["category_id"]."'>Edit</a>
	  </td>";
      echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  
</div>
</div>
</body>
</html>