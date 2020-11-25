<?php 
    require_once __DIR__."/autoload/autoload.php"; 
    if(isset($_GET['key'])){
        // _debug($_GET['key']);die;
        $key = getInput('key');
        $sqlPro = 'SELECT * FROM `product` WHERE name = "'.$key.'"';
        $product = $db->fetchsql($sqlPro);
        // _debug($product);die;
        $href = ''.base_url().'chi-tiet-san-pham.php?id='.$product[0]['id'].'';
        // _debug($href);die;
        // chi-tiet-san-pham.php?id=68
        // _debug($href);die;
        
        echo "<script>location.href='$href'</script>";
    }
    // unset($_SESSION);
    // session_destroy();
    // _debug($_SESSION);die;
?>
    <?php require_once __DIR__."/layouts/header.php"; ?>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="<?php echo public_frontend() ?>banner/banner1.png">
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1>Mua hàng giảm giá</h1>
                            <a href="hang-khuyen-mai.php" class="primary-btn">Mua Ngay</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div> -->
            </div>
            <div class="single-hero-items set-bg" data-setbg="<?php echo public_frontend() ?>banner/banner2.png">
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1>Mua hàng giảm giá</h1>
                            <a href="hang-khuyen-mai.php" class="primary-btn">Mua ngay</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <!-- <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="<?php echo public_frontend() ?>img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Áo</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="<?php echo public_frontend() ?>img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Quần</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="<?php echo public_frontend() ?>img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Phụ kiện</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="<?php echo base_url() ?>public/uploads/banner/sanphambanchay.png">
                        <h2>Sản phẩm</h2>
                        <a href="">Bán chạy</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Sản phẩm bán chạy</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
<?php
    // _debug($productPay);die;
    $xhtmlPay   =   '';
    foreach($productPay as $key => $item){
        $xhtmlPay   .=   '<div class="product-item">
                    <div class="pi-pic">
                        <img src="'.base_url().'public/uploads/product/'.$item['avatar'].'" alt="'.$item['name'].'">';
        if($item['sale'] > 0){
            $xhtmlPay   .=  '<div class="sale">Sale</div>';
        }
        $xhtmlPay   .=  '<div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="quick-view"><a href="'.base_url().'chi-tiet-san-pham.php?id='.$item['id'].'">+ Xem nhanh</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <a href="'.base_url().'chi-tiet-san-pham.php?id='.$item['id'].'">
                                <h5>'.$item['name'].'</h5>
                            </a>';
        if($item['sale'] > 0){
            $xhtmlPay   .=  '<div class="product-price">
                                '.formatPrice((100 - $item['sale']) * $item['price']).'
                                    <span>'.formatPrice($item['price']).'</span>
                                </div>
                            </div>
                            </div>';
        }else{
            $xhtmlPay   .=  '<div class="product-price">
                                '.formatPrice($item['price']).'
                                </div>
                            </div>
                            </div>';
        }                    
    }
    echo $xhtmlPay;
?>
                        <!-- <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/women-1.jpg" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/women-2.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/women-3.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/women-4.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="<?php echo public_frontend() ?>img/giamgia.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2 style="color: red;">Siêu giảm giá trong ngày</h2>
                    <p style="color: yellow;">Sự kiện siêu giảm giá lên đến 50% duy nhất trong ngày hôm nay, nhanh tay mua những mặt hàng đang giảm giá nào!!!</p>
                    <!-- <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div> -->
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>00</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>23</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>59</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>59</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="hang-khuyen-mai.php" class="primary-btn">Mua ngay</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Sản phẩm mới</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
<?php
// _debug($productPay);die;

    $xhtmlNew   =   '';
    foreach($productNew as $key => $item){
        $xhtmlNew   .=   '<div class="product-item">
                    <div class="pi-pic">
                        <img src="'.base_url().'public/uploads/product/'.$item['avatar'].'" alt="'.$item['name'].'">';
        if($item['sale'] > 0){
            $xhtmlNew   .=  '<div class="sale">Sale</div>';
        }
        $xhtmlNew   .=  '<div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="quick-view"><a href="'.base_url().'chi-tiet-san-pham.php?id='.$item['id'].'">+ Xem nhanh</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <a href="'.base_url().'chi-tiet-san-pham.php?id='.$item['id'].'">
                                <h5>'.$item['name'].'</h5>
                            </a>';
        if($item['sale'] > 0){
            $xhtmlNew   .=  '<div class="product-price">
                                '.formatPrice((100 - $item['sale']) * $item['price']).'
                                    <span>'.formatPrice($item['price']).'</span>
                                </div>
                            </div>
                            </div>';
        }else{
            $xhtmlNew   .=  '<div class="product-price">
                                '.formatPrice($item['price']).'
                                </div>
                            </div>
                            </div>';
        }                    
    }
    echo $xhtmlNew;
?>
                        <!-- <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/man-1.jpg" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/man-2.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/man-3.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo public_frontend() ?>img/products/man-4.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="<?php echo base_url() ?>public/uploads/banner/sanphammoi.png">
                        <!-- <h2>Men’s</h2>
                        <a href="#">Discover More</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="<?php echo public_frontend() ?>img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo public_frontend() ?>img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo public_frontend() ?>img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo public_frontend() ?>img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo public_frontend() ?>img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo public_frontend() ?>img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <!-- <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo public_frontend() ?>img/latest-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo public_frontend() ?>img/latest-2.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo public_frontend() ?>img/latest-3.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo public_frontend() ?>img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo public_frontend() ?>img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo public_frontend() ?>img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Latest Blog Section End -->

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
    <?php require_once __DIR__."/layouts/footer.php"; ?>
 