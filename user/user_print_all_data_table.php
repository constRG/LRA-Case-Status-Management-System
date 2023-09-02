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
    <title>LRA - USER: <?php echo strtoupper($_SESSION['username']); ?> PRINT ALL DATA TABLE</title>
</head>
<body onLoad="print()">

    <main class="main" id="main">
        <div class="main_wrapper">

        <div class="data_table_wrapper">
            <div class="data_table_actions">
                <a href="./user_manage_all_data_table.php" class="cancel_print_link">CANCEL</a>
            </div>

                <table class="data_table" id="data_table">
                    <thead class="data_table_head">
                        <tr>
                            <th>CASE NUMBER</th>
                            <th>RTC - BRANCH</th>
                            <th>SUBJECT MATTER</th>
                            <th>JUDICIAL REGION</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="data_table_body">
                        <?php 
                            $query = mysqli_query($conn, "SELECT * FROM `lra_data_tb` ORDER BY id DESC");
                            while($row = mysqli_fetch_array($query)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['case_number']; ?></td>
                                        <td><?php echo $row['rtc_branch']; ?></td>
                                        <td><?php echo $row['subject_matter']; ?></td>
                                        <td><?php echo $row['judicial_region']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                    </tr>
                                <?php
                            }
                        ?>        
                    </tbody>
                </table>

            </div>
            
        </div>
    </main>

    <div class="scroll_up_wrapper">
        <img src="../assets/images/arrow_up.png" class="arrow_up_icon" alt="arrow_up_icon">
    </div>
    
    <script src="../assets/js/main.js"></script>
</body>
</html>