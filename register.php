<?php include "config.php"; 

  $name= $_POST["name"];
  $handle= $_POST["handle"];
  $email= $_POST["email"];
  $dob= $_POST["dob"];
  $password= $_POST["password"];
  $cpassword= $_POST["cpassword"];
  $security_ques= $_POST["security_question"];
  $security_ans= $_POST["answer"];

  if ($password==$cpassword) {
    $sql= "insert into user set name='$name', email='$email', password='$password' , handle='$handle' , dob='$dob', security_ques='$security_ques', security_ans='$security_ans' ";
    echo $sql;
    if(mysqli_query($con , $sql)) {

    header("location: profile_pic.php?email=$email");
  }
  else {
    echo mysqli_error($con);
  }
  }

  else
  {
     header("location: index.php?error=1");
  }

 
?>