<?php 
$errors1 = array();

$db = mysqli_connect('localhost','root','','registration');
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $query = "select * from users where email = '$email'";
    $run = mysqli_query($db, $query);
    if(mysqli_num_rows($run) > 0){
        $row = mysqli_fetch_array($run);
        $emaildb = $row['email'];
        $iddb = $row['id'];
        $reset_token = uniqid(md5(time()));
        $query1 = "INSERT INTO resetpass (email, token) 
                    VALUES ('$email','$reset_token')";
       if(mysqli_query($db, $query1)){
         //   $to = $emaildb;
         //     $subject = "Password Reset Link"
         //   $message = "Click <a href='https://sample.com/reset.php?token=$reset_token'>here</a> to reset password.";
         //   $headers = "MIME-Version: 1.0" . "\r\n";
         //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         //   $headers .= 'From: <webmaster@example.com>' . "\r\n";    
          //  mail($to, $subject, $message, $headers);
       // echo "<p> Password Reset Link has been sent to mail. </p>";
          array_push($errors1, "Password Reset Link has been sent to mail.");
       }            
    }
    else{
       // echo "<p> User Not Found. </p>";
       array_push($errors1, "User Not Found.");
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="right-sidebar is-preload">
    <form class="box" method="post">
      <?php include('errorsone.php') ?>
      <img src="hoodie.png" />
      <h1><b>Reset Password</b></h1>
      <input type="email" placeholder="Your Email" name="email" value="" />
      <input type="submit" name="submit" value="Send Mail" />
      <hr />
    </form>
  </body>
</html>