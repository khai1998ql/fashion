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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // _debug($_POST);die;
        $data = [
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
        $error = [];
        $number = postInput('number');
        $month  = postInput('month');
        $year   = postInput('year');
        $name   = postInput('name');
        if($number == ''){
            $error['number'] = "Mời bạn nhập số thẻ!";
        }
        if($month == ''){
            $error['month'] = "Mời bạn nhập tháng phát hành thẻ!";
        }
        if($year == ''){
            $error['year'] = "Mời bạn nhập năm phát hành thẻ!";
        }
        if($name == ''){
            $error['name'] = "Mời bạn nhập tên in trên thẻ!";
        }
        if(strlen($number) != 10 && $number != ''){
            $error['number'] = 'Mời bạn nhập đúng số thẻ!';
        }
        if(empty($error)){
            // _debug($data);die;
            $id_insert  = $db->insert("transaction", $_SESSION['data']);
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
                echo "<script>alert('Thanh toán đơn hàng thành công!');location.href='thong-bao.php'</script";
            }
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
                        <a href="./thanh-toan.php">Thanh toán</a>
                        <span>Thanh toán online</span>
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
                        <div class="place-order">
                            <h4>Mời bạn chọn một ngân hàng</h4>
                            <div class="order-total">
                                <div class="row">
                                    <img src="<?php echo base_url(); ?>public/nganhang/nganhang.png" alt="Ngân hàng">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                        <h4>Mời bạn nhập thông tin thẻ</h4>
                            <div class="order-total">
                                <div class="col-lg-12">
                                    <label for="fir">Số thẻ<span>*</span></label>
                                    <input type="text" id="number" name="number" placeholder="1234567890" value="">
                                    <?php if(isset($error['number'])) : ?>
                                        <p class="text-danger"><?php echo $error['number']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12">
                                    <label for="month">Tháng phát hành<span>*</span></label>
                                    <input type="text" id="month" name="month" value="" placeholder="Tháng">
                                    <?php if(isset($error['month'])) : ?>
                                        <p class="text-danger"><?php echo $error['month']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12">
                                    <label for="year">Năm phát hành<span>*</span></label>
                                    <input type="text" id="year" name="year" value="" placeholder="Năm">
                                    <?php if(isset($error['year'])) : ?>
                                        <p class="text-danger"><?php echo $error['year']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12">
                                    <label for="fir">Tên in trên thẻ<span>*</span></label>
                                    <input type="text" id="name" name="name" placeholder="Nguyễn Văn A" value="">
                                    <?php if(isset($error['name'])) : ?>
                                        <p class="text-danger"><?php echo $error['name']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Thanh toán</button>
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