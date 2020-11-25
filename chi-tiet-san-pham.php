<?php require_once __DIR__."/autoload/autoload.php"; 
    $open = "product";
    $id = intval(getInput("id"));
    $product = $db->fetchID($open, $id);
    //  CHI TIẾT SAN PHẨM
    if(empty($product)){
        redirect("error.php");
    }
    // KTRA XEM CÓ LINK CHI TIẾT SP HAY KHÔNG
    if(isset($_SESSION['link'])){
        unset($_SESSION['link']);
    }
    //  THÊM LINK SP HIỆN TẠI
    $_SESSION['link'] = base_url().'chi-tiet-san-pham.php?id='.$id.'';
    // _debug($_SESSION['link']);die;
    //  Xác định màu có trong sản phẩm
    $pro = explode("|", $product['detail']);
    // _debug($pro);die;
    $color = array();
    $size = array();
    $number = array();
    foreach($pro as $key => $item){
        if(empty($item)){
            unset($item);
        }else{
            $pro = explode("-", $item);
            $color[$key]    = $pro[0];
            $size[$key]     = $pro[1];
            $number[$key]   = $pro[2];
        }
        
    }
    $color = array_unique($color);
    $size = array_unique($size);
    $xhtmlColor = "";
    foreach($color as $item){
        $xhtmlColor .=   '<div class="cc-item">
                            <input type="radio" name="color" id="cc-'.to_sub($item).'" value="'.$item.'">
                            <label for="cc-'.to_sub($item).'" class="cc-'.to_sub($item).'"></label>
                        </div>';
    }
    $xhtmlSize  = '';
    foreach($size as $item){
        $xhtmlSize .=   '<div class="sc-item">
                            <input type="radio" name="size" id="'.to_sub($item).'" value="'.$item.'">
                            <label for="'.to_sub($item).'">'.$item.'</label>
                        </div>';
        // $xhtmlSize  .=   '<div class="sc-item">
        //                 <input type="radio" name="size" id="'.to_sub($item).'" value="'.$item.'">
        //                 <label for="'.to_sub($item).'-size">'.$item.'</label>
        //             </div>';
    }
    // format lại thông tin
    $content    = explode("+", $product['content']);
    $info   =   array();
    foreach($content as $item){
        $info[] = explode("-", $item);
    }
    $xhtmlContent = "";
    foreach($info as $item){
        $xhtmlContent   .= '<h5>'.$item[0].'</h5>';
        if(isset($item[1])){
            $xhtmlContent   .= '<p>- '.$item[1].'</p>';
        }
        if(isset($item[2])){
            $xhtmlContent   .= '<p>- '.$item[2].'</p>';
        }
        if(isset($item[3])){
            $xhtmlContent   .= '<p>- '.$item[3].'</p>';
        }
    }
    //  Lấy danh mục cùng loại
    // _debug($product);die;
    $sqlCate    =   'SELECT * FROM `category` WHERE `group` = '.$product['group_category'].' and id_store = '.$id_store.'';
    $cate       =   $db->fetchsql($sqlCate);
    // _debug($cate);die;
    //  Lấy danh mục sản phẩm hiện tại
    $sqlCateNow = 'SELECT * FROM `category` WHERE id = '.$product['id_category'].'';
    $cateNow    = $db->fetchsql($sqlCateNow);
    // _debug($cateNow);die;
    //  LẤY 5 SẢN PHẨM CÙNG DANH MỤC
    $sqlPro     =   'SELECT * FROM `product` WHERE id_category = '.$product['id_category'].' and id_store = '.$id_store.' LIMIT 4';
    $productCate    =   $db->fetchsql($sqlPro);
    // _debug($productCate);die;
    //  TÌM KIẾM SẢN PHẨM
    if(isset($_GET['key'])){
        _debug($_GET);die;
        $key = getInput('key');
        $sqlPro = 'SELECT * FROM `product` WHERE name = "'.$key.'"';
        $product = $db->fetchsql($sqlPro);
        // _debug($product);die;
        $href = 'http://localhost/fashion/chi-tiet-san-pham.php?id='.$product[0]['id'].'';
        // _debug($href);die;
        // chi-tiet-san-pham.php?id=68
        // _debug($href);die;
        
        echo "<script>location.href='$href'</script>";
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
                        <a href="./san-pham.php">Sản phẩm</a>
                        <span>Chi tiết sản phẩm</span>
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
                        <h4 class="fw-title">Danh mục cùng loại</h4>
                        <ul class="filter-catagories">
                        <?php foreach($cate as $item) : ?>
                            <li><a href="<?php echo base_url() ?>danh-muc-san-pham.php?sub=<?php echo $item['sub']; ?>"><?php echo $item['name'] ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div> -->
                    <div class="filter-widget">
                        <h4 class="fw-title">Giá</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Lọc</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Màu</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <?php foreach($cate as $item) : ?>
                                
                            <a href="<?php echo base_url(); ?>danh-muc-san-pham.php?sub=<?php echo to_sub($item['name']); ?>"><?php echo $item['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['avatar'] ?>" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image1'] ?>"><img
                                            src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['avatar'] ?>" alt=""></div>
                                    <div class="pt" data-imgbigurl="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image2'] ?>"><img
                                            src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image2'] ?>" alt=""></div>
                                    <div class="pt" data-imgbigurl="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image3'] ?>"><img
                                            src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image3'] ?>" alt=""></div>
                                    <div class="pt" data-imgbigurl="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image3'] ?>"><img
                                            src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image3'] ?>" alt=""></div>
                                    <div class="pt" data-imgbigurl="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image4'] ?>"><img
                                            src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['image4'] ?>" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3><?php echo $product['name'] ?></h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <?php
                                        $xhtmlPrice = "";
                                        if($product['sale'] > 0){
                                            $xhtmlPrice     .= '<h4>'.formatpricesale($product['price'], $product['sale']).'<span>'.formatPrice($product['price']).'</span></h4>' ;
                                        }else{
                                            $xhtmlPrice  .=  '<h4>'.formatPrice($product['price']).'' ;
                                        }
                                        echo $xhtmlPrice;
                                    ?>
                                </div>
                                <form action="addcart.php?id=<?php echo $id; ?>" method="POST" id="sizecolor" name="">
                                    <div class="pd-color">
                                        <h6>Màu</h6>
                                        <div class="pd-color-choose">
                                            <?php
                                                echo $xhtmlColor;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="filter-widget">
                                        <h4 class="fw-title">Kích cỡ</h4>
                                        <div class="fw-size-choose">
                                        <div class="pd-size-choose">
                                            <?php echo $xhtmlSize; ?>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="soluong" value="1">
                                        </div>
                                        <button type="submit" class="primary-btn pd-cart">Thêm nhanh</button>
                                        <!-- <a href="addcart.php?id=<?php echo $id; ?>" class="primary-btn pd-cart">Thêm nhanh</a> -->
                                    </div>
                                </form>
                                <!-- <div class="pd-color">
                                    <h6>Màu</h6>
                                    <div class="pd-color-choose">
                                        <?php
                                            echo $xhtmlColor;
                                        ?>
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    <?php echo $xhtmlSize; ?>
                                </div> -->
                                <!-- <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    <a href="addcart.php?id=<?php echo $id; ?>" class="primary-btn pd-cart">Thêm nhanh</a>
                                </div> -->
                                <ul class="pd-tags">
                                    <li><span>Danh mục</span>: <?php echo $cateNow[0]['name']; ?></li>
                                    <li><span>TAGS</span>: <?php echo $cate[0]['name']; ?>, <?php echo $cateNow[0]['name']; ?></li>
                                </ul>
                                <!-- <div class="pd-share">
                                    <div class="p-code">Sku : 00012</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">Thông tin sản phẩm</a>
                                </li>
                                <!-- <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">Chi tiết sản phẩm</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Bình luận</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <?php echo $xhtmlContent ?>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['avatar']; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <!-- <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">$495.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">22 in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">1,3kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">Xxl</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span class="cs-color"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">00012</div>
                                                </td>
                                            </tr>
                                        </table> -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="<?php echo public_frontend() ?>img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="<?php echo public_frontend() ?>img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phảm tương tự</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach($productCate as $key => $item) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $item['avatar'] ?>" alt="" width="260px" height="320px">
                            <?php if($item['sale'] > 0) : ?>
                                <div class="sale">Sale</div>
                            <?php endif; ?>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="quick-view"><a href="<?php base_url() ?>chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">Xem nhanh</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <a href="#">
                                <h5><?php echo $item['name']; ?></h5>
                            </a>
                        <?php if($item['sale'] > 0) : ?>
                            <div class="product-price">
                                <?php echo formatPrice((100 - $item['sale'])*$item['price']); ?>
                                <span><?php echo formatPrice($item['price']); ?></span>
                            </div>
                        <?php else: ?>
                            <div class="product-price">
                            <?php echo formatPrice($item['price']); ?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="<?php echo public_frontend() ?>img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View1</a></li>
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
                </div>
                <div class="col-lg-3 col-sm-6">
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
                </div>
                <div class="col-lg-3 col-sm-6">
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
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

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