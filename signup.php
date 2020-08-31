<?php 
    include('server.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="right-sidebar is-preload">
    <form class="box" method="post">
        <?php include('errors.php'); ?>
      <img src="hoodie.png" />
      <h1><b>Create an account</b></h1>
      <input type="email" placeholder="Your Email" name="email" value="" />
      <input type="password" placeholder="Password" name="pass" value="" />
      <input type="password" placeholder="Confirm Your Password" name="confirm" value=""/>
      <p>
        <input type="checkbox" name="checkbox" value="accepted" checked/>I agree to the terms and
        conditions
      </p>

      <input type="submit" name="signup" value="Sign Up"/>
      <hr />
      <p>Have an account?<a href="login.php"> Login here</a></p>
    </form>
  </body>
</html>
