<?php
session_start();
	$category=(isset($_POST['category']) && is_array($_POST['category'])) ? $_POST['category'] : array();
	$category= $category[0];
	$search=$_POST['search'];
	$_SESSION['category']=$category;
	
	if($category=='all')
	{
	$_SESSION['search']="";
	}
	else
	{
	$_SESSION['search']=$search;
	}
	if($category=='lowfees')
	{
		if (!is_numeric($search))
		{
		    $_SESSION['search']="";
		    $_SESSION['invalidvalues']=1;
		}
	}
	echo "<script type='text/javascript'> window.location='edit.php'</script>";		
?>