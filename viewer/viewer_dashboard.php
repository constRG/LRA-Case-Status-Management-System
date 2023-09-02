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
    <link rel="stylesheet" href="../assets/libs/aos/aos.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>LRA - VIEWER: <?php echo strtoupper($_SESSION['username']); ?> DASHBOARD</title>
</head>
<body>
    
    <?php require "./viewer_header.php"; ?>

    <main class="main" id="main">
    <div class="main_wrapper">
        <ul class="main_pages">
            <li class="main_pages_item">
                <a href="" class="main_pages_item_link active">
                    <?php echo strtoupper($_SESSION['username']); ?> DASHBOARD
                </a>
                <li class="main_pages_item"><a href="./viewer_view_all_data_table.php" class="main_pages_item_link">| VIEWER VIEW ALL DATA</a></li>
                <li class="main_pages_item"><a href="./viewer_view_pending_data_table.php" class="main_pages_item_link">| VIEWER VIEW PENDING DATA</a></li>
                <li class="main_pages_item"><a href="./viewer_view_decided_data_table.php" class="main_pages_item_link">| VIEWER VIEW DECIDED DATA</a></li>
            </li>
        </ul>

        <div class="dashboard">
            <div class="dashboard_wrapper">
                
                <a href="./viewer_view_judicial_regions_total_number_of_cases.php">
                    <div class="judicial_regions_bar_chart_wrapper">
                        <canvas id="judicial_regions_bar_chart"></canvas>
                    </div>
                    <?php require "../judicial_regions_total_number_of_cases_bar_chart.php"; ?>
                </a>
                
                <div class="dashboard_menu viewer_dashboard_menu">

                    <div class="dashboard_menu_item dashboard_menu_item_manage_data_table viewer_dashboard_menu_item_manage_data_table">
                        <div class="dashboard_menu_item_content">
                            <a href="./viewer_view_all_data_table.php"><h1 class="dashboard_menu_item_content_title dashboard_menu_item_view_all_data_table_title">VIEW ALL DATA</h1></a>
                        </div>
                    </div>

                    <div class="dashboard_menu_item dashboard_menu_item_pending">
                        <div class="dashboard_menu_item_content">
                            <a href="./viewer_view_pending_data_table.php"><span class="dashboard_menu_item_content_title">NO. OF PENDING</span></a>
                            <?php
                                $pending_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE status = 'PENDING'"); 
                                $pending_result = mysqli_fetch_array($pending_query);
                                $pending_count = $pending_result['status'];
                                ?>
                                    <h1 class="dashboard_menu_item_content_count" data-aos="fade-right" data-aos-duration="1000"><?php echo $pending_count ?></h1>
                                <?php
                            ?>
                        </div>
                    </div>

                    <div class="dashboard_menu_item dashboard_menu_item_decided">
                        <div class="dashboard_menu_item_content">
                            <a href="./viewer_view_decided_data_table.php"><span class="dashboard_menu_item_content_title">NO. OF DECIDED</span></a>
                            <?php
                                $decided_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE status = 'DECIDED'"); 
                                $decided_result = mysqli_fetch_array($decided_query);
                                $decided_count = $decided_result['status'];
                                ?>
                                    <h1 class="dashboard_menu_item_content_count" data-aos="fade-right" data-aos-duration="1000"><?php echo $decided_count ?></h1>
                                <?php
                            ?>
                        </div>
                    </div>

                    <div class="dashboard_menu_item dashboard_menu_item_total_cases">
                        <div class="dashboard_menu_item_content">
                        <a href="./viewer_view_all_data_table.php"><span class="dashboard_menu_item_content_title dashboard_menu_item_content_total_cases_title">TOTAL CASES</span></a>
                            <?php 
                                $total_cases_query = mysqli_query($conn, "SELECT COUNT(*) as id FROM `lra_data_tb`"); 
                                $total_cases_result = mysqli_fetch_array($total_cases_query);
                                $total_cases_count = $total_cases_result['id'];
                                ?>
                                    <h1 class="dashboard_menu_item_content_count" data-aos="fade-right" data-aos-duration="1000"><?php echo $total_cases_count ?></h1>
                                <?php
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </main>

    
    <script src="../assets/js/main.js"></script>
    <script src="../assets/libs/aos/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>