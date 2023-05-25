<?php
session_start();
if(!isset($_SESSION["username"])){
	header("Location:login.php");
}
include("../connection.php");
$msg="<span class='text-info'>* Please upload image with JPEG or PNG file only. </span>";
function GetImageExtension($imagetype){
	if(empty($imagetype)) return 'none';
	switch($imagetype){
		case 'image/jpeg' : 
			return '.jpg';break;
		case 'image/png' : 
			return '.png';break;
		default:return 'none';
		}
	}

if(isset($_POST["btn-save"])){
	//test.jpg
	if(!empty($_FILES["image_slide"]["name"])){
		$file_name=$_FILES["image_slide"]["name"];//test
		$temp_name = $_FILES["image_slide"]["tmp_name"];//test
		$imgtype=$_FILES["image_slide"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg='<span class"text-danger">This file is not JPEG or PNG.</span>';
		}
		else{
			$imagename = date("Y-m-d_h-i-s").$ext;
			$target = '../images/slideshows/'.$imagename;
			if(move_uploaded_file($temp_name,$target)){
					$qr=mysqli_query($con,"insert into table_slideshows values('','".$imagename."')");
					$msg="<span class='text-success'>Your image was upload successfully...</span>";
					
				}
				else{
					$msg="<span class='text-success'>Error uploading</span>";
					}
			}
	}
	}

if(isset($_GET["name"])){
	$qd = mysqli_query($con,"delete from table_slideshows where slide_name='".$_GET["name"]."'");
	if($qd){
		unlink("../images/slideshows/".$_GET["name"]);
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="http://epagestore.com/img/icon5.png">
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

       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Slideshow Manager</h3>
  </div>
  <div class="panel-body">
    <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" enctype="multipart/form-data">
			   <div style="margin-bottom: 25px" class="input-group">
                     
                       <input id="login-password" type="file" class="form-control" name="image_slide" value="" placeholder="Select an Image" required>     </div> <?php echo $msg; ?>
                       <div style="margin-top:10px" class="form-group">
                       <div class="col-sm-12 ">
                                      <input type="submit" name="btn-save" id="btn-login" class="btn btn-success kh" value="Add" />
                                
                                    </div>
                                </div>

  </form>
  </div>
  </div>
  
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">All Slideshow Images</div>
  <!-- Table -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Image name</th>
        <th>Image View</th>
        <th>Action</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
      $q= mysqli_query($con,"select * from table_slideshows");
      while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
      echo "<tr>";
      echo "<td>".$row["slide_id"]."</td>";
      echo "<td>".$row["slide_name"]."</td>";
	  echo "<td><img src='../images/slideshows/".$row["slide_name"]."' width='50px' height='30px'/></td>";
      echo "<td><a href='?name=".$row["slide_name"]."' onclick=\"return confirm('Are you sure you want to Delete?');\">Delete</a></td>";
      echo "</tr>";
      }
      ?>
      
    </tbody>
  </table>

  
</div>
            
        </div>
        
        
  
  

</div>

</body>
</html>