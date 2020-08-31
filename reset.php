<?php 
    $errors2 = array();
    $db = mysqli_connect('localhost','root','','registration');
    if(isset($_POST['change'])){
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $token = mysqli_real_escape_string($db,$_POST['token']);
        $pass = mysqli_real_escape_string($db,$_POST['pass']);
        $confirm = mysqli_real_escape_string($db,$_POST['confirm']);

        $query = "select * from resetpass where email='$email'";
        $query1 = "select * from resetpass where token='$token'";
        $run = mysqli_query($db, $query);
        $run1 = mysqli_query($db, $query1);
        //array_push($errors2,$run1);
        if(mysqli_num_rows($run) > 0){
          if(mysqli_num_rows($run1) > 0){
            if($pass == $confirm){
              $query2 = "update users set pass=$pass where email='$email'";
              mysqli_query($db, $query2);
              $query3 = "delete from resetpass where email='$email'";
              mysqli_query($db, $query3);
              array_push($errors2, "Password Changed Successfully.");
            }
            else{
              array_push($errors2, "Passwords don't match.");
            }
          }
          else{
          array_push($errors2, "Token Incorrect.");
        }  
        }
        else{
          array_push($errors2, "User Mail not found.");
        }
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Reset Password</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .box input[type="text"] {
  border: 0;
  background: none;
  margin: 20px auto;
  text-align: center;
  display: block;
  border: 2px solid #8e44ad;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: black;
  border-radius: 20px;
  transition: 0.25s;
}
.box input[type="text"]:focus {
  width: 250px;
  border-color: #2ecc71;
}

    </style>
  </head>
  <body class="right-sidebar is-preload">
    <form class="box" method="post">
      <?php include('errorstwo.php'); ?>
      <img src="hoodie.png" />
      <h1><b>Reset Password</b></h1>
      <input type="email" placeholder="Your Email" name="email" value="" />
      <input type="text" placeholder="Token" name="token" value="" />
      <input type="password" placeholder="Password" name="pass" value="" />
      <input type="password" placeholder="Confirm Your Password" name="confirm" value=""/>
      <hr />
      <input type="submit" name="change" value="Change Password" />
    </form>
  </body>
</html>
