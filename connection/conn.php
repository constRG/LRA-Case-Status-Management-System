<?php
    $conn = mysqli_connect("localhost", "root", "05242001", "lra_db");
    if(mysqli_connect_errno()) 
    {
        echo "Failed to connect!" . mysqli_connect_error();
    }
    // else 
    // {
    //     echo "CONNECTED!";
    // }
?>