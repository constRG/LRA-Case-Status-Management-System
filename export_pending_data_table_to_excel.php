<?php
    require "./connection/conn.php";
    session_start();

    $id = 1;
    $output = '';
    $username = strtoupper($_SESSION['username']);  
    $filename = "LRA_PENDING_DATA_TABLE_".date('(Y/m/d)');
    $action_taken_exported = "EXPORTED";  
    $status = "EXCEL"; 

    if(isset($_POST['export_to_excel_btn']))
    {
        $query = mysqli_query($conn, "SELECT * FROM `lra_data_tb` WHERE status = 'PENDING'");
        if(mysqli_num_rows($query) > 0)
        {
            ?>
                <tr>
                    <td>
                        <?php echo "EXPORTED BY: "; ?>
                        <?php echo $username; ?>
                    </td>
                </tr>
            <?php
            $output .= '
            <table class="data_table">
            <thead class="data_table_head">
                <tr>
                    <td>ID</td>
                    <td>CASE NUMBER</td>
                    <td>RTC BRANCH</td>
                    <td>SUBJECT MATTER</td>
                    <td>JUDICIAL REGION</td>
                    <td>STATUS</td>
                </tr>
            </thead>
            '; 
            while($row=mysqli_fetch_array($query)) {
                $output .= '
                <tbody class="data_table_body">
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$row['case_number'].'</td>
                    <td>'.$row['rtc_branch'].'</td>
                    <td>'.$row['subject_matter'].'</td>
                    <td>'.$row['judicial_region'].'</td>
                    <td>'.$row['status'].'</td>
                </tr>
                </tbody>
                ';
            $id++;
        }   
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=\"$filename.xls\"");
        echo $output;                  
        $query = mysqli_query($conn, "INSERT INTO `users_actions_taken_history` (`username`, `case_type`, `action_taken`, `status`) VALUES ('$username', '$filename', '$action_taken_exported', '$status')");                          
        }
    }
?>