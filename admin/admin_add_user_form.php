<?php
    require "../connection/conn.php";
    session_start();
    
    if($_SESSION['status'] == 'invalid' || empty($_SESSION['status']))
    {
        $_SESSION['status'] = 'invalid';
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../assets/images/Land_Registration_Authority_Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>LRA - ADMIN: <?php echo strtoupper($_SESSION['username']); ?> ADD USER FORM</title>
</head>
<body>
    
    <?php require "./admin_header.php"; ?>

    <main class="main" id="main">
        <div class="main_wrapper">
            <ul class="main_pages">
                <li class="main_pages_item">
                    <a href="./admin_dashboard.php" class="main_pages_item_link">
                        <?php echo strtoupper($_SESSION['username']); ?> DASHBOARD
                    </a>
                </li>
                <li class="main_pages_item"><a href="./admin_manage_users_table.php" class="main_pages_item_link">| MANAGE USERS</a></li>
                <li class="main_pages_item"><a href="./admin_manage_all_data_table.php" class="main_pages_item_link">| MANAGE ALL DATA</a></li>
                <li class="main_pages_item"><a href="./admin_manage_pending_data_table.php" class="main_pages_item_link">| MANAGE PENDING DATA</a></li>
                <li class="main_pages_item"><a href="./admin_manage_decided_data_table.php" class="main_pages_item_link">| MANAGE DECIDED DATA</a></li>
                <li class="main_pages_item"><a href="" class="main_pages_item_link active">| ADD USER FORM</a></li>
            </ul>

            <div class="data_form_wrapper">

                <form action="" method="POST" class="data_form add_data_user_form" id="data_form">
                    <div class="data_form_header">
                        <h1 class="data_form_title data_form_add_title">ADD USER FORM</h1>
                            <div class="data_form_label">
                                <span class="data_form_success"></span>
                                <span class="data_form_error"></span>
                            </div>
                    </div>
                    
                    <div class="data_form_body">
                        <label for="username" class="data_form_input_title">USERNAME:</label>    
                        <input type="text" class="username" id="username" name="username" placeholder="Username..." minlength="2" required/>
                        <br>

                        <label for="user_password" class="data_form_input_title">USER PASSWORD:</label>    
                        <input type="text" class="user_password" id="user_password" name="user_password" placeholder="Password..." minlength="6" required/>

                        <select class="classification" id="classification" name="classification" required>
                            <option value="user" class="classification_option_item option_user">USER</option>
                            <option value="viewer" class="classification_option_item option_viewer">VIEWER</option>
                        </select>
                        <button type="submit" class="submit_data_btn add_data_btn" name="add_data_btn" onClick="return confirm('ARE YOU SURE YOU WANT TO ADD THIS USER?')">ADD USER</button>        
                    </div>

                </form>

            </div>
        </div>
    </main>
    
    <?php

        if(isset($_POST['add_data_btn']))
        {
        $username = trim(strtoupper($_POST['username']));
        $user_password = trim($_POST['user_password']);
        $classification = trim(strtoupper($_POST['classification']));

        $uppercase = preg_match('@[A-Z]@', $user_password);
        $lowercase = preg_match('@[a-z]@', $user_password);
        $number = preg_match('@[0-9]@', $user_password);

        $query = mysqli_query($conn, "SELECT username FROM `users` WHERE username = '$username'");
        if(mysqli_num_rows($query) != 0)
        { 
            ?>
                <script>
                    const data_form_error = document.querySelector(".data_form_error");
                    data_form_error.textContent = "USERNAME EXISTS!";
                </script>
            <?php
        }
        else if(!$uppercase || !$lowercase || !$number)
        {
            ?>
                <script>
                    const data_form_error = document.querySelector(".data_form_error");
                    data_form_error.textContent = "MUST HAVE UPPER, LOWER CASE AND NUMBER!";
                </script>
            <?php
        }
        else 
        {
            $query = mysqli_query($conn, "INSERT INTO `users` (`username`, `user_password`, `classification`) VALUES ('$username', '$user_password', '$classification')");
            ?>
                <script>
                    const data_form_success = document.querySelector(".data_form_success");
                    data_form_success.textContent = "USER ADDED SUCCESSFULLY!";
                </script>
            <?php
        }
        }
    ?>

    <script src="../assets/js/main.js"></script>
</body>
</html>