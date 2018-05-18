<?php
include('include_db.php');

$fname=(isset($_POST['fname'])) ? trim($_POST['fname']) : '';
$mname=(isset($_POST['mname'])) ? trim($_POST['mname']) : '';
$sname=(isset($_POST['sname'])) ? trim($_POST['sname']) : '';
$formnumber=$_POST['form_number'];
$course=$_POST['courses'];
$area=$_POST['area'];
$phone=(isset($_POST['phno'])) ? trim($_POST['phno']) : '';
$dob=$_POST['dob'];
$regfee=(isset($_POST['regfee'])) ? trim($_POST['regfee']) : '';
$regdate=(isset($_POST['regdate'])) ? trim($_POST['regdate']) : '';
$aprilfee=(isset($_POST['aprilfee'])) ? trim($_POST['aprilfee']) : '';
$aprildate=(isset($_POST['aprildate'])) ? trim($_POST['aprildate']) : '';
$maydate=(isset($_POST['maydate'])) ? trim($_POST['maydate']) : '';
$mayfee=(isset($_POST['mayfee'])) ? trim($_POST['mayfee']) : '';
$email=(isset($_POST['email'])) ? trim($_POST['email']) : '';
$total_fees=(isset($_POST['tot'])) ? trim($_POST['tot']) : '';
$s_id=$_POST['s_id'];
$maydate=date('Y-m-d',strtotime($maydate));
 $dob=date('Y-m-d',strtotime($dob));
    $regdate=date('Y-m-d',strtotime($regdate));
    $aprildate=date('Y-m-d',strtotime($aprildate));
   

    if($aprilfee=='')
    $aprilfee=0;

    if($mayfee=='')
    $mayfee=0;    

    if($maydate=='1970-01-01')
    {
    $maydate=date('0000-00-00');
    }
    if($aprildate=='1970-01-01')
    {
    $aprildate=date('0000-00-00');
    }


if(!($_FILES['file_upload']['size'] > 2120000||$_FILES['file_upload']['size'] <=0 ))
{
	$file_name=$_FILES["file_upload"]["name"];
	$temp_name=$_FILES["file_upload"]["tmp_name"];
	$imagename=$_FILES["file_upload"]["name"];
	$target_path = "images/".$imagename;
}
else
{
	$sql="select img_path from registration where s_id=$s_id";
	$result=mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$target_path=$row['img_path'];
		$temp_name="";
	}
}
if(move_uploaded_file($temp_name, $target_path) || $target_path ) 
{
  if(isset($_POST['submit']))
	{
		$query = "UPDATE `registration` set `course`='$course',`first_name`='$fname',`middle_name`='$mname',`surname`='$sname',
		`address`='$area',`mobile_no`=$phone,`f_reg`=$regfee,`f_reg_date`='$regdate',`f_april`=$aprilfee,
		`f_april_date`='$aprildate',`f_may`=$mayfee,`f_may_date`='$maydate',`img_path`='$target_path',`dob`='$dob',`formnumber`='$formnumber',
		`total_fees`=$total_fees,`email`='$email' where `s_id`='$s_id'";

		$result=mysqli_query($con,$query);
		
		if($result>0)
		{
			echo "<script type='text/javascript'> window.location='edit.php'</script>"; 
		}
	}

	else
	{
		echo "<script type='text/javascript'>alert('error while uploading photo!!')</script>"; 
		echo "<script type='text/javascript'> window.location='edit.php'</script>"; 
	} 
}
?>