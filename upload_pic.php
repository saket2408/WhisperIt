<?php
include 'config.php';
$target_dir = "uploads/";
$myfile = $_FILES["image"];
$bio = $_POST["Bio"];

move_uploaded_file($myfile["tmp_name"], $target_dir. $myfile["name"]);

$sql="update user set profile_pic='http://localhost/twitter/uploads/{$myfile["name"]}' , bio='$bio' where email='{$_GET['email']}'";
mysqli_query($con,$sql);
header("location:login.php?registrationsuccess=1");
?>