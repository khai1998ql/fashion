<?php
    require_once __DIR__."/autoload/autoload.php";
    // _debug($_POST);die;
    unset($_SESSION['fashion_cart']);
    unset($_SESSION['total']);
    unset($_SESSION['sum']);
    if(isset($_SESSION['data'])){
        unset($_SESSION['data']);
    }
    redirect("index.php");
?>
?>