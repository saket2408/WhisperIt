<?PHP
include '../config.php';
$qry="delete from followers where user_id={$_GET['user_id']} and follower={$_SESSION['user_id']}";
mysqli_query($con,$qry);
header("location:../feed/home.php?unfollowed={$_GET['user_id']}");