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
    <title>LRA - ADMIN: <?php echo strtoupper($_SESSION['username']); ?> MANAGE ALL DATA TABLE</title>
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
                <li class="main_pages_item"><a href="" class="main_pages_item_link active">| MANAGE ALL DATA</a></li>
                <li class="main_pages_item"><a href="./admin_manage_pending_data_table.php" class="main_pages_item_link">| MANAGE PENDING DATA</a></li>
                <li class="main_pages_item"><a href="./admin_manage_decided_data_table.php" class="main_pages_item_link">| MANAGE DECIDED DATA</a></li>
            </ul>

            <div class="data_table_wrapper">

                <div class="data_table_actions">
                    <form action="#" method="POST" class="data_table_actions_search_data">
                        <input type="text" name="search_data" class="search_data" placeholder="Search Case Number or Subject Matter..." required>
                        <button type="submit" name="search_data_btn" class="search_data_btn">SEARCH</button>
                    </form>
                    <div class="data_table_actions_btn">
                        <a href="./admin_add_data_form.php" class="add_data_link">ADD DATA</a>
                        <form action="../export_all_data_table_to_excel.php" method="POST">
                            <button type="submit" name="export_to_excel_btn" class="export_to_excel_btn">EXPORT TO EXCEL</button>
                        </form>
                        <a href="./admin_print_all_data_table.php" class="print_btn">PRINT</a>
                    </div>
                    
                </div>  

                <table class="data_table" id="data_table">
                    <thead class="data_table_head">
                        <tr>
                            <th>CASE NUMBER</th>
                            <th>RTC - BRANCH</th>
                            <th>SUBJECT MATTER</th>
                            <th>JUDICIAL REGION</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="data_table_body">
                        <?php 
                            $limit = 1000;  
                            if (isset($_GET["page"])) {
                                $page  = $_GET["page"]; 
                            } 
                            else { 
                                $page=1;
                            }
                            $start_from = ($page-1) * $limit;

                            if(isset($_POST['search_data_btn']))
                            {
                                $search_data = trim(mysqli_real_escape_string($conn, $_POST['search_data']));
                                $query = mysqli_query($conn, "SELECT * FROM `lra_data_tb` WHERE CONCAT(case_number, subject_matter) LIKE '%$search_data%'");
                                if(mysqli_num_rows($query) == 0)
                                {
                                    ?>
                                        <td class="no_result_found">NO RESULT FOUND!</td>
                                        <td></td>
                                        <td class="no_result_found">NO RESULT FOUND!</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    <?php
                                }
                            }
                            
                            else

                            $query = mysqli_query($conn, "SELECT * FROM `lra_data_tb` ORDER BY id DESC LIMIT $start_from, $limit");
                            while($row = mysqli_fetch_array($query)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['case_number']; ?></td>
                                        <td><?php echo $row['rtc_branch']; ?></td>
                                        <td><?php echo $row['subject_matter']; ?></td>
                                        <td><?php echo $row['judicial_region']; ?></td>
                                        <?php
                                            if($row['status'] == 'PENDING') {
                                                ?>
                                                    <td class="pending_status"><?php echo $row['status']; ?></td>
                                                <?php
                                            }
                                            else if ($row['status'] == 'DECIDED') {
                                                ?>
                                                    <td class="decided_status"><?php echo $row['status']; ?></td>
                                                <?php
                                            }
                                        ?>
                                        <td  class="data_table_td_actions">
                                            <a href="./admin_update_data_form.php?id=<?php echo $row["id"] ?>" class="update_data_link">UPDATE</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>        
                    </tbody>
                </table>

                <?php  
                    $query = mysqli_query($conn, "SELECT COUNT(*) as case_number FROM `lra_data_tb`"); 
                    $result = mysqli_fetch_row($query);  
                    $total_records = $result[0];  
                    $total_pages = ceil($total_records / $limit); 
                    ?>
                        <ul class="pagination">
                            <?php
                                for ($i=1; $i <= $total_pages; $i++) {
                                    ?>    
                                        <li class="page_item"><a class="page_link" href="./admin_manage_all_data_table.php?page=<?php echo $i ?>"><?php echo $i ?></a></li> 	
                                    <?php
                                }
                            ?>
                        </ul>
                        <h1 class="table_page_no">PAGE <?php echo $page ?></h1>
                    <?php 
                ?>
                
            </div>            
            
        </div>
    </main>

    <div class="scroll_up_wrapper">
        <img src="../assets/images/arrow_up.png" class="arrow_up_icon" alt="arrow_up_icon">
    </div>
    
    <script src="../assets/js/main.js"></script>
</body>
</html>