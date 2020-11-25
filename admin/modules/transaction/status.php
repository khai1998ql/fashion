<?php
    require_once __DIR__."/../../autoload/autoload.php";
    $open   = 'transaction';
    $id     = intval(getInput('id'));
    $Statustransaction = $db->fetchID('transaction',$id);
    if(empty($Statustransaction)){
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin('transaction');
    }elseif($EditTransaction['status'] == 1){
        $_SESSION['error'] = "Đơn hàng đã được xử lý!";
        redirectAdmin("transaction");
    }else{
        $status = 1;
        $payment = 1;
        $update = $db->update("transaction", array("status" => $status, "payment" => 1), array("id" => $id));
        if($update > 0){
            $_SESSION['success'] = "Cập nhật thành công thành công!";
            $sql = "SELECT * FROM orders WHERE id_transaction = $id";
            $order = $db->fetchsql($sql);
            // _debug($order);die;
            foreach($order as $item){
                $idproduct  = intval($item['id_product']);
                $size       = $item['size'];
                $color      = $item['color'];
                $product    = $db->fetchID("product", $idproduct);
                $up_pro     = $db->update("product", array("pay"=>$product['pay']+$item['qty']), array("id" => $idproduct));
                // $sql        =   'SELECT *
                //                 FROM detail
                //                 WHERE id_product = '.$idproduct.'
                //                     and size = "'.$size.'"
                //                     AND color = "'.$color.'"';
                // $id_detail  = $db->fetchsql($sql);
                // $id_detail  = intval($id_detail[0]['id']);
                // $detail  = $db->fetchID("detail", $id_detail);
                // $up_detail  = $db->update("detail", array("number" => $detail['number']-$item['qty']), array("id" => $id_detail));
                // _debug($id_detail);die;
            }
            // _debug($Order);die;
            redirectAdmin("transaction");
        }else{
            //thêm thất bại
            $_SESSION['error'] = "Dữ liệu không thay đổi!";
            redirectAdmin("transaction");
        }
    }
?>