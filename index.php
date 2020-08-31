<?php 
    include('server.php');

    if(empty($_SESSION['email'])) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="right-sidebar is-preload">
    <div class="header">
        <h1>Home Page</h1>
    </div>    
    <div class="content">
        <?php if(isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h3>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>    
                </div>    
                
        <?php endif ?> 
        
        <?php if(isset($_SESSION["email"])): ?>
                <p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
                <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>    
    </div>
  </body>
</html>