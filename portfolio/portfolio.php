<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Portfolio </title>
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
<h2 class="text-center">Portfolio Details </h2>
 <?php 
 $user_id=$_SESSION["user_id"];
 
 	if(isset($_POST['add'])){
		
		$title=$_POST['title'];
		$description1=$_POST['description'];
$description=mysqli_real_escape_string($connection,$description1);
		$qury="insert into experience (user_id,title,description) values ('$user_id','$title','$description')";
		$update=mysqli_query($connection, $qury);
		if($update) echo "<h3 class='text-center'>Portfolio Added!</h3>";
		
		}
 
 
		if(isset($_POST['update'])){
		$id=$_POST['id'];
		$title=$_POST['title'];
		$description1=$_POST['description'];
$description=mysqli_real_escape_string($connection,$description1);
		$qury="update experience set title='$title', description='$description' where id='$id'";
		$update=mysqli_query($connection, $qury);
		if($update) echo "<h3 class='text-center'>Portfolio Updated</h3>";
		
		}	
		
				if(isset($_POST['delete'])){
		
		$id=$_POST['id'];
		
		$qury="delete from experience where id='$id'";
		$update=mysqli_query($connection, $qury);
		if($update) echo "<h3 class='text-center'>Portfolio Deleted</h3>";
		
		}
		
		?>
		
		
		
		  <form class="form-horizontal" action="portfolio.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Portfolio Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Description:</label>
      <div class="col-sm-10">
	  <textarea type="text"  rows="7" cols="50" name="description" required></textarea>

      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="add">Add Portfolio</button>
      </div>
    </div>
  </form>
		
		
		
		
		
		
<hr>
<br><br>	
<h2>Portfolio List</h2>	
		<?php
			
		$query="select * from experience where user_id='$user_id'";
$run=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($run)){
		
		?>
		
		  <form class="form-horizontal" action="portfolio.php" method="post">
		  <input type="hidden" value="<?php echo $rows['id']; ?>" name="id">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Portfolio Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" value="<?php echo $rows['title']; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Description:</label>
      <div class="col-sm-10">
	  <textarea type="text"  rows="7" cols="50" name="description" required><?php echo $rows['description']; ?></textarea>

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
