<?php
    session_start();
    date_default_timezone_set('asia/ho_chi_minh');
    require_once __DIR__."/../../libraries/Database.php";
    require_once __DIR__."/../../libraries/Function.php";
    $db = new Database();
    if(!isset($_SESSION['fashion_admin'])){
        $_SESSION['id_store_admin']   = 1;
    }else{
        $_SESSION['id_store_admin'] = $_SESSION['fashion_admin'];
    }
    // if(!isset($_SESSION['admin_id'])){
    //     header("location:/qldh/login/");
    // }
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/fashion/public/uploads/");
?>