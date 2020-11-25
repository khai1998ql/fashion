<!-- Footer Section Begin -->
<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="<?php echo public_frontend() ?>img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: HVCN BCVT</li>
                            <li>Điện thoại: 0123456789</li>
                            <li>Email: ptit.edu.vn@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông tin</h5>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài khoản của tôi</h5>
                        <ul>
                            <li><a href="#">Tài khoản của tôi</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Giỏ hàng</a></li>
                            <li><a href="#">Mua hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Đăng kí để nhận thông tin sản phẩm mới!</h5>
                        <p>Đăng kí để nhận thông tin sản phẩm mới!</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập email của bạn">
                            <button type="button">Đăng kí</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="<?php echo public_frontend() ?>img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo public_frontend() ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/jquery.countdown.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/jquery.nice-select.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/jquery.zoom.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/jquery.dd.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/jquery.slicknav.js"></script>
    <script src="<?php echo public_frontend() ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo public_frontend() ?>js/main.js"></script>
</body>

</html>
<script type="text/javascript">
   $(function() {
       $hidenitem = $(".hidenitem");
       $itemproduct = $(".item-product");
       $itemproduct.hover(function(){
           $(this).children(".hidenitem").show(100);
       },function(){
           $hidenitem.hide(500);
       })
   })


   $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e) {
            e.preventDefault();
            $qty    = $(this).parents("tr").find(".qty").val();
            $id     = $(this).attr("data-id");
            $key    = $(this).attr("data-key");

            console.log($key);
            $.ajax({
                url: 'cap-nhat-gio-hang.php',
                type: 'GET',
                data: {'qty': $qty, 'key':$key, 'id':$id},
                success:function(data)
                {
                    if (data == 1) 
                    {
                        alert('Bạn đã cập nhật giỏ hàng thành công!');
                        location.href='gio-hang.php';
                    }
                    else
                    {
                        alert('Xin lỗi! Số lượng bạn mua vượt quá số lượng hàng có trong kho!');
                        location.href='gio-hang.php';
                    }
                }
            });
            
        })
    }) 
</script>