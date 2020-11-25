<?php 
    require_once __DIR__."/autoload/autoload.php"; 
    $open = "category";
    $sub = getInput("sub");
    // _debug($sub);die;
    $danhmuc = $db->fetchSub($open, $sub, $id_store);
    if(empty($danhmuc)){
        $_SESSION["error"] = "Danh mục không tồn tại!";
        redirect("error.php");
    }
    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p = 1;
    }
    $sql1 =  "SELECT c.key
            FROM category as c
            WHERE sub = '$sub'";
    $key    =   $db->fetchsql($sql1);
    $key[0]['key'] = (int) $key[0]['key'];
    // _debug($key[0]['key']);die;
    if($key[0]['key'] == 0){
        $sql =  "SELECT p.*
            FROM product as p, category as c
            WHERE p.id_store = $id_store
                AND p.id_category = c.id
                AND c.sub = '$sub'";
    }else{
        $sql =  "SELECT DISTINCT p.*
                FROM product as p, category as c
                WHERE p.id_store = $id_store
                    and p.id_category = c.id
                    AND  c.group = (
                            SELECT c.group
                            FROM category AS c
                            WHERE c.sub='$sub'
                        )";
    }
    // _debug($sql);die;
    $countTable = $db->countTableSQL($sql);
    // _debug($countTable);die;
    $x = 9;
    $product = $db->fetchJone($countTable, $sql, $p, $x, true);
    if(isset($product['page'])){
        $sotrang = $product['page'];
        unset($product['page']);
    }
    // _debug($_GET);die;
    $xhtmlProduct = "";
    foreach($product as $item){
        $xhtmlProduct  .=  '<div class="col-lg-4 col-sm-6">';
        $xhtmlProduct  .=  '<div class="product-item">
                    <div class="pi-pic">
                        <img src="'.base_url().'public/uploads/product/'.$item['avatar'].'" alt="">';
        if($item['sale'] > 0){
            $xhtmlProduct  .=  '<div class="sale pp-sale">Sale '.$item['sale'].'%</div>';
        }
        $xhtmlProduct  .=  '<div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            
                            <li class="quick-view"><a href="'.base_url().'chi-tiet-san-pham.php?id='.$item['id'].'">Xem nhanh</a></li>
                            
                        </ul>
                    </div>
                    <div class="pi-text">
                        
                        <a href="'.base_url().'chi-tiet-san-pham.php?id='.$item['id'].'">
                            <h5>'.$item['name'].'</h5>
                        </a>
                        <div class="product-price">';
        if($item['sale'] > 0){
            $xhtmlProduct  .=  ''.formatpricesale($item['price'], $item['sale']).'
                            <span>'.formatPrice($item['price']).'</span>';
        }else{
            $xhtmlProduct  .=  ''.formatPrice($item['price']).'';
        }
        $xhtmlProduct  .=  '</div>
                            </div>
                        </div>
                    </div>';
        // _debug($xhtmlProduct);die;
    }
    // _debug($_POST);die;
    // _debug($danhmuc);die;
?>
    <?php require_once __DIR__."/layouts/header.php"; ?>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Danh mục cùng loại</h4>
                        <ul class="filter-catagories">
                            <?php
                                $listCate = "";
                                foreach($danhmuc as $item){
                                    $listCate .= '<li><a href="'.base_url().'danh-muc-san-pham.php?sub='.$item['sub'].'">'.$item['name'].'</a></li>';
                                }
                                echo $listCate;
                            ?>
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
                        <h4 class="fw-title">Kích cỡ</h4>
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
                            <?php foreach($danhmuc as $item) : ?>
                                
                            <a href="<?php echo base_url(); ?>danh-muc-san-pham.php?sub=<?php echo to_sub($item['name']); ?>"><?php echo $item['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <!-- <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <?php
                                    if(isset($_GET['page'])){
                                        $num    =   getInput('page');
                                        $countp  = ($num - 1) * $x;
                                    }else{
                                        $num    =   1;
                                        $countp  = ($num - 1) * $x;
                                        // $countp = 1;
                                    }
                                    foreach($product as $item){
                                        $countp++;
                                    }
                                ?>
                                <p><?php echo "Hiển thị ".$countp." trong tổng ".$countTable. " sản phẩm"?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                    <?php

                    ?>
                        <div class="row">
                            <?php
                                echo $xhtmlProduct;
                            ?>
                        </div>
                    </div>
                    <!-- <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div> -->
                    <div class="pull-right">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <li>
                            <a  href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <?php for($i = 1; $i <= $sotrang; $i++): ?>
                                <?php
                                    if(isset($_GET['page'])){
                                        $p = $_GET['page'];
                                    }
                                    else{
                                        $p = 1;
                                    }
                                ?>
                                <li class="<?php echo ($i == $p) ? 'active' : '' ?>">
                                    <a href="?sub=<?php echo $sub ;?>&page=<?php echo $i ;?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor ?>
                            <li>
                            <a  href="" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                            </ul>
                        </nav>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

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