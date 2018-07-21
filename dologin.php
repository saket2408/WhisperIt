<?php
include "config.php";
   $name = $_POST["name"];
   $password = $_POST["password"];

   $sql= "select * from user where name= '$name' and password= '$password'";
   $result= mysqli_query($con, $sql);
   if(mysqli_num_rows($result)==1)
   {
   	session_start();
   	$row = mysqli_fetch_assoc($result);
   	$_SESSION["user_id"]=$row["user_id"];
   	header("location:feed/home.php");
   }

   else{

   		header("location:login.php?error=1");
   }
?>