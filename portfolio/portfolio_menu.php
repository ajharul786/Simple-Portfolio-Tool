<?php
session_start();
?>
<html>
<head>
</head>
<body>
<div class="container">
    <div class="col-sm-12"> <center>
      <img src="images/logo.png" class="img-responsive" style="width:40%;" alt="Image"> </center>
    </div> </div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
 
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
	<center>
	
      <ul class="nav navbar-nav">
        <li><a href="user.php">Personal Details</a></li>
		<li><a href="upload_image.php">Profile Image</a></li>
        <li><a href="portfolio.php">Experience / Portfolio</a></li>
		<li><a href="social_links.php">Social Links</a></li>
		<li><a href="portfolio_view.php">Full View</a></li>
        <li><a href="index.php">Back To Home Page</a></li>
		<li><a href="logout.php">Logout</a></li>
      </ul>
	
    </div>
  </div>
</nav>


</body>
</html>


<?php 

?>
