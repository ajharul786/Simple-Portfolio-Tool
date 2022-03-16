<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Image </title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="style/style.css" />
 </head>
<body>

<?php
include("portfolio_menu.php");
include("connection.php");
?>
<div class="container">
<br>
<div class="col-sm-3">
</div>
<div class="col-sm-5">
<h2 class="text-center">Profile Image </h2>
 <?php 
 $user_id=$_SESSION["user_id"];

 
		if(isset($_POST['update'])){
	if(isset($_FILES['image']['name']))
$picname=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

$ext="jpg";
 $picpath="images/user/$user_id.$ext";
		$qury="update user_details set image='$picpath' where user_id='$user_id'";
		$update=mysqli_query($connection, $qury);
		if($update){ 
		move_uploaded_file($tmp,$picpath); 
		
		echo "<h5 class='text-center'>Image Updated</h5>"; }
		
		}	
		
		
			$query="select * from user_details where user_id='$user_id'";
$run=mysqli_query($connection,$query);
$rows=mysqli_fetch_array($run);	

		
		?>
		<center>
		<img src="<?php echo $rows['image']; ?>" style="width:350px; height:350px; border:2px solid black;">
		
		<br><br>
		  <form class="form-horizontal" action="upload_image.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Select Image:</label>
      <div class="col-sm-10">
          <input type="file" class="form-control" name="image">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="update">Update Image</button>
      </div>
    </div>
  </form>
	
</div>
</div>  
  
  
  
<br>
<?php
include("footer.php");
?>

</body>
</html>










<?php 

?>
