<?php
    require "../connection/conn.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM `users` WHERE id = '$id'");
    header("location: ./admin_manage_users_table.php?success=Successfully Deleted!");
?>