<?PHP
include '../config.php';
$qry="select * from followers where user_id={$_GET['user_id']} and follower={$_SESSION['user_id']}";
$result=mysqli_query($con,$qry);


if(mysqli_num_rows($result)==0)
{

$sql="insert into followers set user_id={$_GET['user_id']}, follower={$_SESSION['user_id']}";
mysqli_query($con,$sql);
header("location: http://localhost/twitter/feed/home.php?followed={$_GET['user_id']}");
}

else{

	header("location: http://localhost/twitter/feed/home.php?followed={$_GET['user_id']}");
}
?>