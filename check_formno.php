<?php
include('include_db.php');
$FormNumber=$_GET['FormNumber'];  
$query="SELECT * FROM registration WHERE formnumber = '$FormNumber'";  
$result=mysqli_query($con,$query);  
if(mysqli_num_rows($result) > 0)
{    
	echo 1;  
}
else
{     
	echo 0;  
}  
?>