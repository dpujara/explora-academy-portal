<?php
	session_start();
	$category=(isset($_POST['category']) && is_array($_POST['category'])) ? $_POST['category'] : array();
	$category= $category[0];
	$search=$_POST['searchv'];
	$_SESSION['categoryv']=$category;

	if($category=='all')
	{
		$_SESSION['searchv']="";
	}
	else
	{
		$_SESSION['searchv']=$search;
	}
	if($category=='lowfees')
	{
		if (!is_numeric($search))
		{
		    $_SESSION['searchv']="";
		    $_SESSION['invalidvalue']=1;
		}
	}



	echo "<script type='text/javascript'> window.location='view.php'</script>";		
?>