<?php
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
    <title>LRA - VIEWER: <?php echo strtoupper($_SESSION['username']); ?> CHANGE PASSWORD FORM</title>
</head>
<body>
    
    <?php require "./viewer_header.php"; ?>

    <main class="main" id="main">
        <div class="main_wrapper">
            
            <ul class="main_pages">
                <li class="main_pages_item">
                    <a href="./viewer_dashboard.php" class="main_pages_item_link">
                        <?php echo strtoupper($_SESSION['username']); ?> DASHBOARD
                    </a>
                </li>
                <li class="main_pages_item"><a href="./viewer_view_all_data_table.php" class="main_pages_item_link">| MANAGE ALL DATA</a></li>
                <li class="main_pages_item"><a href="./viewer_view_pending_data_table.php" class="main_pages_item_link">| MANAGE PENDING DATA</a></li>
                <li class="main_pages_item"><a href="./viewer_view_decided_data_table.php" class="main_pages_item_link">| MANAGE DECIDED DATA</a></li>
                <li class="main_pages_item"><a href="" class="main_pages_item_link active">| CHANGE PASSWORD DATA FORM</a></li>
            </ul>

            <div class="data_form_wrapper">
                <form action="./viewer_change_password.php" method="POST" class="data_form change_password_form" id="data_form">
                    
                    <div class="data_form_header">
                        <h1 class="data_form_title data_form_add_title">CHANGE PASSWORD DATA FORM</h1>
                        <div class="data_form_label">
                            <span class="data_form_success">
                                <?php 
                                if(isset($_GET['success']))
                                {
                                    echo $_GET['success'];
                                } 
                                
                                ?>
                            </span>
                            <span class="data_form_failure">
                                <?php 
                                if(isset($_GET['failure']))
                                {
                                    echo $_GET['failure'];
                                } 
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="data_form_body">
                        <label for="old_password" class="data_form_input_title">OLD PASSWORD:</label>    
                        <input type="text" class="old_password" id="old_password" name="old_password" placeholder="Old Password..." required/>

                        <label for="new_password" class="data_form_input_title">NEW PASSWORD:</label>    
                        <input type="text" class="new_password" id="new_password" name="new_password" placeholder="New Password..." required/>

                        <button type="submit" class="submit_data_btn add_data_btn" onClick="return confirm('ARE YOU SURE YOU WANT TO CHANGE PASSWORD?')" name="change_password_btn">CHANGE PASSWORD</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
    
    <script src="../assets/js/main.js"></script>
</body>
</html>