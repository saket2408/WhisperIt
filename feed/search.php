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
	
	<form method="post" action="search.php" >
  <div class="input-group search">
    <input type="text" class="form-control" value="<?php echo $_POST['search'];?>" name="search">
    <div class="input-group-btn">
      <button class="btn btn-info" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form><br><br><br>
<hr>





<?php

echo '<h3> results for  "'.$_POST["search"]. '"<hr>';

echo "<h3><b> People:</b></h3>";

$sql2="select * from user where name like '%{$_POST["search"]}%'";
$result2= mysqli_query($con,$sql2);
$count2= mysqli_num_rows($result2);
    if($count2==0){
    	echo '<h2 style="color:#9fa1a5 ;" >--no user found--</h2>';
    }


    else{
    while($row2=mysqli_fetch_assoc($result2))
    {

    	echo '<div class="panel panel-default">
  <div class="panel-body"><div>';

		 if($row2['profile_pic']==null)
			{
		echo '<img class="tweet_pic" src="../uploads/defaultuser.jpg" ></div>';
			}

		else{
		echo '<img class="tweet_pic" src="'.$row2["profile_pic"].  ' "></div>';	}

  echo '<div class="tweet_name">
<h3 ><a href="#" id="anchor">'.$row2["name"].'</a></h3>
<h6 style="color:#9fa1a5;">'.$row2["handle"].'</h6>
</div>
<div class="follower">';

$sql="select * from followers where user_id={$row2['user_id']} and follower={$_SESSION['user_id']} ";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==1){
  echo '<a href="../profile/unfollow.php?user_id='.$row2["user_id"].'" class="btn btn-success">unfollow</a></div>';
}
else{

echo '<a href="../profile/follow.php?user_id='.$row2["user_id"].'" class="btn btn-success">follow</a></div>';
}
 echo  '</div>
</div>';

}

}




echo '</h3><br><hr><h3> <b>Posts:</b></h3>';

$sql= "select * from tweet where text like '%".$_POST["search"]."%' order by datetime desc";
    $result= mysqli_query($con,$sql);
    $count= mysqli_num_rows($result);
    if($count==0){
    	echo '<h2 style="color:#9fa1a5 ;" >--no post found--</h2>';
    }

    else{
    while($row=mysqli_fetch_assoc($result)){


	$qry="select * from user where user_id= ".$row['user_id'];
    	$result1=mysqli_query($con, $qry);
    	$row1=mysqli_fetch_assoc($result1);

 	echo '	<div class="panel panel-default">
  					<div class="panel-heading">
  						<div>';

   		 if($row1['profile_pic']==null)
	{
		echo '<img class="tweet_pic" src="../uploads/defaultuser.jpg" >';
			}

		else
		echo '<img class="tweet_pic" src="'.$row1["profile_pic"].  ' ">';


   		 echo '</div>
   				<div class="tweet_name">
   				 <h6 class="tweet_by">Posted By:</h6><a href="#" id="anchor">'.$row1['name'].'</a></div>
   				<div class="date">'.$row["datetime"].
    			'</div>
  				</div>
  				<div class="panel-body">'.nl2br($row["text"]).'</div> 
  				<div class="panel-footer">
  				  <a href="like.php?tweet_id='.$row["tweet_id"].'" class="btn btn-info"  id="likes"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>&nbsp;';

  			$qry2="select * from likes where tweet_id={$row["tweet_id"]}";
            $result2=mysqli_query($con,$qry2);
            $count=mysqli_num_rows($result2);
             echo '<a href="showlike.php?tweet_id='.$row["tweet_id"].'">'.  $count .' people liked this</a>';


  		 echo '
  				   &ensp;
  				   <a href="retweet.php" class=" btn btn-default retweet"><span class="glyphicon glyphicon-retweet"></span>  Repost</a>';

 
  				if($_SESSION["user_id"]==$row["user_id"])
  				{
  					echo '&ensp;
  					<a href="delete.php?tweet_id='.$row["tweet_id"].'" class=" btn btn-danger delete"><span class="glyphicon glyphicon-trash"></span>  Delete</a>';
  				}

  				echo '</div>
				</div> <hr>';}}
?>



<?php include "../footer.php";?>