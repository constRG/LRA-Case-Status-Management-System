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
    <title>LRA - USER: <?php echo strtoupper($_SESSION['username']); ?> CHANGE PASSWORD FORM</title>
</head>
<body>
    
    <?php require "./user_header.php"; ?>

    <main class="main" id="main">
        <div class="main_wrapper">
            
            <ul class="main_pages">
                <li class="main_pages_item">
                    <a href="./user_dashboard.php" class="main_pages_item_link">
                        <?php echo strtoupper($_SESSION['username']); ?> DASHBOARD
                    </a>
                </li>
                <li class="main_pages_item"><a href="./user_manage_all_data_table.php" class="main_pages_item_link">| MANAGE ALL DATA</a></li>
                <li class="main_pages_item"><a href="./user_manage_pending_data_table.php" class="main_pages_item_link">| MANAGE PENDING DATA</a></li>
                <li class="main_pages_item"><a href="./user_manage_decided_data_table.php" class="main_pages_item_link">| MANAGE DECIDED DATA</a></li>
                <li class="main_pages_item"><a href="" class="main_pages_item_link active">| CHANGE PASSWORD DATA FORM</a></li>
            </ul>

            <div class="data_form_wrapper">
                <form action="" method="POST" class="data_form change_password_form" id="data_form">
                    
                    <div class="data_form_header">
                        <h1 class="data_form_title data_form_add_title">CHANGE PASSWORD DATA FORM</h1>
                        <div class="data_form_label">
                            <span class="data_form_success"></span>
                            <span class="data_form_error"></span>
                        </div>
                    </div>

                    <div class="data_form_body">
                        <label for="old_password" class="data_form_input_title">OLD PASSWORD:</label>    
                        <input type="text" class="old_password" id="old_password" name="old_password" placeholder="Old Password..." minlength="6" required/>
                        <br>
                        
                        <label for="new_password" class="data_form_input_title">NEW PASSWORD:</label>    
                        <input type="text" class="new_password" id="new_password" name="new_password" placeholder="New Password..." minlength="6" required/>
                        
                        <button type="submit" class="submit_data_btn add_data_btn" onClick="return confirm('ARE YOU SURE YOU WANT TO CHANGE PASSWORD?')" name="change_password_btn">CHANGE PASSWORD</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <?php 

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
                ?>
                    <script>
                        const data_form_error = document.querySelector(".data_form_error");
                        data_form_error.textContent = "MUST HAVE UPPER, LOWER CASE AND NUMBER!";
                    </script>
                <?php
            }
            else {
                $query = mysqli_query($conn, "UPDATE `users` SET user_password = '$new_password' WHERE username = '$username'");
                ?>
                <script>
                    const data_form_success = document.querySelector(".data_form_success");
                    data_form_success.textContent = "SUCCESSFULLY CHANGED PASSWORD!";
                </script>
                <?php
            }
        }
        else 
        {
            ?>
            <script>
                const data_form_error = document.querySelector(".data_form_error");
                data_form_error.textContent = "OLD PASSWORD DOES NOT MATCH!";
            </script>
            <?php
        }
    }

    ?>
    
    <script src="../assets/js/main.js"></script>
</body>
</html>