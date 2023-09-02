<?php
    require "./connection/conn.php";
    session_start();

    if(isset($_POST['login_btn']))
    {
        $username = trim($_POST['username']);
        $user_password = trim($_POST['user_password']);
        $classification = $_POST['classification'];
        
        $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$username' AND user_password = '$user_password'");
        $query1 = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND user_password = '$user_password'");
        $result = mysqli_fetch_array($query1);

        if(mysqli_num_rows($query) == 1 || mysqli_num_rows($query1) == 1)
        {
            $_SESSION['status'] = 'valid';
            $_SESSION['username'] = $username;

            header("location: ./admin/admin_dashboard.php");
            
            if($result['classification'] == "USER" || $result['classification'] == "user")
            {
                
                header("location: ./user/user_dashboard.php");
            }
            else if($result['classification'] == "VIEWER" || $result['classification'] == "viewer")
            {
                header("location: ./viewer/viewer_dashboard.php");
            }
        }

        else {
            $_SESSION['status'] = 'invalid';
            header("location: index.php?error=Incorrect User Name or Password!");
        }
    }

?>