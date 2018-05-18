<?php 
  session_start();
  if(!empty($_SESSION['start']))
{?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Info</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
<title>Explora Academy of Design</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/updateinfo.css" type="text/css" rel="stylesheet">
<link rel="shortcut icon" href="../images/favicon.ico">
<title> UPDATE INFO </title>
</head>
<body>
<nav>
  <div class="nav-wrapper paddingclass">
    <a id="logo-container" href="welcome.php" class="brand-logo">
      <img id="shail" src="Resources/logo.png" height="64px" width="80px">
        <span class="headername">Explora Academy of Design
        </span>
    </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="welcome.php">Home</a></li>
      <li><a href="registration.php">Registration</a></li>
      <li><a href="edit.php">Edit Forms</a></li>
      <li><a href="view.php">View Forms</a></li>    <li><a href="logout.php">Logout</a></li>
    </ul>
    <ul id="nav-mobile" class="side-nav">    
      <li><a href="welcome.php">Home</a></li>  
      <li><a href="registration.php">Registration</a></li>
      <li><a href="edit.php">Edit Forms</a></li>
      <li><a href="view.php">View Forms</a></li><li><a href="logout.php">Logout</a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse nav-mar"><i class="material-icons ">menu</i></a>
  </div>
</nav>
<div class="container">
	<div class="  myclass indigo lighten-5">
    <form class="col s12 m12 l12 mynewclass" action="registerupdate.php" method="post" enctype='multipart/form-data'>
    <?php

    if(!empty($_SESSION['categoryv']))
      unset($_SESSION['categoryv']);
    if(!empty($_SESSION['category']))
      unset($_SESSION['category']);
    if(!empty($_SESSION['searchv']))
      unset($_SESSION['searchv']);
    if(!empty($_SESSION['search']))
      unset($_SESSION['search']);
    
    include('include_db.php');
     if (isset($_GET["idv"]))
     {
       $idv  = $_GET["idv"]; 
     } 
     $sql="SELECT * FROM registration where s_id='$idv'";
     $rs_result = mysqli_query($con,$sql);
     while ($row = mysqli_fetch_assoc($rs_result)) { 

      $sid=$row['s_id'];
      $formnumber=$row['formnumber'];
      $course=$row['course'];
      $first_name=$row['first_name'];
      $middle_name=$row['middle_name'];
      $surname=$row['surname'];
      $address=$row['address'];
      $mobile_no=$row['mobile_no'];
      $f_reg=$row['f_reg'];
      $f_reg_date=$row['f_reg_date'];
      $f_april=$row['f_april'];
      $f_april_date=$row['f_april_date'];
      $f_may=$row['f_may'];
      $f_may_date=$row['f_may_date'];
      $email=$row['email'];
      $dob=$row['dob'];
      $img_path=$row['img_path'];
      $dob=date('d-m-Y',strtotime($dob));
      $f_reg_date=date('d-m-Y',strtotime($f_reg_date));
      if($f_april_date=='0000-00-00')
      {

      }
      else
      {
        $f_april_date=date('d-m-Y',strtotime($f_april_date));
      }  
      if($f_may_date)
      {

      }
      else
      {
        $f_may_date=date('d-m-Y',strtotime($f_may_date));  
      }
    } 	   
?>
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input type="text" class="validate" onchange="check_availability()" name="form_number"  id="FormNumber" value="<?php echo $formnumber; ?>" autocomplete="off" required>
          <input type="hidden" name="s_id" value="<?php echo $sid?>">
          <label for="FormNumber">Form Number</label>
        </div>

        <div class="input-field col s12 m6 l6">
          <select name="courses" required >
            <option value="NATA" <?php if($course=="NATA") echo "selected";?>>NATA</option>
            <option value="INTERIOR DESIGN" <?php if($course=="INTERIOR DESIGN") echo "selected";?>>INTERIOR DESIGN</option> 
          </select>
          <label>Course</label>
        </div>
        <div id='username_availability_result' class="black-text text-colo">
        </div> 
      </div>
      
      <div class="row">

        <div class="input-field col s12 m12 l4">
          <input id="lname" type="text" class="validate" name="sname" onKeyUp="capitalise()" value= "<?php echo $surname?>" required autocomplete="off">
          <label for="lname">Surname</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input id="first_name" type="text" class="validate" name="fname" onKeyUp="capitalise()" value= "<?php echo $first_name;?>" required autocomplete="off">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input id="mname" type="text" class="validate" name="mname" onKeyUp="capitalise()" value= "<?php echo $middle_name;?>" required autocomplete="off">
          <label for="mname">Middle Name</label>
        </div>
      </div>

      <div class="row s12 m12 l12">
        <div class="input-field col s12 m12 l12">
          <textarea id="address" class="materialize-textarea" name="area"  required autocomplete="off"><?php echo $address ?></textarea>
          <label for="address">Address</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s6 m6 l6">
          <input id="BirthDate" type="date" class="datepicker" placeholder="" name="dob" value= "<?php echo $dob?>" >
          <label for="BirthDate">Birth Date</label>
        </div>      
        <div class="input-field col s6 m6 l6">
          <input id="mobile number" type="tel" name="phno" size="10" pattern="[0-9]{10,11}"  class="validate" value= "<?php echo $mobile_no?>" required autocomplete="off">
          <label for="mobile number">Phone Number</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input id="datepicker" type="date" class="datepicker" placeholder="" name="regdate" value="<?php echo $f_reg_date?>" >
          <label for="datepicker">Registration Date</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input id="regfeeid" type="number" class="validate"  name="regfee" onKeyUp="sum()" value= "<?php echo $f_reg ?>" required autocomplete="off">
          <label for="regfeeid">Registration Fees</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input type="date" class="datepicker" name="aprildate" placeholder="" id="datepicker1" value="<?php if($f_april_date=='0000-00-00') {echo '';} else echo $f_april_date?>">
          <label for="datepicker1">April Date</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input id="aprilfeeid" type="number" class="validate" name="aprilfee" onKeyUp="sum()" value="<?php if($f_april==0){} else{ echo $f_april;}?>" autocomplete="off">
          <label for="aprilfeeid">April Fees</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input type="date" class="datepicker" name="maydate" placeholder="" id="datepicker2" value="<?php  if($f_may_date=='0000-00-00') {echo '';} else echo $f_may_date?>">
          <label for="datepicker2">May Date</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input type="number" class="validate" name="mayfee" id="mayfeeid" onKeyUp="sum()" value="<?php if($f_may==0){} else {echo $f_may;}?>" autocomplete="off">
          <label for="mayfeeid">May Fees</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 m6 l6 left"><span class="mytextclass">Total</span>
          <input readonly class="validate"  type="number" name="tot" id="total" >
        </div>
        <div class="input-field col s12 m6 l6 "><span class="mytextclass" >Email</span>
          <input  class="validate" type="email" name="email" id="email" value="<?php echo $email; ?>" required autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="file-field input-field s12 m12 l6">
          <div class="btn mar-upload white cyan-text">
            <span>Upload Photo</span>
              <input type='file' name="file_upload" value="<?php if($img_path != null) echo $img_path;?>" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png"/>
          </div>
          <img id="blah" class="img-pad" src="<?php if($img_path != null) echo $img_path;?>" width="100" height="100" />
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 m12 l12">
         <center>
            <button class="btn waves-effect cyan-text white   waves-light" type="submit" onclick="return confirm('Are you sure , you want to update the data?')" name="submit">Submit
            </button>
          </center>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/init.js"></script>
<script type="text/javascript" src="js/sum.js"></script>
</body>
</html>
<?php }
else
{
echo "<script type='text/javascript'> window.location='index.php'</script>"; 
}
?>