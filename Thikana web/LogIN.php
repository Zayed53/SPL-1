<?php
    require 'config.php';
    session_start();
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM userstry WHERE email='$email'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            if((password_verify($password, $row['password']))&&($row['email']==$email)){
                $_SESSION["email"]=$row['email'];
                $_SESSION["name"]=$row['username'];
                $_SESSION["phn_no"]=$row['phone_no'];
                echo  
                "<script> alert('login  done'); </script> ";
                header("location: home.php");
            }else{
                echo  
                "<script> alert('wrong password'); </script> ";
            }

        }else{
            echo  
            "<script> alert('Wrong Email'); </script> ";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Login & Registration Form</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#" method="post">
                    <div class="input-field">
                        <input type="text" name="email" id="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidepw"></i>
                    </div>

                    <div class="chechbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="login" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="registration.php" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>




