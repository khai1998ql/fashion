<?php 
    require_once __DIR__."/autoload/autoload.php"; 
    $open = "customer";
    $sql = 'SELECT *
            FROM '.$open.'    
            WHERE id = '.$_SESSION['fashion_customer_id'].'';
    // _debug($sql);die;
    $customer   =   $db->fetchsql($sql);
    // _debug($customer);die;
    $info = array();
    foreach($customer as $item){
        foreach($item as $key => $item1){
            $info[$key] = $item1;
        }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $error = array();
        // _debug($_POST);die;
        if($info['password'] != md5($_POST['oldpass'])){
            $error['oldpass'] = "Mật khẩu cũ không đúng,mời bạn nhâp lại!";
        }else if(md5($_POST['newpass']) != md5($_POST['reconfirm'])){
            $error['reconfirm'] = "Xác nhận mật khẩu mới không giống nhau!";
        }
        if(empty($error)){
            $id_update = $db->update("customer", array("password" => md5($_POST['newpass'])), array("id" => $_SESSION['fashion_customer_id']));
            if($id_update > 0){
                $_SESSION['success'] = "Cập nhật mật khẩu thành công!";
                redirect('doi-mat-khau.php');
            }else{
                $_SESSION['error'] = "Cập nhật mật khẩu thất bại!";
                redirect('doi-mat-khau.php');
            }
        }
    }
    // _debug($info);die;
?>

<?php 
    require_once __DIR__."/layouts/header.php"; 
    // require_once __DIR__."/layouts/head.php"; 
?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./thong-tin-tai-khoan.php">Thông tin tài khoản</a>
                        <span>Đổi mật khẩu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Tài khoản của tôi</h4>
                        <ul class="filter-catagories">
                            <li><a href="thong-tin-tai-khoan.php">Hồ sơ</a></li>
                            <li><a href="doi-mat-khau.php" style="color: red;">Đổi mật khẩu</a></li>
                            <li><a href="don-da-mua.php">Đơn đã mua</a></li>
                            <li><a href="cho-thanh-toan.php">Chờ thanh toán</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- .row -->
                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <?php require_once __DIR__ ."/errors/errors.php"; ?>
                            
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <form class="form-horizontal form-material" action="#" method="POST" id="matkhau" name="matkhau">
                                    <div class="form-group">
                                        <label class="col-md-12">Nhập mật khẩu cũ</label>
                                        <div class="col-md-12">
                                            <input type="password" value="" placeholder="Mật khẩu cũ"
                                            name="oldpass"
                                                class="form-control form-control-line"> </div>
                                        <?php if(isset($error['oldpass'])) : ?>
                                            <p class="text-danger col-md-12"><?php echo $error['oldpass']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Nhập mật khẩu mới</label>
                                        <div class="col-md-12">
                                            <input type="password" value="" placeholder="Mật khẩu mới"
                                            name="newpass"
                                                class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Xác nhận mật khẩu mới</label>
                                        <div class="col-md-12">
                                            <input type="password" value="" placeholder="Xác nhận mật khẩu"
                                            name="reconfirm"
                                                class="form-control form-control-line"> </div>
                                        <?php if(isset($error['reconfirm'])) : ?>
                                            <p class="text-danger col-md-12"><?php echo $error['reconfirm']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line">
                                                <option>London</option>
                                                <option>India</option>
                                                <option>Usa</option>
                                                <option>Canada</option>
                                                <option>Thailand</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <!-- Related Products Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php require_once __DIR__."/layouts/footer.php"; ?>