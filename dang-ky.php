<?php 
    require_once __DIR__."/autoload/autoload.php"; 
    $open   = "customer";
    $error = [];
    $data = [
        "name"      =>  postInput("name"),
        "email"     =>  postInput("email"),
        "password"  =>  md5(postInput("password")),
        "phone"     =>  postInput("phone"),
        "address"   =>  postInput("address"),
        'created_at'     =>  date('Y-m-d H:i:s', time()),
        'update_at'     =>  date('Y-m-d H:i:s', time())
    ];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        
        if(postInput("name") == ""){
            $error['name'] = "Tên không được để trống";
        }
        if(postInput("email") == ""){
            $error['email'] = "Email không được để trống";
        }
        if(postInput("password") == ""){
            $error['password'] = "Password không được để trống";
        }
        if(postInput("phone") == ""){
            $error['phone'] = "Số điện thoại không được để trống";
        }
        if(postInput("address") == ""){
            $error['address'] = "Địa chỉ không được để trống";
        }
        $fetchEmail =   $db->fetchEmail($open, postInput("email"));
        if(!empty($fetchEmail)){
            $error['email'] = "Email đã tồn tai!";
        }
        // _debug($data);die;
        if(empty($error)){
            $id_insert  = $db->insert($open, $data);
            if($id_insert > 0){
                $_SESSION['success']    = "Tạo tài khoản thành công, mời bạn đăng nhập!";
                redirect("dang-nhap.php");
            }else{
                $_SESSION['error']      = "Tạo tài khoản thất bại!";
            }
        }
    }
    
?>
    <?php require_once __DIR__."/layouts/header.php"; ?>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Tạo tài khoản</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Tạo tài khoản</h2>
                        <form action="#" method="POST">
                            <div class="group-input">
                                <label for="username">Họ và tên</label>
                                <input type="text" id="name" name="name" value="<?php echo $data['name']; ?>">
                                <?php
                                    if(isset($error['name'])) :
                                    ?>
                                    <p class="text-danger"> <?php echo $error['name']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="group-input">
                                <label for="username">Email</label>
                                <input type="text" id="email" name="email" value="<?php echo $data['email']; ?>">
                                <?php
                                    if(isset($error['email'])) :
                                    ?>
                                    <p class="text-danger"> <?php echo $error['email']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" id="password" name="password" value="">
                                <?php
                                    if(isset($error['password'])) :
                                    ?>
                                    <p class="text-danger"> <?php echo $error['password']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="group-input">
                                <label for="username">Số điện thoại</label>
                                <input type="text" id="phone" name="phone" value="<?php echo $data['phone']; ?>">
                                <?php
                                    if(isset($error['phone'])) :
                                    ?>
                                    <p class="text-danger"> <?php echo $error['phone']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="group-input">
                                <label for="username">Địa chỉ</label>
                                <input type="text" id="address" name="address" value="<?php echo $data['address']; ?>">
                                <?php
                                    if(isset($error['address'])) :
                                    ?>
                                    <p class="text-danger"> <?php echo $error['address']; ?> </p>
                                <?php endif ?>
                            </div>
                            <button type="submit" class="site-btn register-btn">Đăng ký</button>
                        </form>
                        <div class="switch-login">
                            <a href="dang-nhap.php" class="or-login">Hoặc đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
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