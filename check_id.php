<?php
include('include_db.php');
$myBookId=$_GET['myBookId']; 
$query="SELECT * FROM registration WHERE s_id = '$myBookId'";  
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0)	
$result1=mysqli_fetch_array($result);

echo $result1['formnumber'].'$';
echo $result1['course'].'$';
echo $result1['first_name'].'$';
echo $result1['middle_name'].'$';
echo $result1['surname'].'$';
echo $result1['mobile_no'].'$';
echo $result1['total_fees'].'$';
echo $result1['img_path'];
?>