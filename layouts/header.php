<?php
    require_once __DIR__."/../autoload/autoload.php";
    
    // unset($_SESSION);
    // $tien = 0;
    // if(isset($_SESSION['total'])){
    //     $tien = $_SESSION['total'];
    // }
    $open = "category";
    $orderby    = 'group';
    $category   = $db->orderBy($open, $id_store, $orderby);
    
    $idItem = array();
    $count  = 1;
    
    // _debug($category);die;
    $co = 1;
    foreach($category as $key => $item){
        
        if($item['group'] == $count){
            
            $idItem[$count][$co] = $item['name'];
            $co++;
        }else{
            // _debug($item);die;
            // $count++;
            $co = 1;
            $idItem[++$count][$co] = $item['name'];
            $co++;
        }
    }
    // _debug($idItem);die;
    $xhtml = "";
    foreach($idItem as $item){
        $xhtml .= '<div class="">';
        // $xhtml .= '<li style="font-weight: bold;"><a href="'.base_url().'danh-muc-san-pham.php?sub='.$key1.'">'.$item1.'</a></li>';
        // _debug($item);die;
        foreach($item as $key1 => $item1){
            // _debug($item1);die;
            if($key1 == 1){
                $xhtml .= '<li style="font-weight: bold;text-transform: uppercase;"><a href="'.base_url().'danh-muc-san-pham.php?sub='.to_sub($item1).'">'.$item1.'</a></li>';
            }else{
                $xhtml .= '<li><a href="'.base_url().'danh-muc-san-pham.php?sub='.to_sub($item1).'">'.$item1.'</a></li>';
            }
        }
        $xhtml .= '</div>';
    }
    $xhtml .= '<div class="">';
    $xhtml .= '<li><a href="'.base_url().'hang-khuyen-mai.php" style="color: red;">HÀNG KHUYẾN MÃI</a></li>';
    $sqlStore   =   "SELECT * FROM store";
    $store      =   $db->fetchsql($sqlStore);
    // _debug($store);die;
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thời trang nam</title>
    <link href="<?php echo base_url(); ?>public/uploads/banner/fashion.png" rel="shortcut icon" type="image/x-icon" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- jquery -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- css Styles -->
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo public_frontend() ?>css/style.css" type="text/css">
    <!-- Custom CSS Tự làm-->
    <link href="<?php echo base_url() ?>public/css/style.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <!-- <link href="<?php echo base_url() ?>public/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script type="text/javascript">
        $(document).ready(function()
        {  
            //sử dụng autocomplete với input có id = key
            $( "input#key" ).autocomplete({
                source:'search.php', //link xử lý dữ liệu tìm kiếm
            })
        });
    </script>
    
   
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        ptit.edu.vn@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        0123456789
                    </div>
                </div>
                <div class="ht-right">
                    <?php
                        $xhtmlLogin = "";
                        if(!isset($_SESSION['fashion_customer_id'])){
                            $xhtmlLogin = '<a href="'.base_url().'dang-nhap.php" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>';
                        }else{
                            $xhtmlLogin = '<a href="" class="login-panel"><i class="fa fa-user"></i>Xin chào: <span style="font-weight: bold; color: red">'.$_SESSION['fashion_customer_name'].'</span></a>';
                        }
                        echo $xhtmlLogin;
                    ?>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                    <!-- <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="<?php echo public_frontend() ?>img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English"><a href="cua-hang.php?id_store=1">English</a></option>
                            <option value='yu' data-image="<?php echo public_frontend() ?>img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh" selected><a href="cua-hang.php?id_store=2">German</a></option>
                        </select>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="<?php echo public_frontend() ?>img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form method="get" id="form_search">
                            <table>
                                <div class="advanced-search">
                                    <button type="button" class="category-btn">Tất cả</button>
                                    <div class="input-group">
                                        <input type="text" name="key" id="key" placeholder="Tìm kiếm sản phẩm" />
                                        <button id="button_search" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                                <!-- <div class="input-group">
                                    <tr>
                                        <td>
                                            <input type="text" name="key" id="key" style="width:400px" placeholder="Tìm kiếm sản phẩm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <button id="button_search" type="submit">Tìm kiếm</button>
                                        </td>
                                    </tr>
                                </div> -->
                                
                            </table>
                        </form>
                        
                        <!-- <div class="advanced-search">
                            <button type="button" class="category-btn">Tất cả</button>
                            <div class="input-group">
                                <input type="text" placeholder="Tìm kiếm sản phẩm">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <!-- <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li> -->
                            <li class="cart-icon">
                                <a href="gio-hang.php">
                                    <i class="icon_bag_alt"></i>
                                    <?php
                                        $count = 0;
                                        if(isset($_SESSION['fashion_cart'])){
                                            foreach($_SESSION['fashion_cart'] as $item){
                                                foreach($item as $item1){
                                                    $count++;
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    <span><?php echo $count; ?></span>
                                </a>
                                <?php
                                    //  Tạo sản phẩm đang có
                                    $xhtmlItem  =   '';
                                    if(!isset($_SESSION['fashion_cart'])){
                                        $xhtmlItem  =   '<div class="select-button">
                                                            <a href="" class="primary-btn view-card">CHƯA CÓ SẢN PHẨM</a>
                                                            <a href="san-pham.php" class="primary-btn checkout-btn">MUA HÀNG</a>
                                                        </div>';
                                    }else{
                                        $xhtmlItem  =   '<div class="select-items">
                                                            <table>
                                                                <tbody>';
                                        foreach($_SESSION['fashion_cart'] as $key => $item){
                                            foreach($item as $key1 => $item1){
                                                $xhtmlItem  .=      '<tr>
                                                                        <td class="si-pic"><img src="'.base_url().'public/uploads/product/'.$item1['avatar'].'" alt="" width=100px height=100px></td>
                                                                        <td class="si-text">
                                                                            <div class="product-selected">
                                                                                <p>'.$item1['price'].' x '.$item1['qty'].'</p>
                                                                                <h6>Kabino Bedside Table</h6>
                                                                            </div>
                                                                        </td>
                                                                    </tr>';
                                            }
                                        }    
                                        $xhtmlItem      .=  '</tbody>
                                                            </table>
                                                        </div>
                                                        <div class="select-total">
                                                            <span>total:</span>
                                                            <h5>'.formatPrice($tien).'</h5>
                                                        </div>
                                                        <div class="select-button">
                                                            <a href="gio-hang.php" class="primary-btn view-card">Giỏ hàng</a>
                                                            <a href="thanh-toan.php" class="primary-btn checkout-btn">Thanh toán</a>
                                                        </div>';                  
                                    }
                                ?>
                                <div class="cart-hover">
                                    <?php echo $xhtmlItem; ?>
                                </div>
                            </li>
                            <li class="cart-price"><?php echo formatPrice($tien) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>DANH MỤC</span>
                        <ul class="depart-hover nextfloat">
                            <?php echo $xhtml; ?>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <!-- <li class="active"><a href="./index.php">Home</a></li> -->
                        <li><a href="./index.php">Trang chủ</a></li>
                        <li><a href="./san-pham.php">Sản phẩm</a></li>
                        <!-- <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li> -->
                        <!-- <li><a href="./blog.html">Tin tức</a></li> -->
                        <!-- <li><a href="./contact.html">Liên hệ</a></li> -->
                        <li><a href="./lienhe.php">Liên hệ</a></li>
                        <li><a href="#">Chọn Cửa Hàng</a>
                            <ul class="dropdown">
                                <?php foreach($store as $item) : ?>
                                    <li><a href="cua-hang.php?id_store=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></li>
                                <?php endforeach; ?>
                                <!-- <li><a href="cua-hang.php?id_store=2">Hà nội</a></li> -->
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <!-- <li><a href="./blog-details.html">Blog</a></li> -->
                                <li><a href="gio-hang.php">Giỏ hàng</a></li>
                                <li><a href="thanh-toan.php">Thanh toán</a></li>
                                <li><a href="thong-tin-tai-khoan.php">Thông tin tài khoản</a></li>
                                <li><a href="dang-xuat.php">Thoát</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->