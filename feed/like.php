<?php
 include "../config.php";
$qry="select * from likes where tweet_id={$_GET['tweet_id']} and user_id={$_SESSION['user_id']}";
$result=mysqli_query($con,$qry);


if(mysqli_num_rows($result)==0)
{
$sql= "insert into likes set tweet_id={$_GET['tweet_id']} , user_id={$_SESSION['user_id']}";
mysqli_query($con,$sql);
header("location:home.php");
}

else
header("location:home.php");

?>