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
    <title>LRA - USER: <?php echo strtoupper($_SESSION['username']); ?> ADD DATA FORM</title>
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
                <li class="main_pages_item"><a href="" class="main_pages_item_link active">| ADD DATA FORM</a></li>
            </ul>
            
            <div class="data_form_wrapper">

                <form action="" method="POST" class="data_form" id="data_form">
                    <div class="data_form_header">
                        <h1 class="data_form_title data_form_add_title">ADD DATA FORM</h1>
                        <div class="data_form_label">
                            <span class="data_form_error"></span>
                        </div>
                    </div>

                    <div class="data_form_body">
                    <label for="case_number" class="data_form_input_title">CASE NUMBER:</label> 
                        <input type="text" class="case_number" id="case_number" name="case_number" placeholder="Case Number..." required>
                        <br>

                        <label for="rtc_branch" class="data_form_input_title">RTC BRANCH:</label>  
                        <textarea class="rtc_branch" id="rtc_branch" name="rtc_branch" rows="3" placeholder="RTC Branch..." required></textarea>
                        <br>

                        <label for="subject_matter" class="data_form_input_title">SUBJECT MATTER:</label>    
                        <textarea class="subject_matter" id="subject_matter" name="subject_matter" rows="5" placeholder="Subject Matter..." required></textarea>
                        <br>
                        
                        <label for="type_of_document" class="data_form_input_title">TYPE OF DOCUMENT:</label>
                        <input type="text" class="type_of_document" id="type_of_document" name="type_of_document" placeholder="Type of Document..." required>
                        <br>
                        
                        <label for="judicial_region" class="data_form_input_title">REGIONS:</label>
                        <select class="judicial_region" id="judicial_region" name="judicial_region">
                            <option value="NCR" class="judicial_region_option_item">NCR</option>
                            <option value="REGION 1" class="judicial_region_option_item">REGION 1</option>
                            <option value="REGION 2" class="judicial_region_option_item">REGION 2</option>
                            <option value="REGION 3" class="judicial_region_option_item">REGION 3</option>
                            <option value="REGION 4" class="judicial_region_option_item">REGION 4</option>
                            <option value="REGION 5" class="judicial_region_option_item">REGION 5</option>
                            <option value="REGION 6" class="judicial_region_option_item">REGION 6</option>
                            <option value="REGION 7" class="judicial_region_option_item">REGION 7</option>
                            <option value="REGION 8" class="judicial_region_option_item">REGION 8</option>
                            <option value="REGION 9" class="judicial_region_option_item">REGION 9</option>
                            <option value="REGION 10" class="judicial_region_option_item">REGION 10</option>
                            <option value="REGION 11" class="judicial_region_option_item">REGION 11</option>
                            <option value="REGION 12" class="judicial_region_option_item">REGION 12</option>
                        </select>

                        <button type="submit" class="submit_data_btn add_data_btn" onClick="return confirm('ARE YOU SURE YOU WANT TO ADD THIS DATA?')" name="add_data_btn">ADD DATA</button>
                    </div>
                </form>
                
            </div>
        </div>
    </main>

    <?php
    
    if(isset($_POST['add_data_btn']))
    {
        $username = trim(strtoupper($_SESSION['username']));
        
        $case_number = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['case_number'])));
        $rtc_branch = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['rtc_branch'])));
        $subject_matter = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['subject_matter'])));
        $type_of_document = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['type_of_document'])));
        $judicial_region = trim(strtoupper($_POST['judicial_region']));
        $action_taken_added = "ADDED";
        $status = "";

        
        $query = mysqli_query($conn, "SELECT case_number FROM `lra_data_tb` WHERE case_number = '$case_number'");
       
        if(mysqli_num_rows($query) != 0)
        {
            ?>
                <script>
                    const data_form_error = document.querySelector(".data_form_error");
                    data_form_error.textContent = "CASE NUMBER ALREADY EXISTS!";
                </script>
            <?php
        }
        else if
        (
            $type_of_document == "CADASTRAL"
            || $type_of_document == "SUPPLEMENTAL"
            || $type_of_document == "PETITION"
            || $type_of_document == "ORDER"
            || $type_of_document == "FORMAL ENTRY"
            || $type_of_document == "RESOLUTION"
            || $type_of_document == "CONSTANCIA"
            || $type_of_document == "AFFIDAVIT"
            || $type_of_document == "MOTION"
            || $type_of_document == "FORMAL ORDER OF EVIDENCE"
            || $type_of_document == "MANIFESTATION"
            || $type_of_document == "NOTICE"
            || $type_of_document == "PUBLICATION"
            || $type_of_document == "JUDICIAL AFFIDAVIT"
            || $type_of_document == "LETTER"
            || $type_of_document == "OPPOSITION"
            || $type_of_document == "SUBMISSION"
            || $type_of_document == "FORMAL OFFER"
            || $type_of_document == "MEMORANDUM"
            || $type_of_document == "COVERING LETTER"
            || $type_of_document == "CERTIFICATE"    
            || $type_of_document == "N/A"        
        )
        { 
            $status = "PENDING";
            $query = mysqli_query($conn, "INSERT INTO `lra_data_tb`(`case_number`, `rtc_branch`, `subject_matter`, `type_of_document`, `judicial_region`, `status`) VALUES ('$case_number', '$rtc_branch', '$subject_matter', '$type_of_document', '$judicial_region', '$status')");
            $query1 = mysqli_query($conn, "INSERT INTO `users_actions_taken_history` (`username`, `case_type`, `action_taken`, `status`) VALUES ('$username', '$case_number', '$action_taken_added', '$status')");
            ?>
            <script>
               location.href = "./user_manage_pending_data_table.php";
            </script>
            <?php
        }
        else if
        (
            $type_of_document == "DECISION"
            || $type_of_document == "CERTIFICATE OF FINALITY"
            || $type_of_document == "ISSUANCE OF DECREE"
            || $type_of_document == "WRIT OF EXECUTION"
        )
        {
            $status = "DECIDED";
            $query = mysqli_query($conn, "INSERT INTO `lra_data_tb`(`case_number`, `rtc_branch`, `subject_matter`, `type_of_document`, `judicial_region`, `status`) VALUES ('$case_number', '$rtc_branch', '$subject_matter', '$type_of_document', '$judicial_region', '$status')");
            $query1 = mysqli_query($conn, "INSERT INTO `users_actions_taken_history` (`username`, `case_type`, `action_taken`, `status`) VALUES ('$username', '$case_number', '$action_taken_added', '$status')");
            ?>
            <script>
               location.href = "./user_manage_decided_data_table.php";
            </script>
            <?php
        }
        else {
            ?>
                <script>
                    const data_form_error = document.querySelector(".data_form_error");
                    data_form_error.textContent = "TYPE OF DOCUMENT ERROR!";
                </script>
            <?php
        }
    }

    ?>
    
    <script src="../assets/js/main.js"></script>
</body>
</html>