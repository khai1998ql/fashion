<?php 
    require_once __DIR__."/autoload/autoload.php"; 
    $open = 'staff';
    $sqlStaf = 'SELECT * FROM staff  WHERE id = '.$_SESSION['fashion_admin_id'].'';
    $Staff = $db->fetchsql($sqlStaf);
    // _debug($Staff);die;
?>
<?php require_once __DIR__."/layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Thông tin cá nhân</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank"
                            class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Đổi mật khẩu</a>
                        <ol class="breadcrumb">
                            <li><a href="#">index</a></li>
                            <li class="active">Thông tin cá nhân</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="<?php echo base_url() ?>public/admin/plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>public/uploads/product/<?php echo $Staff[0]['avatar']; ?>"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h5 class="text-white"><?php echo $Staff[0]['email']; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Họ và tên</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="" value="<?php echo $Staff[0]['name']; ?>" readonly
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder=""  value="<?php echo $Staff[0]['email']; ?>" readonly
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Số điện thoại</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder=""  value="<?php echo $Staff[0]['phone']; ?>" readonly
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Địa chỉ</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder=""  value="<?php echo $Staff[0]['address']; ?>" readonly
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Số CMT</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder=""  value="<?php echo $Staff[0]['identity_card']; ?>" readonly
                                            class="form-control form-control-line"> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/layouts/footer.php"; ?>