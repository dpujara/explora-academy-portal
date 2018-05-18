<?php 
session_start();
if(!empty($_SESSION['successful']))
{
  echo '<script language="javascript">';
  echo 'alert("added successfully")';
  echo '</script>';
  unset($_SESSION['successful']);
}

unset($_SESSION['categoryv']);
unset($_SESSION['searchv']);
unset($_SESSION['category']);
unset($_SESSION['search']);
?>

<?php 
if(isset($_SESSION['start']))
{
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
<meta charset=utf-8 name="viewport" content="width=device-width, initial-scale=1.0"/>
<link type="text/css" rel="stylesheet" href="css/registration.css"/>
<link rel="shortcut icon" href="../images/favicon.ico">
<title>Registration</title>
</head>
<body>
<nav>
  <div class="nav-wrapper">
    <a id="logo-container" href="welcome.php" class="brand-logo">
      <img id="shail" href="#" src="Resources/logo.png" height="64px" width="80px">
      <span  class="headername">Explora Academy of Design</span>
    </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="welcome.php">Home</a></li>
      <li><a href="registration.php">Registration</a></li>
  		<li><a href="edit.php">Edit Forms</a></li>
  		<li><a href="view.php">View Forms</a></li>
  		<li><a href="logout.php">Logout</a></li>
    </ul>
    <ul id="nav-mobile" class="side-nav">
      <li><a href="welcome.php">Home</a></li>
      <li><a href="registration.php">Registration</a></li>
  		<li><a href="edit.php">Edit Forms</a></li>
  		<li><a href="view.php">View Forms</a></li>
  		<li><a href="logout.php">Logout</a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse nav-mar"><i class="material-icons ">menu</i>
    </a>  
  </div>
</nav>
<div class="container">
  <div class=" myclass indigo lighten-5">
    <div class="row clearfix">
      <form class="col s12  m12 l12 mynewclass" action="registerverify.php" method="post" enctype='multipart/form-data'>      
        <div class="row">
          <div class="input-field col s12 m6 l6">
            <input id="FormNumber" type="text" onchange="check_availability()"class="validate" REQUIRED name="form_number" autocomplete="off">
            <label for="FormNumber">Form Number</label>
          </div>
          <div class="input-field   col s12 m6 l6">
            <select name="courses[]"  required >
              <option value="NATA" selected >NATA</option>
              <option value="INTERIOR DESIGN">INTERIOR DESIGN</option>
            </select>
              <label>Course</label>
          </div>
          <div id='username_availability_result' class="black-text text-colo">
          </div> 
        </div>
        <div class="row">
          
          <div class="input-field col s12 m12 l4">
            <input id="lname" type="text" class="validate" name="sname" autocomplete="off" onKeyUp="capitalise()" required>
            <label for="lname">Surname</label>
          </div>

          <div class="input-field col s12 m6 l4">
             <input id="first_name" type="text" class="validate" name="fname" autocomplete="off" onKeyUp="capitalise()" required>
             <label for="first_name">First Name</label>
          </div>
          
          <div class="input-field col s12 m6 l4">
            <input id="mname" type="text" class="validate" name="mname" autocomplete="off" onKeyUp="capitalise()" required>
            <label for="mname">Middle Name</label>
          </div>
        </div>
        <div class="row s12 m12 l12">
          <div class="input-field col s12 m12 l12">
            <textarea id="address" class="materialize-textarea" name="area" length="135" required></textarea>
            <label for="address">Address</label>
          </div>
        </div>
        <div class="row clearfix">
          <div class="input-field col clearfix s6 m6 l6">
            <input id="BirthDate" type="date" class="datepicker" placeholder="" name="dob" autocomplete="off" required>
            <label for="BirthDate">Birth Date</label>
          </div>
          <div class="input-field col s6 m6 l6">
            <input id="mnumber" type="tel" size="10" name="phno" pattern="[0-9]{10,11}"  class="validate" autocomplete="off" required>
            <label for="mnumber">Phone Number</label>
          </div>
        </div>
        <div class="row clearfix">
          <div class="input-field col clearfix s12 m6 l6">
            <input id="f_reg" type="date" class="validate datepicker" placeholder="" name="regdate" autocomplete="off" required>
            <label for="f_reg">Registration Date</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <input id="regfeeid" type="number" class="validate" name="regfee" onKeyUp="sum()" autocomplete="off" required>
            <label for="regfeeid">Registration Fees</label>
          </div>
        </div>
        <div class="row clearfix">
          <div class="input-field clearfix col s12 m6 l6">
            <input type="date" class="datepicker" name="aprildate" placeholder="" id="f_april_date" autocomplete="off" >
            <label for="f_april_date">April Date</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <input id="aprilfeeid" type="number" class="validate" name="aprilfee" onKeyUp="sum()" autocomplete="off">
            <label for="aprilfeeid">April Fees</label>
          </div>
        </div>
        <div class="row clearfix">
          <div class="input-field col clearfix s12 m6 l6">
           <input type="date" class="datepicker" name="maydate" id="f_may_date" autocomplete="off" placeholder="">
           <label for="f_may_date">May Date</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <input type="number" class="validate" name="mayfee" id="mayfeeid" onKeyUp="sum()" autocomplete="off">
            <label for="mayfeeid">May Fees</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6 l6 left"><span class="mytextclass">Total</span>
           <input readonly class="validate" type="number" name="tot" id="total" >
          </div>
          <div class="input-field col s12 m6 l6 "><span class="mytextclass">Email</span>
            <input  class="validate" type="email" name="email" id="email" autocomplete="off" required>
          </div>
        </div>
        <div class="row">
          <div class="file-field input-field ">    
            <input type='text' class="file-path validate"/> 
              <div class="btn    white cyan-text">
                <span>Upload Photo</span>
                  <input type="file" name="file_upload" style="height:3rem" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png">
              </div>
              <img id="blah" class="img-pad" />     
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <center>
              <button class="btn waves-effect waves-cyan white cyan-text" type="submit" name="submit">
                Submit 
              </button>
            </center>
          </div>
        </div>
      </form>
    </div>
  </div>  
</div>  
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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