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
    <title>LRA - VIEWER: <?php echo strtoupper($_SESSION['username']); ?> JUDICIAL REGIONS TOTAL NUMBER OF CASES</title>
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
            <li class="main_pages_item"><a href="" class="main_pages_item_link active">| JUDICIAL REGIONS TOTAL NUMBER OF CASES</a></li>
            
        </ul>

     
                <div class="dashboard_judicial_regions_count">

                    <?php require "../judicial_regions_total_number_of_cases_bar_chart.php"; ?>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">NCR</span>
                        <h1 class="judicial_region_item_count"><?php echo $ncr_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 1</span>
                        <h1 class="judicial_region_item_count"><?php echo $region1_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 2</span>
                        <h1 class="judicial_region_item_count"><?php echo $region2_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 3</span>
                        <h1 class="judicial_region_item_count"><?php echo $region3_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 4</span>
                        <h1 class="judicial_region_item_count"><?php echo $region4_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 5</span>
                        <h1 class="judicial_region_item_count"><?php echo $region5_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 6</span>
                        <h1 class="judicial_region_item_count"><?php echo $region6_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 7</span>
                        <h1 class="judicial_region_item_count"><?php echo $region7_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 8</span>
                        <h1 class="judicial_region_item_count"><?php echo $region8_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 9</span>
                        <h1 class="judicial_region_item_count"><?php echo $region9_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 10</span>
                        <h1 class="judicial_region_item_count"><?php echo $region10_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 11</span>
                        <h1 class="judicial_region_item_count"><?php echo $region11_total_number_of_cases ?></h1>
                    </div>

                    <div class="judicial_region_item">
                        <span class="judicial_region_item_title">REGION 12</span>
                        <h1 class="judicial_region_item_count"><?php echo $region12_total_number_of_cases ?></h1>
                    </div>

                </div>
    
        </div>
    </main>
    
    <script src="../assets/js/main.js"></script>
</body>
</html>