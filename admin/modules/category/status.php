<?php
    require_once __DIR__."/../../autoload/autoload.php"; 
    $open   = 'category';
    $id     = intval(getInput('id'));
    $StatusCategory = $db->fetchID('category',$id);
    if(empty($StatusCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin('category');
    }else{
        $status = ($StatusCategory['status'] == 1) ? 0 : 1;
        $update = $db->update('category', array("status" => $status), array("id" => $id));
        if($update > 0){
            $_SESSION['success'] = "Cập nhật trạng thái thành công!";
            redirectAdmin('category');
        }else{
            $_SESSION['error'] = "Cập nhật trạng thái thất bại!";
            redirectAdmin('category');
        }
    }
?>