<?php
session_start();
if(isset($_SESSION['start']))
{
	unset($_SESSION['categoryv']);
	unset($_SESSION['searchv']);
	unset($_SESSION['category']);
	unset($_SESSION['search']);
	include('include_db.php');
	$sql3 = "SELECT COUNT(s_id) FROM registration"; 
	$rs_result2 = mysqli_query($con,$sql3); 
	$row = mysqli_fetch_row($rs_result2); 
	$total_records = $row[0];  
	$sql31="SELECT (SUM(f_reg)+SUM(f_april)+SUM(f_may)) as total from registration ";
	$rs_result21= mysqli_query($con,$sql31); 
	$row = mysqli_fetch_row($rs_result21); 
	$total_fees = $row[0];
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
<meta charset=utf-8 name="viewport" content="width=device-width, initial-scale=1.0"/>
<link type="text/css" rel="stylesheet" href="css/welcome.css"/>
<link rel="shortcut icon" href="../images/favicon.ico">
<title>Home</title>
<style type="text/css">
	.thiscard{
		padding: 30px;
		background-color: inherit;
		text-align: center;
	}
	.thiscard a{
		margin: 15px;
	}
	.btn-large{
		width:inherit;
	}
	</style>
</head>
<body>
<nav>
	<div class="nav-wrapper">
		<a id="logo-container" href="#" class="brand-logo">
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
	<section class="mar-top"> 
		<p>
				<div class="row">
			        <div class="col s12 m12 l12">
			          <div class="card blue-grey darken-1">
			            <div class="card-content white-text">
			              <center class="red lighten-2"><span class="card-title">Explora Academy</span></center>
			              <p class="thiscard">
			              	<a href="registration.php" class="waves-effect waves-light red lighten-2 btn-large"><i class="material-icons right">description</i>Registration</a>
			              	<a href="edit.php" class="waves-effect waves-light green lighten-2 btn-large"><i class="material-icons right">edit</i>&nbsp;&nbsp;Edit Forms&nbsp;&nbsp;</a>
			              	<a href="view.php" class="waves-effect waves-light  cyan lighten-2 btn-large"><i class="material-icons right">visibility</i>&nbsp;View Forms&nbsp;&nbsp;</a>
			              	<a href="logout.php" class="waves-effect waves-light  pink lighten-2 btn-large"><i class="material-icons right">keyboard_tab</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			              </p>
			            </div>
			          </div>
			        </div>
			    </div>
			</p>
	</section>	
</div>
<div class="container">
	<div class="row ">
		<div class="col s12 m12 l12">
			<ul class="collapsible popout" data-collapsible="expandable" id="ul2" data-collapsible="accordion">
				<li>
				  <div class="collapsible-header  <?php if(empty($_SESSION['pass'])){ echo "active"; } ?> red lighten-2 white-text">
				  		<i class="material-icons">info</i>Registration Information
				  </div>
				  <div class="collapsible-body blue-grey darken-1">
				  	<div class="row pad-top">
				  		<div class="col s12 m12 l12">
			            	<div class="input-field blue-grey-text white-text col s12 m12">
			            	 	<input id="oldpassword" type="text"  name="fname" value="<?php echo $total_records; ?>" readonly>
			            	 	<label for="oldpassword">Registered Students</label>
			            	</div>
			            	<div class="input-field blue-grey-text white-text col s12 m12 l12 ">
			            	  <input id="newpassword" type="text" class="validate" name="mname" readonly value="<?php echo $total_fees; ?>" required>
			            	  <label for="newpassword">Total Collected Fees</label>
			            	</div>
			          	</div>
			          </div>
				  </div>
				</li>
				<li>	
				  <div class="collapsible-header  <?php if(!empty($_SESSION['pass'])){ echo "active"; unset($_SESSION['pass']); } ?> red lighten-2 white-text">
				  		<i class="material-icons">lock</i>Change Password
				  </div>
				  <div class="collapsible-body blue-grey darken-1">
				  	<div class="row pad-top">
				  		<form class="col s12 m12 l12  mynewclass" action="change_password.php" method="post" enctype='multipart/form-data'>
							<span class="white-text">
			            	 	<?php if(!empty($_SESSION['validpass'])){ echo "Password changed successfully"; unset($_SESSION['validpass']); }
			            	 		  if(!empty($_SESSION['invalidpass'])){ echo "New password can not be same as Old password"; unset($_SESSION['invalidpass']); }
			            	 		  if(!empty($_SESSION['invalidoldpass'])){ echo " Invalid Username or Password"; unset($_SESSION['invalidoldpass']); } 	
			            	 	 ?>
			            	</span>
			            	<div class="input-field col s12 m12 white-text">
			            	 	<input id="userid" type="text" class="validate" name="userid" autocomplete="off" required>
			            	 	<label for="userid">Username</label>
			            	</div>
			            	<div class="input-field col s12 m12 white-text">
			            	 	<input id="old_password" type="password" class="validate" name="oldpass" autocomplete="off" required>
			            	 	<label for="old_password">Old Password</label>
			            	</div>
			            	<div class="input-field col s12 m12 l12 white-text">
			            	 	 <input id="new_password" type="password" class="validate" name="newpass" autocomplete="off" required>
			            	 	 <label for="new_password">New Password</label>
			            	</div>
			            	<div class="input-field col s12 m12 l12 center"> 
									<button class="btn waves-effect waves-cyan white teal-text" type="submit" name="submit">
										Submit 
									</button>
							</div>
			          	</form>
			          </div>
				  </div>
				</li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
<?php }
else
{
echo "<script type='text/javascript'> window.location='index.php'</script>";		
}
?>