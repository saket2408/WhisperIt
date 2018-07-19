<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>WhisperIt</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>  

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="http:\\localhost\twitter\css\style.css">
</head>
<body>


	<nav class="navbar navbar-inverse  navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="<?php echo $SITE_URL; ?>">WhisperIt</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="<?php echo $SITE_URL; ?>">Home</a></li>
	        <li><a href="#">About</a></li>
	        <li><a href="#">Contact</a></li> 
	      </ul>
	      <ul class="nav navbar-nav navbar-right">

	      	<?php
			if (!isset($_SESSION['user_id'])){
	        echo '<li><a href="'.$SITE_URL.'"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
	    }
?>

	        <?php
if (isset($_SESSION['user_id'])) {
	echo   '<li><a href="'.$SITE_URL.'logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
}

else{
	echo '<li><a href=" '.$SITE_URL.'login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
}
	        ?>
	       

	      </ul>
	    </div>
	  </div>
	</nav>

	<div >