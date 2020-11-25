<?php
    session_start();
    date_default_timezone_set('asia/ho_chi_minh');
    require_once __DIR__."/../libraries/Database.php";
    require_once __DIR__."/../libraries/Function.php";
    $db = new Database();
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/fashion/public/uploads/");
    if(!isset($_SESSION['fashion_store'])){
        $_SESSION['id_store']   = 1;
    }else{
        $_SESSION['id_store'] = $_SESSION['fashion_store'];
    }
    $id_store = $_SESSION['id_store'];
    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
    $productNew = $db->fetchsql($sqlNew);

    $sqlPay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 10";
    $productPay = $db->fetchsql($sqlPay);
    //  Hiển thị tổng tiền trong giỏ hàng
    
    if(isset($_SESSION['total'])){
        $tien = $_SESSION['total'];
    }else{
        $tien = 0;
    }
    // _debug($productPay);die;
?>