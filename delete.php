<?php
session_start();
if(!empty($_SESSION['start']))
{
	include('include_db.php');
	$id=$_GET['idv'];
	$sql="DELETE FROM registration where s_id='$id'";
	$result2=mysqli_query($con,$sql);
	if($result2>0)
	{	
		echo "<script type='text/javascript'> window.location='edit.php'</script>"; 		
	}
}
else
{
	echo "<script type='text/javascript'> window.location='index.php'</script>"; 			
}
?>