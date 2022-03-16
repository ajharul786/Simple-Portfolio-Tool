<!DOCTYPE html>
<html lang="en">
<head>
  <title>User </title>
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
<h2 class="text-center">Personal Details </h2>
 <?php 
 $user_id=$_SESSION["user_id"];
		if(isset($_POST['update'])){
		
		$name=$_POST['name'];
		$lastname=$_POST['lastname'];
		$mobile_number=$_POST['mobile_number'];
		$address1=$_POST['address'];
$address=mysqli_real_escape_string($connection,$address1);
		$qury="update user_details set name='$name', last_name='$lastname', mobile_number='$mobile_number',address='$address' where user_id='$user_id'";
		$update=mysqli_query($connection, $qury);
		if($update) echo "<h3 class='text-center'>Details Updated</h3>";
		
		}
		
		
		$query="select * from user_details where user_id='$user_id'";
$run=mysqli_query($connection,$query);
$rows=mysqli_fetch_array($run);		
		?>

  <form class="form-horizontal" action="user.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" value="<?php echo $rows['name']; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lastname" value="<?php echo $rows['last_name']; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" value="<?php echo $rows['email']; ?>" disabled="disabled">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Mobile:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="mobile_number" value="<?php echo $rows['mobile_number']; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Address:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="address" value="<?php echo $rows['address']; ?>" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
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
