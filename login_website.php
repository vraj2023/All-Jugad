<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="widtht=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Login / sign up form</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/assests/favicon.ico">

    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form class="form" id="login"  method="post" action="login_website.php">
        <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error">
        </div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="username" name="username" maxlength="15">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" autofocus placeholder="password" name="password" maxlength="25">
                <div class="form__input-error-message"></div>
            </div>
            <button name="btn" class="form__button" type="submit">Countinue</button>
                <p class="form__text">
                    <a href="#" class="form__link"></a>
                </p>
                <p class="form__text">
                    <a class="form__link" href="signup.php" >Sign Up For All Jugad</a>
                </p> 
        </form>
    </div>
    <?php
        require 'login_db_connect.php';

        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            if(isset($_POST['btn']))
            {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $_SESSION['user'] = $user;
                $q = "SELECT * FROM `login` WHERE `user`='$user' AND `password`='$pass'";
                $r = mysqli_query($connection,$q);
                $s = mysqli_num_rows($r);
                if($s>0)
                {
                    echo header("location:real_alljugad.php");
                }
                else
                {
                    echo "User not found or password doesn't match..!!";
                }
            }
        }
    ?>
    <script src="main.js"></script>
</body>
</html>