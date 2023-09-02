<?php
    session_start();
    if($_SESSION['status'] == 'invalid' || empty($_SESSION['status']))
    {
        $_SESSION['status'] = 'invalid';
    }

    // if($_SESSION['status'] == 'valid')
    // {
    //     header("location: ./admin/admin_dashboard.php");
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="./assets/images/Land_Registration_Authority_Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/libs/aos/aos.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>LRA - Users Login</title>
</head>
<body>
    
    <div class="login_wrapper" id="login_wrapper">
        <form action="./login.php" method="POST" class="login_form" data-aos="fade-down" data-aos-duration="1000">
            <div class="login_header">
                <a href="./index.php"><img src="./assets/images/Land_Registration_Authority_Logo.png" class="login_logo" alt="Land_Registration_Authority_Logo" data-aos="fade-right" data-aos-duration="1000"></a>
                <h1 class="login_logo_name" data-aos="fade-left" data-aos-duration="1000">
                    LAND <br>
                    REGISTRATION <br>
                    AUTHORITY 
                    <hr>
                    <span class="login_web_system_name">CASE STATUS MANAGEMENT SYSTEM</span>
                </h1>
            </div>
            <div class="login_body">
                <input type="text" class="login_username" name="username" placeholder="Username..." required/>
                <div class="password_wrapper">
                    <input type="password" class="login_user_password" name="user_password" placeholder="Password..." required/>
                    <img src="./assets/images/eye_open.png" onClick="show_password()" class="eye_open_btn" alt="eye_open">
                </div>
                <button type="submit" class="login_btn" name="login_btn">LOGIN</button>
                <span class="login_auth_error">
                    <?php 
                    if(isset($_GET['error']))
                    {
                        echo $_GET['error'];
                    } 
                    ?>
                </span>
            </div>
        </form>
    </div>
    
    <script src="./assets/js/main.js"></script>
    <script src="./assets/libs/aos/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>