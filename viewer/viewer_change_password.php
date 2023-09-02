<?php 
    require "../connection/conn.php";
    session_start();

    if(isset($_POST['change_password_btn']))
    {
        $old_password = trim($_POST['old_password']);
        $new_password = trim($_POST['new_password']);

        $username = trim(strtoupper($_SESSION['username']));

        $query = mysqli_query($conn, "SELECT user_password FROM `users` WHERE username = '$username'");
        $result = mysqli_fetch_array($query);

        $current_password = $result['user_password'];

        $uppercase = preg_match('@[A-Z]@', $new_password);
        $lowercase = preg_match('@[a-z]@', $new_password);
        $number = preg_match('@[0-9]@', $new_password);

        if($old_password == $current_password)
        {
            if(!$uppercase || !$lowercase || !$number)
            {
                header("location: ./viewer_change_password_form.php?failure=Must Have Upper, Lower Case and Number!");
            }
            else {
                $query = mysqli_query($conn, "UPDATE `users` SET user_password = '$new_password' WHERE username = '$username'");
                header("location: ./viewer_change_password_form.php?success=Successfully Changed Password!");
            }
        }
        else 
        {
            header("location: ./viewer_change_password_form.php?failure=Old Password does not match!");
        }
    }
    


?>