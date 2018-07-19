<?php
include "../config.php";
$sql="delete from tweet where tweet_id=".$_GET["tweet_id"];
mysqli_query($con,$sql);
header("location:home.php");

?>