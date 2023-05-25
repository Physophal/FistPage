
<?php
session_start();
include "../connection.php";

$range = 4;
$divide="";
$cate="";
$page=0;
$msg="";


$msg="<span class='text-info'> * Please upload image with JPEG or PNG file only. </span>";
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

$product_id="";
$product_name_en="";
$product_name_kh="";
$product_description_en="";
$product_description_kh="";
$product_category="";
$product_order="";
$product_image="";
$product_price_kh="";
$product_price_en="";

function text_area($txt){
$txt = nl2br($txt);
$txt = stripcslashes($txt);
return $txt;	
}
function re_text_area($txt){
	$txt = str_replace('<br />',"",$txt);
	return $txt;
}

if(isset($con,$_POST["btn-save-product"])){
	
	if(!empty($_FILES["product_image"]["name"])){
		$file_name=$_FILES["product_image"]["name"];//test
		$temp_name = $_FILES["product_image"]["tmp_name"];//test
		$imgtype=$_FILES["product_image"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg_profile='<span class"text-danger">This file is not JPEG or PNG.</span>';
		}
		else{
			$imagename = date("Y-m-d_h-i-s").$ext;
			$target = '../images/product/'.$imagename;
			if(move_uploaded_file($temp_name, $target)){			
					
					$qry=mysqli_query($con,"insert into table_product values('','".$_POST["product_name_en"]."',
					'".$_POST["product_name_kh"]."','".text_area($_POST["product_description_en"])."',
					'".text_area($_POST["product_description_kh"])."','".$_POST["product_category"]."',
					'".$_POST["product_order"]."','".$imagename."',
					'".$_POST["product_price_kh"]."', '".$_POST["product_price_en"]."')");
					$msg="<span class='text-success'>Your image was upload successfully...</span>";
					
				}
				else{
					$msg="<span class='text-success'>Error uploading</span>";
					}
			}
	}
	}
	
else if(isset($con,$_POST["btn-edit-product"])){
	//test.jpg
	if(!empty($_FILES["product_image"]["name"])){
		$file_name=$_FILES["product_image"]["name"];//test
		$temp_name = $_FILES["product_image"]["tmp_name"];//test
		$imgtype=$_FILES["product_image"]["type"];  //image/jpeg
		$ext = GetImageExtension($imgtype);
		if($ext =='none'){
		$msg='<span class"text-danger">This file is not JPEG or PNG.</span>';
		}
		else{
			$imagename = date("Y-m-d_h-i-s").$ext;
			$target_path = '../images/product/'.$imagename;
			if(move_uploaded_file($temp_name,$target_path)){
				unlink("../images/product/".$_POST["pro_pic"]);
					$qu=mysqli_query($con,"update table_product set product_image='".$imagename."' where product_id='".$_POST["product_id"]."'");
					
				}
				else{
					$msg="<span class='text-success'>Error uploading</span>";
					}
			}
	}

	}

if(isset($con,$_GET["delete_id"])){
	$qd = mysqli_query($con,"delete from table_product where product_id='".$_GET["delete_id"]."'");
	unlink("../images/product/".$_GET["image"]);
}
else if(isset($con,$_GET["edit_id"])){
	$qd = mysqli_query($con,"select * from table_product where product_id='".$_GET["edit_id"]."'");
	$row=mysqli_fetch_array($qd,MYSQLI_NUM);
$product_id=$row[0];
$product_name_en=$row[1];
$product_name_kh=$row[2];
$product_description_en=re_text_area($row[3]);
$product_description_kh=re_text_area($row[4]);
$product_category=$row[5];
$product_order=$row[6];
$product_image=$row[7];
$product_price_kh=$row[8];
$product_price_en=$row[9];

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
         
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
       
        
         <?php
			include("left_menu.php");
		?>
        </div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
       <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Product Manager:</h3>
	<?php if ($msg!="") echo $msg ?>
  </div>
  <div class="panel-body">
   <form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" enctype="multipart/form-data">
   <input type="hidden" name="product_id" value='<?php echo $product_id; ?>' />
			   <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Product Name EN</span>
                       <input id="login-password" type="text" class="form-control" placeholder="Product Name in English" name="product_name_en" value='<?php echo $product_name_en; ?>'  required>        </div>

	<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Product Name KH</span>
                       <input name="product_name_kh" class="form-control" placeholder="Product Name in Khmer" type="text" value='<?php echo $product_name_kh; ?>' required/>
                   	   </div>
					   
	<div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Product Description EN:</span>
                       <textarea id="login-password" class="form-control" name="product_description_en"? text="re_text_area" required><?php echo $product_description_en; ?></textarea> 
					   </div>

	<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Product Description KH</span>
                       <textarea id="login-password" class="form-control" name="product_description_kh"  required><?php echo $product_description_kh; ?></textarea>
						</div>
						
						<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Product Category</span>
                       <select class="form-control" id="sel1" name="product_category">
					   <?php
					   $qry=mysqli_query($con,"select * from table_category");
					   while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
						   echo '<option value="'.$row["category_id"].'">'.$row["category_name_en"].'		('.$row["category_name_kh"].')'.'</option>';
					  
					   }
					   ?>
					   </select>
						</div>
			
	<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Product Order</span>
                       <input name="product_order" class="form-control" type="text" value='<?php echo $product_order; ?>' required/>
                   	   </div>
					   
	<div style="margin-bottom: 25px" class="input-group">
     		       	   <span class="input-group-addon">Product Image</span>
                            <input id="login-password" type="file" class="form-control" name="product_image" value="" placeholder="Select an Image" <?php if(!isset($_GET["edit_id"])) 
						   echo "required"; ?> 
					   <input type="hidden" name="pro_pic" value="<?php echo $product_image; ?>">
					   </div>
                       
			<div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Product Price KH</span>
                       <input id="login-password" type="text" class="form-control" placeholder="Product Price in English" name="product_price_kh" value='<?php echo $product_price_kh; ?>'  required>        
			</div>
				<div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon">Product Price EN</span>
                       <input id="login-password" type="text" class="form-control" placeholder="Product Price in English" name="product_price_en" value='<?php echo $product_price_en; ?>'  required>        
			</div>

			                          <input type="submit" name="btn-save-product" id="btn-login" class="btn btn-success kh" value="Add Product" />
									  
									  <input type="submit" name="btn-edit-product" id="btn-login" class="btn btn-success kh" value="Update Product" />
                       
                                    </div>
                                </div>

  </form>
  </div>
  </div>

  
   <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">All Product</div>
  <!-- Table -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Product Name</th>
		<th>Description</th>
		<th>Price KH</th>
		<th>Price EN</th>
		<th>Image</th>
        <th>Action</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
      $q= mysqli_query($con,"select * from table_product order by product_id desc");
      while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
      echo "<tr>";
      echo "<td>".$row["product_id"]."</td>";
      echo "<td>".$row["product_name_en"]."</td>";
	  echo "<td>".$row["product_description_en"]."</td>";
	  echo "<td>".$row["product_price_kh"]."</td>";
	  echo "<td>".$row["product_price_en"]."</td>";
	  echo "<td><img src='../images/product/".$row["product_image"]."' width='50px' height='30px'/></td>";
      echo "<td>
	  <a href='?delete_id=".$row["product_id"]."&image=".$row["product_image"]."' 
	  onclick=\"return confirm('Are you sure you want to Delete?');\">Delete</a> |
      <a href='?edit_id=".$row["product_id"]."'>Edit</a>
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