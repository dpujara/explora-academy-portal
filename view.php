<?php 
session_start();
  if(!empty($_SESSION['start']))
  {
    unset($_SESSION['category']);
    unset($_SESSION['search']);  
    if(!empty($_SESSION['mail']))
    {
      echo '<script language="javascript">';
      echo 'alert("Mail has been sent.")';
      echo '</script>';
      unset($_SESSION['mail']);
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
<title>Explora Academy of Design</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/view.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link rel="shortcut icon" href="../images/favicon.ico">
</head>
<?php
  include('include_db.php');
  if (isset($_GET["page"]))
  {
    $page  = $_GET["page"];
  }
  else
  { 
    $page=1;
  } 
  
  $start_from = ($page-1) * 18; 
  if(!empty(  $_SESSION['searchv']) && ($_SESSION['categoryv']))
  {
    if($_SESSION['categoryv']=='all')
    {
      $sql = "SELECT * from registration ORDER BY surname limit  $start_from,18 ";
    }
    else if($_SESSION['categoryv']=='first_name')
    {
      $searchv=$_SESSION['searchv'];
      $sql = "SELECT * from registration where lower(`first_name`) like '%$searchv%' ORDER BY surname limit $start_from,18"; 
    }
    else if($_SESSION['categoryv']=='surname')
    {
      $searchv=$_SESSION['searchv'];
      $sql = "SELECT * from registration where lower(`surname`) like '%$searchv%' ORDER BY surname limit $start_from,18 "; 
    }
    else
    {
      $searchv=$_SESSION['searchv'];
      $sql = "SELECT * from registration where total_fees <=".$searchv." ORDER BY surname limit $start_from,18 "; 
    }
  }
  else
  {
    $sql = "SELECT * FROM registration ORDER BY surname limit $start_from,18  "; 
  }
  $result=mysqli_query($con,$sql);
?>
<body>
<nav>
  <div class="nav-wrapper">
    <a id="logo-container" href="welcome.php" class="brand-logo">
      <img id="shail" src="Resources/logo.png" height="64px" width="80px">
      <span  class="headername">Explora Academy of Design
      </span>
    </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="welcome.php">Home</a></li>
      <li><a href="registration.php">Registration</a></li>
      <li><a href="edit.php">Edit Forms</a></li>
      <li><a href="view.php">View Forms</a></li><li><a href="logout.php">Logout</a></li>
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
  <form method="post" action="searchv.php" enctype='multipart/form-data'>
    <div class="row white-text ">
      <div class="col s12 m12 l12">
        <div class="row pad-row">
          <div class="mar-left">
            <div class="input-field   col s12 m6 l4">
              <select name="category[]" id="category" required >
                <option value="none" selected ></option>
                <option value="all"  <?php if(!empty($_SESSION['categoryv']))  if($_SESSION['categoryv']=='all') echo 'selected'; ?>>ALL</option>
                <option value="surname" <?php if(!empty($_SESSION['categoryv'])) if($_SESSION['categoryv']=='surname') echo 'selected'; ?>>Surname</option>
                <option value="first_name" <?php if(!empty($_SESSION['categoryv'])) if($_SESSION['categoryv']=='first_name') echo 'selected'; ?>>Firstname</option>
                <option value="lowfees" <?php if(!empty($_SESSION['categoryv'])) if($_SESSION['categoryv']=='lowfees') echo 'selected'; ?>>Low Fees</option>
              </select>
              <label>Category</label>
            </div>
            <div class="input-field col  s12 m6 l4">
              <center>
                <input id="search"  type="text" name="searchv" value="<?php  if(!empty($_SESSION['searchv'])) echo $_SESSION['searchv']; ?>" class="validate" autocomplete="off">
                <label for="search">Search</label>
              </center>
            </div>
            <div class="input-field col center s12 m12 l4">
              <button class="btn waves-effect waves-cyan white red-text" type="submit" name="submit">
              Search
              </button>
            </div>
          </div>
          </br>
          </br>
        </div>
      </div>
    </div>
    <?php 
      if(mysqli_affected_rows($con)==0)
      {
        echo "No data found!"; 
      }
    ?>
  </form>

  <?php  
    if(!empty(  $_SESSION['searchv']) && ($_SESSION['categoryv']))
    {
      if($_SESSION['categoryv']=='all')
      {
        $sql3 = "SELECT COUNT(s_id) from registration ";
      }
      else if($_SESSION['categoryv']=='first_name')
      {
        $searchv=$_SESSION['searchv'];
        $sql3 = "SELECT COUNT(s_id) from registration where lower(`first_name`) like '%$searchv%' "; 
      }
      else if($_SESSION['categoryv']=='surname')
      {
        $searchv=$_SESSION['searchv'];
        $sql3 = "SELECT COUNT(s_id) from registration where lower(`surname`) like '%$searchv%' "; 
      }
      else
      {
        $searchv=$_SESSION['searchv'];
        $sql3 = "SELECT COUNT(s_id)  from registration where total_fees <=$searchv"; 
      }
    }
    else
    {
      $sql3 = "SELECT COUNT(s_id) FROM registration"; 
    }
    $rs_result2 = mysqli_query($con,$sql3); 
    $row = mysqli_fetch_row($rs_result2); 
    $total_records = $row[0]; 
    $total_pages = ceil($total_records/18); 
    if($total_pages==0)
    {
       $total_pages=1;
    }
  ?> 

  <div class="row">
    <?php
    while($row = mysqli_fetch_array($result))
    {
    ?>
    <div class="col s6 m3 l2">
      <div class="card result-card">
            <div class="card-image">
              <img src="<?php echo $row['img_path']; ?>">
            </div>
            <div class="card-content font-sizec">
              <p><?php $fname=$row['surname']; $fname=strtoupper($fname);echo $fname; echo " "; $mname=$row['first_name']; 
          $mname=strtoupper($mname); echo $mname; echo " "; ?>
          </p>
              <p><b>Fees:</b><?php $fees=$row['total_fees']; echo $fees; ?></p>
              <br/>
              <center>
                <p><a class="modal-trigger mod-ajax" href="#addBookDialog" data-id="<?php echo $row['s_id'];?>" data-toggle="modal"><i class="material-icons">visibility</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a  href="sendmail.php?idv=<?php echo $row['s_id'];?>"><i class="material-icons">email</i></a></p>
                </center>
            </div>
          </div>
    </div>
<?php } ?> 
</div> 
    <div class="row">
      <?php 
        echo "<ul class='pagination'>";
        $page1=$page-1;
        if($page1==0)
        {
          echo "<li class='waves-effect'><a href='view.php?page=1'><i class='material-icons'>chevron_left</i></a></li>";
        }
        else
        {
          echo "<li class='waves-effect'><a href='view.php?page=".($page-1)."'><i class='material-icons'>chevron_left</i></a></li>";
        }

        for ($i=1; $i<=$total_pages; $i++)
        { 
          if($page==$i)
          {
            echo"<li class='waves-effect active'><a href='view.php?page=".$i."'>".$i."</a></li> ";
          }
          else
          {
            echo "<li class='waves-effect'><a href='view.php?page=".$i."'>".$i."</a></li>";
          }
        }
      
        if($page<$total_pages) 
        {
          echo "<li class='waves-effect'><a href='view.php?page=".($page+1)."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
        }   
        else 
        { 
          echo "<li class='waves-effect'><a href='view.php?page=".$total_pages."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
        }
      ?>       
    </div>
  </div>
</div>

<!-- Modal Structure -->
          <div id="addBookDialog" class="modal blue-grey lighten-2">
            <div class="modal-header white-text pad-topm">
                <center>
                  <h3>Student Information</h3>
                </center>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="row mar-modal white-text">
                    <div class="input-field col s12 m12 l6">
                       <input id="formnumberm" placeholder="" type="text" class="validate" name="formnumberm" readonly>
                       <label for="formnumberm">Form Number</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                      <input id="coursem" type="text" placeholder="" class="validate" name="coursem" readonly>
                      <label for="coursem">Course</label>
                    </div>
                    
                    <div class="input-field col s12 m12 l6">
                      <input id="lastnamem" type="text" class="validate" placeholder="" name="lastnamem" readonly>
                      <label for="lastnamem">Surname</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                      <input id="firstnamem" type="text" placeholder="" class="validate" name="firstnamem" readonly>
                      <label for="firstnamem">First Name</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                      <input id="middlenamem" type="text" placeholder="" class="validate" name="middlenamem"readonly>
                      <label for="middlenamem">Middle Name</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                      <input id="mobilenumberm" type="text" class="validate" placeholder=""  name="mobilenumberm" readonly>
                      <label for="mobilenumberm">MobileNo</label>
                    </div>
                    <div class="input-field col s12 m12 l6" id="imagemodal">
                        <a href="#" id="pop">
                          <img id="imagem" src="" height="150px" width="150px">
                        </a>   
                    </div>
                    <div class="input-field col s12 m12 l6 white-text">
                      <input id="totalfeesm" type="text" class="validate" placeholder="" name="totalfeesm" readonly>
                      <label for="totalfeesm">Total Fees</label>
                    </div>
                  </div>
                </div>
            </div> 
            <div class="modal-footer">
              <center> 
              <a href="#!" class=" modal-action modal-close white lighten-2 mar-left waves-effect waves-white grey-text btn-flat">
              Back</a></center>
            </div>
          </div>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
var x;
$(document).on("click", ".mod-ajax", function () {
 var myBookId = $(this).data('id');
 $.get("check_id.php", {myBookId:myBookId},  
    function(result){   
        var result = result.split("$");
        $(".modal-body #formnumberm").val( result[0] ); 
        $(".modal-body #coursem").val( result[1] ); 
        $(".modal-body #firstnamem").val( result[2] ); 
        $(".modal-body #middlenamem").val( result[3] ); 
        $(".modal-body #lastnamem").val( result[4] ); 
        $(".modal-body #mobilenumberm").val( result[5]); 
        $(".modal-body #imagem").val( result[7] ); 
        $(".modal-body #totalfeesm").val( result[6]); 
        $('#imagemodal img').attr("src",result[7]);
        console.log(result);
 });  
});
</script>
</body>
</html>
<?php
     if(!empty($_SESSION['invalidvalue']))
     {
      echo "<script>alert('Enter valid value.');</script>";
      unset($_SESSION['invalidvalue']);
     }
?>
<?php }
else
{
echo "<script type='text/javascript'> window.location='index.php'</script>";   
}
?>