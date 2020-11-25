<?php
    require_once __DIR__."/autoload/autoload.php"; 
    // _debug($_SESSION);die;
    // unset($_SESSION);
    $customer   =   $db->fetchID("customer", $_SESSION['fashion_customer_id']);
    // _debug($_SESSION['fashion_cart'][36][1]['id']);die;
    // _debug($customer);die;
    if(empty($customer)){
        $_SESSION['error'] = "Mời bạn đăng nhập!";
        redirect("dang-nhap.php");
    }
    if( !isset($_SESSION['fashion_cart']) || count($_SESSION['fashion_cart']) == 0){
        echo "<script>alert('Không có sản phẩm trong giỏ hang, hãy trở về trang chủ để mua hàng!');location.href='index.php'</script>";
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // _debug($_POST);die;
        if($_POST['thanhtoan'] == 2){
            $data = [
                        "id_store"      =>  $_SESSION['id_store'],
                        "id_customer"   =>  $_SESSION['fashion_customer_id'],
                        "amount"        =>  $_SESSION['total'],
                        "customer_name" =>  postInput("name"),
                        "customer_address"  =>  postInput("address"),
                        "customer_phone"    =>  postInput("phone"),
                        "note"          =>  postInput("note"),
                        'created_at'     =>  date('Y-m-d H:i:s', time()),
                        'update_at'     =>  date('Y-m-d H:i:s', time())

            ];
            // _debug($data);die;
            $id_insert  = $db->insert("transaction", $data);
            if($id_insert > 0){
                foreach($_SESSION['fashion_cart'] as $key => $item){
                    foreach($item as $key1 => $item1){
                        $price = (int) $item1['price'];
                        $data2  =   [   
                                        "id_transaction"    =>  $id_insert,
                                        "id_product"        =>  $item1['id'],
                                        "id_store"          =>  $_SESSION['id_store'],
                                        'color'             =>  $item1['color'],
                                        'size'              =>  $item1['size'],
                                        'qty'               =>  $item1['qty'],
                                        "price"             =>  $price,
                                        'created_at'     =>  date('Y-m-d H:i:s', time()),
                                        'update_at'     =>  date('Y-m-d H:i:s', time())
                                    ];
                        $inser_orders   = $db->insert("orders", $data2);
                        if($inser_orders > 0){
                            $sql        =   'SELECT *
                                FROM detail
                                WHERE id_product = '.$item1['id'].'
                                    and size = "'.$item1['size'].'"
                                    AND color = "'.$item1['color'].'"
                                    AND id_store = '.$id_store.'';
                            $id_detail  = $db->fetchsql($sql);
                            $id_detail  = intval($id_detail[0]['id']);
                            $detail  = $db->fetchID("detail", $id_detail);
                            $up_detail  = $db->update("detail", array("number" => $detail['number']-$item1['qty']), array("id" => $id_detail));
                        }
                    }
                }
                // $_SESSION['success'] = "Lưu thông tin đơn hàng thành công!";
                echo "<script>alert('Lưu thông tin đơn hàng thành công!');location.href='thong-bao.php'</script";
            }
        }else if($_POST['thanhtoan'] == 1){
            $_SESSION['data'] = [
                "id_store"      =>  $_SESSION['id_store'],
                "id_customer"   =>  $_SESSION['fashion_customer_id'],
                "amount"        =>  $_SESSION['total'],
                "customer_name" =>  postInput("name"),
                "payment"       =>  1,
                "customer_address"  =>  postInput("address"),
                "customer_phone"    =>  postInput("phone"),
                "note"          =>  postInput("note"),
                'created_at'     =>  date('Y-m-d H:i:s', time()),
                'update_at'     =>  date('Y-m-d H:i:s', time())

                    ];
            // $_SESSION[$data];
            echo "<script>location.href='thanh-toan-online.php'</script";
        }
    }
?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./gio-hang.php">Giỏ hàng</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" method="POST" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Thông tin người nhận</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Họ và tên<span>*</span></label>
                                <input type="text" id="name" name="name" placeholder="123" value="<?php echo $customer['name']; ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Địa chỉ<span>*</span></label>
                                <input type="text" id="address" name="address" value="<?php echo $customer['address']; ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email<span>*</span></label>
                                <input type="text" id="email" name="email" value="<?php echo $customer['email']; ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Sdt<span>*</span></label>
                                <input type="text" id="phone" name="phone" value="<?php echo $customer['phone']; ?>">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" id="note" name="note" placeholder="Ghi chú">
                            </div>
                        </div>
                        
                        
                        <!-- <div class="row">
                            <div class="col-lg-12">
                                <input type="radio" id="online" name="thanhtoan" value="1" style="width: 20% !important;height: 25px !important; ">
                                <label for="1">Thanh toán online</label>
                            </div>
                            <div class="col-lg-12">
                                <input type="radio" id="ofline" name="thanhtoan" value="2" style="width: 20% !important;height: 25px !important;">
                                <label for="2">Thanh toán khi giao hàng</label>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Tên sản phẩm <span>Tổng tiền</span></li>
                                <?php foreach($_SESSION['fashion_cart'] as $key => $item) : ?>
                                    <?php foreach($item as $key1 => $item1) : ?>
                                        <li class="fw-normal"><?php echo $item1['name'].' * '. $item1['qty']; ?><span><?php echo formatPrice($item1['price']); ?></span></li>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                    <li class="fw-normal">Tổng tiền hàng <span><?php echo formatPrice($_SESSION['sum']); ?></span></li>
                                    <li class="fw-normal">Giảm giá<span><?php echo formatPrice($_SESSION['sum']-$_SESSION['total']); ?></span></li>
                                    <li class="total-price">Tổng số tiền <span><?php echo formatPrice($_SESSION['total']); ?></span></li>
                                </ul>
                                <h4>Phương thức thanh toán</h4>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán online
                                            <input type="radio" id="pc-check" name="thanhtoan" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Thanh toán khi nhận hàng
                                            <input type="radio" id="pc-paypal" name="thanhtoan" value="2">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo public_frontend() ?>img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo public_frontend() ?>img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo public_frontend() ?>img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo public_frontend() ?>img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo public_frontend() ?>img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php require_once __DIR__."/layouts/footer.php"; ?>