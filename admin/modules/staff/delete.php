<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    $open = "staff";
    $staff = $db->fetchAll("staff", $_SESSION['id_store_admin']);
    $id = intval(getInput('id'));
    $EditStaff   =   $db->fetchID($open, $id);
    if(empty($EditStaff)){
        $_SESSION['error']  =   "Dữ liệu không tồn tại!";
        redirectAdmin("staff");
    }else{
        $delete = $db->delete($open, $id);
        if($delete > 0){
            $_SESSION['success'] = "Xóa nhân viên thành công!";
            redirectAdmin($open);
        }else{
            $_SESSION['error'] = "Xóa nhân viên thất bại!";
            redirectAdmin($open);
        }
    }
    
    
?>