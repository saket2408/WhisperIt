 <?php  
 include "../header.php";
?>
<?php
$sql= "select * from user where user_id= {$_SESSION['user_id']}";
$result= mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="col-xs-3 profile">
	<?php
	if($row['profile_pic']==null)
	{
		echo '<img class="image" src="../uploads/defaultuser.jpg"  width="250" height="250">';
	}
	else
		echo '<img class="image" src="'.$row["profile_pic"].  '" width="250" height="250" >';
	?>

	<h1 align="center" style="font-size:3vw;"><a href="#" id="anchor"><?php echo $row['name'];?></a></h1>
	<h4 align="center" style="color: #9fa1a5; font-size:2vw; "><?php echo $row['handle'];?></h4>
	<?php echo "<br><b>Bio:   </b>". $row['bio']."<br><br> <b>Date Of Birth:  </b>". $row['dob'] ;?>
</div>
<div class="col-xs-3 "></div>
<div class="col-xs-9 tweet_block">
	<a href="home.php" class="btn btn-info back">back</a>
	<br><br>
	
<h2>People who liked your post:</h2><br><br>

<?php
  $qry="select * from likes where tweet_id={$_GET['tweet_id']} ";
  $result1=mysqli_query($con,$qry);
  while($row1=mysqli_fetch_assoc($result1))
  {
  	$qry1="select * from user where user_id= ".$row1['user_id'];
    	$result2=mysqli_query($con, $qry1);
    	$row2=mysqli_fetch_assoc($result2);

    	echo '<div class="panel panel-default">
  <div class="panel-body"><div>';

		 if($row2['profile_pic']==null)
	{
		echo '<img class="tweet_pic" src="../uploads/defaultuser.jpg" >';
			}

		else
		echo '<img class="tweet_pic" src="'.$row2["profile_pic"].  ' "></div>';	
  echo '<div class="tweet_name">
<h3 ><a href="#" id="anchor">'.$row2["name"].'</a></h3>
<h6 style="color:#9fa1a5;">'.$row2["handle"].'</h6>
</div>
  </div>
</div>';
  }
?>




<?php include "../footer.php";?>
