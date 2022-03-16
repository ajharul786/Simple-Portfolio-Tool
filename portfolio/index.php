<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome </title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="style/style.css" />
 </head>
<body>
<?php
include("menu.php");
include("connection.php");
?>


<?php
$query="select * from user_details order by user_id desc";
$run=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($run)){
$user_id=$rows['user_id'];
?>

    <br>
	<div class="container" style="border:2px solid black;">
	<div class="row">
	<div class="col-sm-3">
	<img src="<?php echo $rows['image']; ?>" style="width:200px; height:200px; border:2px solid black;">
	
</div>
<div class="col-sm-3">
<h3>Personal Details</h3>
<h5>First Name: <?php echo $rows['name']; ?></h5>
		<h5>Last Name: <?php echo $rows['last_name']; ?></h5>
		<h5>Email: <?php echo $rows['email']; ?></h5>
		<h5>Mobile Number: <?php echo $rows['mobile_number']; ?></h5>
		<h5>Address: <?php echo $rows['address']; ?></h5>


</div>
	
	<div class="col-sm-6">
	<h3>Portfolio</h3>
	<?php
$query1="select * from experience where user_id='$user_id'";
$run1=mysqli_query($connection,$query1);
while($rows1=mysqli_fetch_array($run1)){
$user_id=$rows1['user_id'];
?>
	<h5>Title: <?php echo $rows1['title']; ?></h5>
<h5>Description: <?php echo $rows1['description']; ?></h5>

<?php } ?>	
<h3>Social Media Links</h3>	
<?php
$query2="select * from social_media where user_id='$user_id'";
$run2=mysqli_query($connection,$query2);
while($rows2=mysqli_fetch_array($run2)){	

?>

<h5><a href="<?php echo $rows2['llink']; ?>"><?php echo $rows2['name']; ?></a></h5>
<?php } ?>	
	
	
	
	
	
	</div>
	
	
	
	</div>
	</div>
	
	<?php } ?>
	

<br>
<?php
include("footer.php");
?>

</body>
</html>