<?php
 include "../config.php";
 $user_id= $_SESSION["user_id"];
 $tweet= $_POST["tweet"];
 $date= date("Y-m-d H:i:s");
 $sql="insert into tweet set  user_id= $user_id , text='$tweet' , datetime= '$date'";
 mysqli_query($con, $sql);
 header("location:home.php?upload=1");
?>