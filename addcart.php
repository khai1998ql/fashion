<?php
    require_once __DIR__ ."/autoload/autoload.php";
    // _debug($_POST);die;
    $link = $_SESSION['link'];
    if(!isset($_SESSION['fashion_customer_id'])){
        echo    "<script>
                    alert('Bạn hãy đăng nhập tài khoản trước khi mua hàng!');
                    location.href='dang-nhap.php';
                </script>";
    }else{
        $id = intval(getInput("id"));
        $product    = $db->fetchID("product", $id);
        
        if(!empty($product)){
            //  Kiểm tra xem có giỏ hàng chưa
            $qty    = 1;
            $color  = '';
            $size   = '';
            if(isset($_POST) && (!isset($_POST['color']) || !isset($_POST['size']))){
                // _debug($_POST);die;
                echo    "<script>
                        alert('Thêm sản phẩn thất bại,mời bạn chọn màu sắc và kích thước!');
                        location.href='$link';
                    </script>";
            }else{
                $qty    = $_POST['soluong'];
                $color  = $_POST['color'];
                $size   = $_POST['size'];
                $sql        =   'SELECT id
                            FROM detail
                            WHERE id_product = '.$id.'
                                and size = "'.$size.'"
                                AND color = "'.$color.'"
                                and id_store = '.$id_store.'';
                $id_detail  = $db->fetchsql($sql);
                $id_detail  = intval($id_detail[0]['id']);
                $detail  = $db->fetchID("detail", $id_detail);
                // _debug($detail);die;
                $error = true;
                if(empty($detail) || $detail['number'] <= 0){
                    $error = false;
                    echo    "<script>
                        alert('Sản phẩm đang hết hàng,mời bạn loại khác!');
                        location.href='gio-hang.php';
                    </script>";
                }else if($detail['number'] < $qty){
                    $qty = $detail['number'];
                    echo    "<script>
                        alert('Bạn chỉ được mua giới hạn!');
                    </script>";
                }
                if($error == true){
                    $count = 1;
                    $temp = 1;
                    if(!isset($_SESSION['fashion_cart'][$id])){
                        $_SESSION['fashion_cart'][$id][$count]['id']        = $id;
                        $_SESSION['fashion_cart'][$id][$count]['key']       = $count;
                        $_SESSION['fashion_cart'][$id][$count]['name']      = $product['name'];
                        $_SESSION['fashion_cart'][$id][$count]['avatar']    = $product['avatar'];
                        $_SESSION['fashion_cart'][$id][$count]['qty']       = $qty;
                        $_SESSION['fashion_cart'][$id][$count]['color']     = $color;
                        $_SESSION['fashion_cart'][$id][$count]['size']      = $size;
                        $_SESSION['fashion_cart'][$id][$count]['price']     = $product['price'];
                        $_SESSION['fashion_cart'][$id][$count]['sale']     = $product['sale'];
                    }else{
                        $result = false;
                        foreach($_SESSION['fashion_cart'][$id] as $key => $item){
                            if($item['color'] == $color && $item['size'] == $size){
                                $result = true;
                                $temp = $key;
                            }
                            if($count < $key){
                                $count = $key;
                            }
                        }
                        if($result == true){
                            $_SESSION['fashion_cart'][$id][$temp]['qty'] += $qty;
                        }else{
                            $count++;
                            $_SESSION['fashion_cart'][$id][$count]['id']        = $id;
                            $_SESSION['fashion_cart'][$id][$count]['key']       = $count;
                            $_SESSION['fashion_cart'][$id][$count]['name']      = $product['name'];
                            $_SESSION['fashion_cart'][$id][$count]['avatar']    = $product['avatar'];
                            $_SESSION['fashion_cart'][$id][$count]['qty']       = $qty;
                            $_SESSION['fashion_cart'][$id][$count]['color']     = $color;
                            $_SESSION['fashion_cart'][$id][$count]['size']      = $size;
                            $_SESSION['fashion_cart'][$id][$count]['price']     = $product['price'];
                            $_SESSION['fashion_cart'][$id][$count]['sale']     = $product['sale'];
                        }
                    }
                }
                // _debug($_SESSION['fashion_cart']);
                $_SESSION['total'] = 0;
                $sum = 0;
                $sumsale = 0;
                foreach($_SESSION['fashion_cart'] as $item){
                    foreach($item as $item1){
                        $sum += ($item1['price'] * $item1['qty']);
                        $sumsale += ($item1['sale'] / 100) * ($item1['price'] * $item1['qty']);
                        $_SESSION['sum'] = $sum;
                        $_SESSION['total'] = ($sum - $sumsale);
                    }
                }
                
            }
            
            
            // else if(isset($_SESSION['fashion_cart'][$id]) && $_SESSION['fashion_cart'][$id][$count]['color'] == $color && $_SESSION['fashion_cart'][$id][$count]['size'] == $size){
            //     $_SESSION['fashion_cart'][$id][$count]['qty']       += $qty;
            // }else{
            //     ++$count;
            //     $_SESSION['fashion_cart'][$id][$count]['name']      = $product['name'];
            //     $_SESSION['fashion_cart'][$id][$count]['avatar']    = $product['avatar'];
            //     $_SESSION['fashion_cart'][$id][$count]['qty']       = $qty;
            //     $_SESSION['fashion_cart'][$id][$count]['color']     = $color;
            //     $_SESSION['fashion_cart'][$id][$count]['size']      = $size;
            //     $_SESSION['fashion_cart'][$id][$count]['price']     = $product['price'];
            //     $_SESSION['fashion_cart'][$id][$count]['sale']     = $product['sale'];
            // }
        }
        echo    "<script>
                        alert('Thêm sản phẩn thành công!');
                        location.href='gio-hang.php';
                    </script>";
        
    }
    // _debug($_SESSION['fashion_cart']);die;
?>