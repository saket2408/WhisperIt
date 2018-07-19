<?php
include "config.php";
 $date= date("Y-m-d H:i:s");
$sql=" insert into tweet set original_tweet_id={$_GET['tweet_id']} , retweet_user_id={$_SESSION['user_id']} , datetime='$date', is_rt= 1 , user_id={$_GET['user_id']}";
mysqli_query($con,$sql);
// echo $sql;
header("location:home.php");


?>