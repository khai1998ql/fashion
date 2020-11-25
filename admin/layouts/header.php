<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>public/admin/plugins/images/favicon.png">
    <title>Quản lý Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>public/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url() ?>public/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url() ?>public/admin/plugins/bower_components/toast-master/<?php echo base_url() ?>public/admin/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url() ?>public/admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url() ?>public/admin/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url() ?>public/admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>public/admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url() ?>public/admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- Custom CSS Tự làm-->
    <link href="<?php echo base_url() ?>public/css/style.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url() ?>public/js/js.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo base_url() ?>admin/index.php">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                            <img src="<?php echo base_url() ?>public/admin/plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                            <!--This is light logo icon-->
                            <img src="<?php echo base_url() ?>public/admin/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <!--This is dark logo text-->
                            <img src="<?php echo base_url() ?>public/admin/plugins/images/admin-text.png" alt="home" class="dark-logo" />
                            <!--This is light logo text-->
                            <img src="<?php echo base_url() ?>public/admin/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                        </span> 
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <!-- <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> 
                            <a href="">
                                <i class="fa fa-search"></i>
                            </a> 
                        </form> -->
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $_SESSION['fashion_admin_avatar'] ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><span>Xin chào: </span><span style="color: red;"><?php echo $_SESSION['fashion_admin_name'] ?></span></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <?php
                        $xhtml = '';
                        if($_SESSION['fashion_admin_position'] == 1){
                            $xhtml  =   '<li style="padding: 70px 0 0;">
                                            <a href="'.base_url().'admin/index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Trang chủ</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/profile.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Thông tin cá nhân</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/modules/staff/index.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Nhân viên</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/modules/category/index.php" class="waves-effect"><i class="fa fa-bars fa-fw" aria-hidden="true"></i>Danh mục sản phẩm</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/modules/product/index.php" class="waves-effect"><i class="fa fa-product-hunt fa-fw" aria-hidden="true"></i>Sản phẩm</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/modules/transaction/index.php" class="waves-effect"><i class="fa fa-shopping-basket fa-fw" aria-hidden="true"></i>Quản lý đơn hàng</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/dang-xuat.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Đăng xuất</a>
                                        </li>';
                        }elseif($_SESSION['fashion_admin_position'] == 0){
                            $xhtml  =   '<li style="padding: 70px 0 0;">
                                            <a href="'.base_url().'admin/index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Trang chủ</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/profile.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Thông tin cá nhân</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/modules/transaction/index.php" class="waves-effect"><i class="fa fa-shopping-basket fa-fw" aria-hidden="true"></i>Quản lý đơn hàng</a>
                                        </li>
                                        <li>
                                            <a href="'.base_url().'admin/dang-xuat.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Đăng xuất</a>
                                        </li>';
                        }
                        echo $xhtml;
                    ?>
                    <!-- <li style="padding: 70px 0 0;">
                        <a href="'.base_url().'admin/index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Trang chủ</a>
                    </li>
                    <li>
                        <a href="'.base_url().'admin/profile.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="'.base_url().'admin/modules/staff/index.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Nhân viên</a>
                    </li>
                    <li>
                        <a href="'.base_url().'admin/modules/category/index.php" class="waves-effect"><i class="fa fa-bars fa-fw" aria-hidden="true"></i>Danh mục sản phẩm</a>
                    </li>
                    <li>
                        <a href="'.base_url().'admin/modules/product/index.php" class="waves-effect"><i class="fa fa-product-hunt fa-fw" aria-hidden="true"></i>Sản phẩm</a>
                    </li>
                    <li>
                        <a href="'.base_url().'admin/modules/transaction/index.php" class="waves-effect"><i class="fa fa-shopping-basket fa-fw" aria-hidden="true"></i>Quản lý đơn hàng</a>
                    </li>
                    <li>
                        <a href="'.base_url().'admin/dang-xuat.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Đăng xuất</a>
                    </li>
                    <li>
                        <a href="'.base_url().'admin/404.php" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Error 404</a>
                    </li> -->

                </ul>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->