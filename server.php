<?php
    session_start();

    $email = "";
    $errors = array();

    $db = mysqli_connect('localhost', 'root', '', 'registration');

    if(isset($_POST['signup'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confirm = $_POST['confirm'];

        if(empty($email)){
            array_push($errors, "Email is required");       
        }
        if(empty($pass)){
            array_push($errors, "Password is required");       
        }
        if($pass != $confirm){
            array_push($errors, "Passwords don't match");       
        }
        // if(isset($_POST['checkbox']) !== 'checked'){
        //     array_push($errors, "Check: I Agree to Terms and Conditions");       
        // }

        if(count($errors) == 0) {
            $sql = "INSERT INTO users (email, pass)
                    VALUES ('$email', '$pass')";
            mysqli_query($db, $sql);    
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "Logged in Successfully";
            header('location: index.php');

        }
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(empty($email)){
            array_push($errors, "Email is required");       
        }
        if(empty($pass)){
            array_push($errors, "Password is required");       
        }
        if(count($errors) == 0){
            $query = "SELECT * FROM users WHERE email= '$email' AND pass= '$pass'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['email'] = $email;
            $_SESSION['success'] = "Logged in Successfully";
            header('location: index.php');
            }
            else{
                array_push($errors, "Wrong mail/password combination");
            }
        }    
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }
?>
