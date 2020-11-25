<?php
    session_start();
    unset($_SESSION['fashion_customer_id']);
    unset($_SESSION['fashion_customer_name']);
    header("location:index.php");
?>