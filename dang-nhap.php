<?php
    require_once __DIR__ ."/autoload/autoload.php";
    $open = "customer";
    $data   =   [
                    "email"     =>  postInput("email"),
                    "password"  =>  md5(postInput("password"))
                ];
    $error = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(postInput("email") == ""){
            $error['email'] = "Hãy nhập email của bạn!";
        }
        if(postInput("password") == ""){
            $error['password'] = "Hãy nhập mật khẩu của bạn!";
        }
        if(empty($error)){
            $is_check   =   $db->fetchOne($open, 'email = "'.postInput('email').'" and password = "'.md5(postInput('password')).'" ');
            if(!empty($is_check)){
                $_SESSION['fashion_customer_name'] = $is_check['name'];
                $_SESSION['fashion_customer_id'] = $is_check['id'];
                if(isset($_SESSION['link'])){
                    $link = $_SESSION['link'];
                    echo "<script>alert('Đăng nhập thành công!');location.href='$link'</script>";
                }else{
                    echo "<script>alert('Đăng nhập thành công!');location.href='index.php'</script>";
                }
            }else{
                $_SESSION['error'] = "Tên đăng nhập hoặc mật khẩu không đúng, mời bạn nhập lại!";
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
                        <span>Login</span>
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
                    <div class="row">
                        <?php
                            require_once __DIR__ ."/errors/errors.php";
                        ?>
                    </div>
                    <div class="login-form">
                        <h2>Đăng nhập</h2>
                        <form action="#" method="POST">
                            <div class="group-input">
                                <label for="username">Tên đăng nhập hoặc Email</label>
                                <input type="text" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" id="password" name="password">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Lưu mật khẩu
                                        <input type="checkbox" id="save-pass" name="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Quên mật khẩu</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                        </form>
                        <div class="switch-login">
                            <a href="dang-ky.php" class="or-login">Hoặc tạo tài khoản mới</a>
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

    <!-- Footer Section Begin -->
    <?php require_once __DIR__."/layouts/footer.php"; ?>