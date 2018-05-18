<?php
  session_start();
?>
 <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <meta charset="UTF-8">
      <title>Login</title>
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <link rel="shortcut icon" href="../images/favicon.ico">
    </head>
    <body>
      <div class="container">
        <div class=" myclass indigo lighten-5">
         <div class="row">
          <form class="col s12 m12 l12 mynewclass" action="verify.php" id="lg-form" name="lg-form" method="post" >
            <div class="row">
              <div class="col s12 m12 l12 center ">
                <h4>Login</h4>
              </div>
            </div>
            <div class="center">
              <span class="black">
                <?php if(!empty($_SESSION['failed'])){ echo "Invalid Valid Username or Password"; unset($_SESSION['failed']); } ?> 
              </span>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height">perm_identity</i>
                <input id="username" type="text" name="adminUname" autocomplete="off" class="validate">
                <label for="username">Username</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height">https</i>
                <input id="password" type="password" name="adminPass" autocomplete="off" style="dislay:none" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                  <center>
                    <button class="btn waves-effect waves-cyan white cyan-text" type="submit" name="submit">Login 
                    </button>
                  </center>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>   
  </body>
    <script type="text/javascript">
window.onload = function() {
 var myInput = document.getElementById('password');
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}
</script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  </html>