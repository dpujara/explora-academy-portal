<?php
session_start();
  include('include_db.php');
  $userid=$_POST['userid'];
  $oldpassword=$_POST['oldpass'];
  $newpassword=$_POST['newpass'];
  $_SESSION['pass']="password";
  $sql1="select password from login where password='$oldpassword' AND username='$userid'";
  $result=mysqli_query($con,$sql1);
  if(mysqli_num_rows($result)>0)
  {
    if($newpassword==$oldpassword)
    {
      $_SESSION['invalidpass']="new password cant be same as old one";
      echo "<script type='text/javascript'> window.location='welcome.php'</script>"; 
    }
    else
    {
      $sql="update `login` set `password`='$newpassword' where `password`='$oldpassword'";
      $rs_result = mysqli_query($con,$sql); 
      $_SESSION['validpass']="password changed successfully"; 
      echo "<script type='text/javascript'> window.location='welcome.php'</script>"; 
    }
  }
  else
  {
    $_SESSION['invalidoldpass']="invalid password"; 
    echo "<script type='text/javascript'> window.location='welcome.php'</script>"; 
  }
?>