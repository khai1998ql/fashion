<?php
    require_once __DIR__."/autoload/autoload.php";
    $id  =   intval(getInput('id'));
    $key = intval(getInput('key'));
    $qty = intval(getInput('qty'));
    //kiemtra xemsoluong nguoi dung mua co lon hon so luong trong gio hang khong?
    $_SESSION['fashion_cart'][$id][$key]['qty'] = $qty;
    echo 1;
?>