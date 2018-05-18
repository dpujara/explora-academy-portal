<?php
session_start();
include 'include_db.php';
    $username=(isset($_POST['username'])) ? trim($_POST['username']) : '';
    $fname=(isset($_POST['fname'])) ? trim($_POST['fname']) : '';
    $mname=(isset($_POST['mname'])) ? trim($_POST['mname']) : '';
    $sname=(isset($_POST['sname'])) ? trim($_POST['sname']) : '';
    $courses=(isset($_POST['courses']) && is_array($_POST['courses'])) ? $_POST['courses'] : array();
    $course=$courses[0];
    $area=$_POST['area'];
    $phone=(isset($_POST['phno'])) ? trim($_POST['phno']) : '';
    $dob=$_POST['dob'];
    $regfee=(isset($_POST['regfee'])) ? trim($_POST['regfee']) : '';
    $regdate=(isset($_POST['regdate'])) ? trim($_POST['regdate']) : '';
    $aprilfee=(isset($_POST['aprilfee'])) ? trim($_POST['aprilfee']) : '';
    $aprildate=(isset($_POST['aprildate'])) ? trim($_POST['aprildate']) : '';
    $maydate=(isset($_POST['maydate'])) ? trim($_POST['maydate']) : '';
    $mayfee=(isset($_POST['mayfee'])) ? trim($_POST['mayfee']) : '';
    $formNumber = (isset($_POST['form_number'])) ? trim($_POST['form_number']) : '';
    $total_fees= (isset($_POST['tot'])) ? trim($_POST['tot']) : '';
    $dob=date('Y-m-d',strtotime($dob));
    $regdate=date('Y-m-d',strtotime($regdate));
    $aprildate=date('Y-m-d',strtotime($aprildate));
    $email=(isset($_POST['email'])) ? trim($_POST['email']) : '';
    $maydate=date('Y-m-d',strtotime($maydate));

    if($aprilfee=='')
    $aprilfee=0;

    if($mayfee=='')
    $mayfee=0;    

    if($maydate=='1970-01-01')
    {
    $maydate=date('00-00-0000');
    }
    if($aprildate=='1970-01-01')
    {
    $aprildate=date('00-00-0000');
    }

    if($_FILES["file_upload"]["size"] >= 2120000) 
    {
        die();
    }
    else
    {
        $imageData = @getimagesize($_FILES["file_upload"]["tmp_name"]);
        if($imageData === FALSE || !($imageData[2] == IMAGETYPE_GIF || $imageData[2] == IMAGETYPE_JPEG || $imageData[2] == IMAGETYPE_PNG)) 
        {
            die();
        }
    }

    $file_name=$_FILES["file_upload"]["name"];
    $temp_name=$_FILES["file_upload"]["tmp_name"]; 
    $imagename=$_FILES["file_upload"]["name"];
    $target_path = "images/".$imagename;
    
    if(move_uploaded_file($temp_name, $target_path)) 
    {
        if(isset($_POST['submit']))
        {
        	$query="INSERT INTO `registration` (course,first_name,middle_name,surname,address,mobile_no,f_reg,f_reg_date,f_april,f_april_date,f_may,f_may_date,img_path,dob,formnumber,total_fees,email)
        	VALUES('$course','$fname','$mname','$sname','$area',$phone,$regfee,'$regdate',$aprilfee,'$aprildate',$mayfee,'$maydate','".$target_path."','$dob','$formNumber',$total_fees,'$email')";
            $result=mysqli_query($con,$query);
        	if($result>0)
        	{
        		$_SESSION['successful']=1;
        		echo "<script type='text/javascript'> window.location='registration.php'</script>"; 
        	}
        }
        else
        {
        	$_SESSION['unsuccessful']=1;
        	echo "<script type='text/javascript'>alert('error while uploading photo!!')</script>"; 
        	echo "<script type='text/javascript'> window.location='registration.php'</script>"; 
        } 
    }	
?>