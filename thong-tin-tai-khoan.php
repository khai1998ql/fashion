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
                        <a href="./thong-tin-tai-khoan.php">Tài khoản của tôi</a>
                        <span>Hồ sơ</span>
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
                            <li><a href="thong-tin-tai-khoan.php" style="color: red;">Hồ sơ</a></li>
                            <li><a href="doi-mat-khau.php">Đổi mật khẩu</a></li>
                            <li><a href="don-da-mua.php">Đơn đã mua</a></li>
                            <li><a href="cho-thanh-toan.php">Chờ thanh toán</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- .row -->
                    <div class="row">
                        <div class="col-md-2 col-xs-12">
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">Họ và tên</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $info['name'] ?>" readonly
                                                class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $info['email']; ?>" readonly=""
                                                class="form-control form-control-line" name="example-email"
                                                id="example-email"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Số điện thoại</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $info['phone']; ?>" readonly
                                                class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Địa chỉ</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $info['address']; ?>" readonly
                                                class="form-control form-control-line"> </div>
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
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
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