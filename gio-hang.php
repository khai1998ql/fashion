<?php 
    require_once __DIR__."/autoload/autoload.php"; 
    $sum = 0;
    $sumsale    =   0;
    // _debug($_SESSION);die;
    // unset($_SESSION['cart-fashion']);
    if( !isset($_SESSION['fashion_cart']) || count($_SESSION['fashion_cart']) == 0){
        if(isset($_SESSION['total'])){
            unset($_SESSION['total']);
        }
        // $_SESSION['total'] = 0;
        echo "<script>alert('Không có sản phẩm trong giỏ hang, hãy trở về trang chủ để mua hàng!');location.href='index.php'</script>";
    }
    $cart = array();
    // _debug($_SESSION['fashion_cart']);die;
    
    // _debug($count);die;
    foreach($_SESSION['fashion_cart'] as $key => $item){
        foreach($item as $key1 => $item1){
            // unset($item1);
            $cart[] = $item1;
        }
    }
    // _debug($cart);die;
    foreach($cart as $key => $item){
        $color  =   $item['color'];
        $size   =   $item['size'];
        $sql    =   'SELECT * FROM detail WHERE id_product = '.$item['id'].' 
                    AND color = "'.$color.'" AND size = "'.$size.'" and id_store = '.$id_store.'
                    ';
        // _debug($sql);die;
        $detail =   $db->fetchsql($sql);
        // _debug($detail);die;
        $number = intval($detail[0]['number']);
        // _debug($number);die;
        // _debug($detail[0]['number']);die;
    }
    // _debug($_SESSION['fashion_cart']);die;
?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./cua-hang.php">Cửa hàng</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <?php require_once __DIR__ ."/errors/errors.php"; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Màu</th>
                                    <th>Size</th>
                                    <th>Sale</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Hành động</th>
                                    <!-- <th><i class="ti-close"></i></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart as $key => $item) : ?>
                                    <?php
                                        $color  =   $item['color'];
                                        $size   =   $item['size'];
                                        $sql    =   'SELECT * FROM detail WHERE id_product = '.$item['id'].' 
                                                    AND color = "'.$color.'" AND size = "'.$size.'" and id_store = '.$id_store.'
                                                    ';
                                        $detail =   $db->fetchsql($sql);
                                        $number = intval($detail[0]['number']);
                                    ?>
                                <tr>
                                    <td class="cart-pic first-row"><a href="<?php echo base_url(); ?>chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><img src="<?php echo base_url(); ?>public/uploads/product/<?php echo $item['avatar'] ?>" alt="" width="170px" height="170px"></a></td>
                                    <td class="cart-title first-row">
                                        <a href="<?php echo base_url(); ?>chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><h5><?php echo $item['name']; ?></h5></a>
                                    </td>
                                    <td class="p-price first-row"><?php echo formatPrice($item['price']); ?></td>
                                    <td class="p-price first-row"><?php echo $item['color'] ?></td>
                                    <td class="p-price first-row"><?php echo $item['size'] ?></td>
                                    <td class="total-price first-row"><?php echo $item['sale'] . " %" ?></td>
                                    <td class="p-price first-row"><?php echo $item['qty'] ?></td>
                                    <!-- <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" name="qty" id="qty" min="1" max="2" class="qty" readonly value="<?php echo $item['qty'] ?>">
                                            </div>
                                        </div>
                                    </td> -->
                                    <td class="total-price first-row"><?php echo formatPrice(($item['price'] * $item['qty'] * (100 - $item['sale']) / 100)); ?></td>
                                    <!-- <td class="close-td first-row"><i class="ti-close"></i></td> -->
                                    <td>
                                        <a href="remove.php?id=<?php echo $item['id'] ?>&key=<?php echo $item['key'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>Remove</a>
                                        <!--  -->
                                    </td>
                                </tr>
                                    <!-- <?php 
                                        $sum += ($item['price'] * $item['qty']);
                                        $sumsale += ($item['sale'] / 100) * ($item['price'] * $item['qty']);
                                        $_SESSION['sum'] = $sum;
                                        $_SESSION['total'] = ($sum - $sumsale);
                                    ?> -->
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="shop.php" class="primary-btn continue-shop">Tiếp tục mua hàng</a>
                                <a href="gio-hang.php" class="primary-btn up-cart">Cập nhật giỏ hàng</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Mã giảm giá</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Nhập mã giảm giá">
                                    <button type="submit" class="site-btn coupon-btn">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng tiền hàng<span><?php echo formatPrice($sum); ?></span></li>
                                    <li class="subtotal">Số tiền được giảm<span><?php echo formatPrice($sumsale); ?></span></li>
                                    <li class="cart-total">Tổng số tiền<span><?php echo formatPrice($_SESSION['total']); ?></span></li>
                                </ul>
                                <a href="thanh-toan.php" class="proceed-btn">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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