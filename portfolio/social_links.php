<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Social Media </title>
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
<h2 class="text-center">Social Media Links </h2>
 <?php 
 $user_id=$_SESSION["user_id"];
 
 	if(isset($_POST['add'])){
		
		$name=$_POST['name'];
		$link1=$_POST['link'];
$link=mysqli_real_escape_string($connection,$link1);
		$qury="insert into social_media (user_id,name,llink) values ('$user_id','$name','$link')";
		$update=mysqli_query($connection, $qury);
		if($update) echo "<h3 class='text-center'>Social Media Added!</h3>";
		
		}
 
 
		if(isset($_POST['update'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$link1=$_POST['link'];
$link=mysqli_real_escape_string($connection,$link1);
		$qury="update social_media set name='$name', llink='$link' where id='$id'";
		$update=mysqli_query($connection, $qury);
		if($update) echo "<h3 class='text-center'>Social Media Updated</h3>";
		
		}	
		
				if(isset($_POST['delete'])){
		
		$id=$_POST['id'];
		$qury="delete from social_media where id='$id'";
		$update=mysqli_query($connection, $qury);
		if($update) echo "<h3 class='text-center'>Social Media Deleted</h3>";
		
		}
		
		?>
		
		
		
		  <form class="form-horizontal" action="social_links.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Link:</label>
      <div class="col-sm-10">
	  <textarea type="text"  rows="3" cols="50" name="link" required></textarea>

      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="add">Add Social Media</button>
      </div>
    </div>
  </form>
		
		
		
		
		
		
<hr>
<br><br>	
<h2>Social Media List</h2>	
		<?php
			
		$query="select * from social_media where user_id='$user_id'";
$run=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($run)){
		
		?>
		
		  <form class="form-horizontal" action="social_links.php" method="post">
		  <input type="hidden" value="<?php echo $rows['id']; ?>" name="id">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" value="<?php echo $rows['name']; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Link:</label>
      <div class="col-sm-10">
	  <textarea type="text"  rows="3" cols="50" name="link" required><?php echo $rows['llink']; ?></textarea>

      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
		<button type="submit" class="btn btn-danger" name="delete">Delete</button>
      </div>
    </div>
  </form>

 
 
 <?php } ?>
 
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
