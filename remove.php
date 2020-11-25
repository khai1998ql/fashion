<?php
    require_once __DIR__."/autoload/autoload.php"; 
    $key    = intval(getInput('key'));
    $id     = intval(getInput('id'));
    unset($_SESSION['fashion_cart'][$id][$key]);
    if(empty($_SESSION['fashion_cart'][$id])){
        unset($_SESSION['fashion_cart'][$id]);
    }
    $_SESSION['success'] = "Xóa sản phẩm trong  giỏ hàng thành công!!!";
    header("location: gio-hang.php");
?>