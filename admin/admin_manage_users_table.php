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
    <title>LRA - ADMIN: <?php echo strtoupper($_SESSION['username']); ?> MANAGE USERS DATA TABLE</title>
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
                <li class="main_pages_item"><a href="" class="main_pages_item_link active">| MANAGE USERS</a></li>
                <li class="main_pages_item"><a href="./admin_manage_all_data_table.php" class="main_pages_item_link">| MANAGE ALL DATA</a></li>
                <li class="main_pages_item"><a href="./admin_manage_pending_data_table.php" class="main_pages_item_link">| MANAGE PENDING DATA</a></li>
                <li class="main_pages_item"><a href="./admin_manage_decided_data_table.php" class="main_pages_item_link">| MANAGE DECIDED DATA</a></li>
            </ul>

            <div class="data_table_wrapper">

                <div class="data_table_actions">
                    <div></div>
                    <div class="data_table_actions_btn">
                        <a href="./admin_users_actions_taken_history.php" class="add_data_link">USERS ACTIONS TAKEN HISTORY</a>
                        <a href="./admin_add_user_form.php" class="add_data_link">ADD USERS</a>     
                    </div>
                </div>    

                <table class="data_table" id="data_table">
                        <thead class="data_table_head">
                            <tr>
                                <th>USERNAME</th>
                                <th>CLASSIFICATION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="data_table_body">
                            <?php 
                                $limit = 10;  
                                if (isset($_GET["page"])) {
                                    $page  = $_GET["page"]; 
                                } 
                                else { 
                                    $page=1;
                                }
                                $start_from = ($page-1) * $limit;

                                $query = mysqli_query($conn, "SELECT * FROM `users` ORDER BY id DESC LIMIT $start_from, $limit");
                                while($row = mysqli_fetch_array($query))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['classification']; ?></td>
                                            <td  class="data_table_td_actions">
                                                <a href="./admin_delete_user.php?id=<?php echo $row['id'] ?>"  onClick="return confirm ('ARE YOU SURE YOU WANT TO DELETE THIS DATA?')" class="delete_data_btn">DELETE</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                </table>

                <?php  
                    $query = mysqli_query($conn, "SELECT COUNT(*) as case_number FROM `users`"); 
                    $result = mysqli_fetch_row($query);  
                    $total_records = $result[0];  
                    $total_pages = ceil($total_records / $limit); 
                    ?>
                        <ul class="pagination">
                            <?php
                                for ($i=1; $i <= $total_pages; $i++) {
                                    ?>    
                                        <li class="page_item"><a class="page_link" href="./admin_manage_users_table.php?page=<?php echo $i ?>"><?php echo $i ?></a></li> 	
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
    
    <script src="../assets/js/main.js"></script>
</body>
</html>