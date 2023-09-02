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
    <title>LRA - ADMIN: <?php echo strtoupper($_SESSION['username']); ?> USERS ACTIONS TAKEN HISTORY</title>
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
                <li class="main_pages_item"><a href="" class="main_pages_item_link active">| USERS ACTIONS TAKEN HISTORY</a></li>
            </ul>

            <div class="data_table_wrapper">

                <table class="data_table" id="data_table">
                    <thead class="data_table_head">
                        <tr>
                            <th>USERS ACTIONS TAKEN HISTORY</th>
                        </tr>
                    </thead>
                    <tbody class="data_table_body">
                        <?php 
                            $limit = 100;  
                            if (isset($_GET["page"])) {
                                $page  = $_GET["page"]; 
                            } 
                            else { 
                                $page=1;
                            }
                            $start_from = ($page-1) * $limit;

                            $query = mysqli_query($conn, "SELECT * FROM `users_actions_taken_history` ORDER BY id DESC LIMIT $start_from, $limit");
                            while($row = mysqli_fetch_array($query)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['username'];?> <b><?php echo $row['action_taken'];?></b> <?php echo $row['case_type'];?> TO <b><?php echo $row['status'];?></b> </td>
                                    </tr>
                                <?php
                            }
                        ?>        
                    </tbody>
                </table>

                <?php  
                    $query = mysqli_query($conn, "SELECT COUNT(*) as username FROM `users_actions_taken_history`"); 
                    $result = mysqli_fetch_row($query);  
                    $total_records = $result[0];  
                    $total_pages = ceil($total_records / $limit); 
                    ?>
                        <ul class="pagination">
                            <?php
                                for ($i=1; $i <= $total_pages; $i++) {
                                    ?>    
                                        <li class="page_item"><a class="page_link" href="./admin_users_actions_history.php?page=<?php echo $i ?>"><?php echo $i ?></a></li> 	
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