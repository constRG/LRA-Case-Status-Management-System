<?php
    session_start();
    $_SESSION['status'] = 'invalid';
    header("location: index.php");
?>