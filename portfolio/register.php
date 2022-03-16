<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register </title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="style/style.css" />
 </head>
<body>

<?php
include("menu.php");
?>
<div class="container">
<br>
<div class="col-sm-3">
</div>
<div class="col-sm-5">
<h2 class="text-center">Register </h2>
 <?php 
		if(isset($_POST['register'])){
		$dbemail="";
		include("connection.php");
		$name1=$_POST['name'];
		$name=mysqli_real_escape_string($connection,$name1);
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password1=$_POST['password1'];
		$qury1="select * from user_details where email='$email'";
		$check=mysqli_query($connection, $qury1);
		$rowcount1=mysqli_num_rows($check);
if($rowcount1>0){
		$rows=mysqli_fetch_array($check);
		$dbemail=$rows['email'];
		}
		
		
		if($name==null || $lastname==null || $email==null || $password==null || $password1==null) echo "<h3 class='text-center'>Please Fill Full Form</h3>";
		else{
		if($dbemail==$email){echo"<h3 class='text-center'>This Email $email Already Registerd</h3>";}
		else {
		if($password1==$password){
		$fullpass=md5($password);
		$qury="insert into user_details (email,password,name,last_name) values ('$email','$fullpass','$name','$lastname')";
		$reg=mysqli_query($connection, $qury);
		if($reg) echo "<h3 class='text-center'>You Are Register</h3>";
		
		}else echo "<h3 class='text-center'>You Both Password is not matched</h3>";
		}

		}
		}
		?>

  <form class="form-horizontal" action="register.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lastname" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="password" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Re-Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="password1" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="register">Register</button>
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
