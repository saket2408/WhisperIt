<?php
include "../header.php";?>
<script src="..\js\script.js"></script>

<?php
$sql= "select * from user where user_id= {$_SESSION['user_id']}";
$result= mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$date1 = date('d-m-Y', strtotime($row['dob']));
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
	<?php echo "<br><b>Bio:   </b>". $row['bio']."<br><br> <b>Date Of Birth:  </b>". $date1 ;?>
</div>
<div class="col-xs-3 "></div>
<div class="col-xs-9 tweet_block">
	<form method="post" action="search.php" >
  <div class="input-group search">
    <input type="text" class="form-control" name="search" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-info" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form><br><br><br>

<?php
if(isset($_GET['followed'])){
  $sql="select * from user where user_id=".$_GET['followed'];
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  echo '<h3>you started following "'.$row['name'].' "</h3><br><br>';
}

if(isset($_GET['unfollowed'])){
  $sql="select * from user where user_id=".$_GET['unfollowed'];
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  echo '<h3>you unfollowed "'.$row['name'].' "</h3><br><br>';
}

?>

	<form method="post" action="savetweet.php">
		<div class="form-group">
  			<textarea class="form-control type" rows="5" name="tweet" placeholder="hi, say something!!"></textarea>
		</div>
		<button type="submit" class="btn btn-info">POST</button>
	</form> 
	<hr>
     <h3>Recent Posts:</h3>
	<br> 
	<br>
	<?php
    $sql= "select * from tweet where user_id in (select user_id from followers where follower=".$_SESSION['user_id']." union select ".$_SESSION['user_id'].") union select * from tweet where retweet_user_id in (select user_id from followers where follower=".$_SESSION['user_id']." union select ".$_SESSION['user_id'].") order by datetime desc";
    $result= mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){

    	$qry= "select * from user where user_id= ".$row['user_id'];
    	$result1= mysqli_query($con, $qry);
    	$row1= mysqli_fetch_assoc($result1);
    	$date = date('d-m-Y h:i:s a', strtotime($row['datetime']));

    	if ($row['is_rt']==1){

    		$sql2="select * from user where user_id=".$row["retweet_user_id"];
    		$result3= mysqli_query($con,$sql2);
    		$row3= mysqli_fetch_assoc($result3);
    		echo '<div class="well well-sm well1">';
    		echo '<span class="glyphicon glyphicon-retweet"></span> Repost by: <a href="#" id="anchor">'.$row3['name'];
  			echo		'</a></div>
					';

    	}




    	echo '	<div class="panel panel-default">
  					<div class="panel-heading">
  						<div>';

   		 if($row1['profile_pic']==null)
	{
		echo '<img class="tweet_pic" src="../uploads/defaultuser.jpg" >';
			}

		else{
		echo '<img class="tweet_pic" src="'.$row1["profile_pic"].  ' ">';}


   		 echo '</div>
   				<div class="tweet_name">
   				 <h6 class="tweet_by">Posted By:</h6><a href="#" id="anchor">'.$row1['name'].'</a></div>
   				<div class="date">'.$date.
    			'</div>
  				</div>
  				<div class="panel-body">';

        if ($row['is_rt']==1){
        	$sql4= "select * from tweet where tweet_id=". $row['Original_tweet_id'];
        	$result4 = mysqli_query($con,$sql4);
        	$row4= mysqli_fetch_assoc($result4);
        	echo nl2br($row4["text"]);
        	}

        else{


  				echo nl2br($row["text"]);

        }
  			echo '</div> 
  				<div class="panel-footer">
  				  <a href="like.php?tweet_id='.$row["tweet_id"].'" class="btn btn-info"  id="likes"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>&nbsp;';

  			$qry2="select * from likes where tweet_id={$row["tweet_id"]}";
            $result2=mysqli_query($con,$qry2);
            $count=mysqli_num_rows($result2);
             echo '<a href="showlike.php?tweet_id='.$row["tweet_id"].'">'.  $count .' people liked this</a>';


  		 echo '
  				   &ensp;';

  				  if ($row['is_rt']!=1){

  				 echo'  <a href="retweet.php?tweet_id='.$row["tweet_id"].'&user_id='.$row['user_id'].'" class=" btn btn-default retweet"><span class="glyphicon glyphicon-retweet"></span>  Repost</a>';
}
  				if(($_SESSION["user_id"]==$row["user_id"])||($_SESSION["user_id"]==$row["retweet_user_id"]))
  				{
  					echo '&ensp;
  					<a href="delete.php?tweet_id='.$row["tweet_id"].'" class=" btn btn-danger delete"><span class="glyphicon glyphicon-trash"></span>  Delete</a>';
  				}

  				echo '</div>
				</div> <hr>';
    }
	?>

<?php 
include "../footer.php";
?>


