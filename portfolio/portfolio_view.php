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
<h2 class="text-center">Portfolio View </h2>
 <?php 
 $user_id=$_SESSION["user_id"];
		
		$query="select * from user_details where user_id='$user_id'";
$run=mysqli_query($connection,$query);
$rows=mysqli_fetch_array($run);		
		?>
		<center>
		<img src="<?php echo $rows['image']; ?>" style="width:200px; height:200px; border:2px solid black;">
		<h5>First Name: <?php echo $rows['name']; ?></h5>
		<h5>Last Name: <?php echo $rows['last_name']; ?></h5>
		<h5>Email: <?php echo $rows['email']; ?></h5>
		<h5>Mobile Number: <?php echo $rows['mobile_number']; ?></h5>
		<h5>Address: <?php echo $rows['address']; ?></h5>
		
		</center>
<hr>

<h3>Experience/Portfolio: </h3>
<?php
$query="select * from experience where user_id='$user_id'";
$run=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($run)){	

?>

<h5>Title: <?php echo $rows['title']; ?></h5>
<h5>Description: <?php echo $rows['description']; ?></h5>

<?php } ?>


<hr>

<h3>Social Media Links: </h3>
<?php
$query="select * from social_media where user_id='$user_id'";
$run=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($run)){	

?>

<h5><a href="<?php echo $rows['llink']; ?>"><?php echo $rows['name']; ?></a></h5>
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
