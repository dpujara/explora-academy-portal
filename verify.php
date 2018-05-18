<?php
session_start();
include('include_db.php');
if(isset($_POST['adminUname']) && isset($_POST['adminPass']))
{	
	$uname = mysqli_real_escape_string($con,$_POST['adminUname']);
	$upass = mysqli_real_escape_string($con,$_POST['adminPass']);
	$sql="SELECT * from login where username='$uname' AND password='$upass'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result))
	{
		$_SESSION['start']=1;
		echo "<script type='text/javascript'> window.location='welcome.php'</script>";		
	}
	else
	{
		$_SESSION['failed'] = "Invalid Username or Password";
		echo "<script type='text/javascript'> window.location='index.php'</script>";			
	}					
}
?>
