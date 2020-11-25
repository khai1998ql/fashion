<?php
    require_once __DIR__."/../../autoload/autoload.php"; 
    $open   = "category";
    $id     = intval(getInput("id"));
    $KeyCategory    = $db->fetchID($open,$id);
    if(empty($KeyCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin($open);
    }else{
        $key = ($KeyCategory['key'] == 1) ? 0 : 1;
        $update = $db->update($open, array("key"=>$key), array("id"=>$id));
        if($update > 0){
            $_SESSION['success'] = "Cập nhật key thành công!";
            redirectAdmin($open);
        }else{
            $_SESSION['error'] = "Cập nhật key thất bại!";
            redirectAdmin($open);
        }
    }
?>