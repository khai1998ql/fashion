<?php   
    require_once __DIR__ ."/../../autoload/autoload.php";
    $id = intval(getInput('id'));
    // _debug($id);die;
    $transaction = $db->fetchID('transaction', $id);
    // _debug($transaction);die;
    if(empty($transaction)){
        $_SESSION['error'] = "Dữ  liệu không tồn tại!";
        redirectAdmin('transaction');
    }else{
        $delete = $db->delete('transaction', $id);
        if($delete > 0){
            $_SESSION['success'] = 'Xóa đơn hàng thành công!';
            redirectAdmin('transaction');
        }
    }
?>