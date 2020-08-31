<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="right-sidebar is-preload">
    <form class="box" method="post">
        <?php include('errors.php'); ?>
      <img src="hoodie.png" />
      <h1><b>Login</b></h1>
      <input type="email" placeholder="Your Email" name="email" value="" />
      <input type="password" placeholder="Password" name="pass" value="" />
      <input type="submit" name="login" value="Login" />
      <p><a href="forgot.php">Forgot Password?</a></p>
      <hr />
      
      <p>Don't have an account?<a href="signup.php"> Sign Up here</a></p>
    </form>
  </body>
</html>