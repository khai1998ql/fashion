<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    $open       = "staff";
    $name       =   '';
    $email      =   '';
    $address    =   '';
    $birth      =   '';
    $salary     =   '';
    $identity_card  =   '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // _debug($_POST);die;
        $data   =   array(
                        'name'      =>  postInput('name'),
                        'email'     =>  postInput('email'),
                        'password'  =>  md5(postInput('password')),
                        'birth'     =>  postInput('birth'),
                        'address'   =>  postInput('address'),
                        'salary'   =>  postInput('salary'),
                        'id_store'  => $_SESSION['id_store_admin'],
                        'identity_card'  =>  postInput('identity_card'),
                        'created_at'     =>  date('Y-m-d H:i:s', time()),
                        'update_at'     =>  date('Y-m-d H:i:s', time())
                    );
        $error = array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $name       =   postInput('name');
        $email      =   postInput('email');
        $address    =   postInput('address');
        $birth      =   postInput('birth');
        $salary     =   postInput('salary');
        $password   =   postInput('password');
        $identity_card     =   postInput('identity_card');
        if($name == ""){
            $error['name']      =   "Mời bạn hãy nhập tên nhân viên!";
        }
        if($email == ""){
            $error['email']     =   "Mời bạn hãy nhập email nhân viên!";
        }
        if($address == ""){
            $error['address']   =   "Mời bạn hãy nhập địa chỉ nhân viên!";
        }
        if($password == ""){
            $error['password']  =   "Mời bạn hãy nhập mật khẩu nhân viên!";
        }
        if($birth == ""){
            $error['birth']     =   "Mời bạn hãy nhập năm sinh nhân viên!";
        }
        if($salary == ""){
            $error['salary']    =   "Mời bạn hãy nhập lương nhân viên!";
        }
        if($identity_card == ""){
            $error['identity_card']    =   "Mời bạn hãy nhập CMT nhân viên!";
        }
        if(strlen($identity_card) != 9 && $identity_card != ""){
            $error['identity_card']    =   "Mời bạn hãy nhập đúng CMT!";
        }
        if(!isset($_FILES['avatar'])){
            $error['avatar'] = "Mời bạn chọn hình ảnh!";
        }
        if(empty($error)){
            if(isset($_FILES['avatar'])){
                $file_name  =   randomString($_FILES['avatar']['name'], 5);
                $file_type  =   $_FILES['avatar']['type'];
                $tmp_name   =   $_FILES['avatar']['tmp_name'];
                $file_error =   $_FILES['avatar']['error'];
                if(empty($file_error)){
                    $part   =   ROOT . "product/";
                    $data['avatar'] =   $file_name;
                }
            }
            if(empty($error)){
                $id_insert  =   $db->insert($open, $data);
                if($id_insert > 0){
                    move_uploaded_file($tmp_name, $part.$file_name);
                    $_SESSION['success']    =   "Thêm mới nhân viên thành công!";
                    redirectAdmin($open);
                }else{
                    $_SESSION['error']  =   "Thêm mới nhân viên thất bại!";
                    redirectAdmin($open);
                }
            }
        }
    }
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Thêm mới nhân viên</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>/admin/category/index.php">Nhân viên</a></li>
                            <li class="active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
                <?php 
                    require_once __DIR__."/../../../errors/errors.php";
                ?>
                <div class="row">
                    <form class="frm" action="#" method="POST" enctype="multipart/form-data">
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Họ và tên</p><input type="text" id="name" name="name" placeholder="Họ và tên" value="<?php echo $name ?>">
                        </div>
                        <?php if(isset($error['name'])) : ?>
                            <p class="text-danger"><?php echo $error['name']; ?></p>
                        <?php endif; ?>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Email</p><input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email ?>">
                        </div>
                        <?php if(isset($error['email'])) : ?>
                            <p class="text-danger"><?php echo $error['email']; ?></p>
                        <?php endif; ?>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Mật khẩu</p><input type="password" id="password" name="password" placeholder="Mật khẩu">
                        </div>
                        <?php if(isset($error['password'])) : ?>
                            <p class="text-danger"><?php echo $error['password']; ?></p>
                        <?php endif; ?>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Năm sinh</p><input type="text" id="birth" name="birth" placeholder="Năm sinh" value="<?php echo $birth ?>">
                        </div>
                        <?php if(isset($error['birth'])) : ?>
                            <p class="text-danger"><?php echo $error['birth']; ?></p>
                        <?php endif; ?>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Địa chỉ</p><input type="text" id="address" name="address" placeholder="Địa chỉ" value="<?php echo $address ?>">
                        </div>
                        <?php if(isset($error['address'])) : ?>
                            <p class="text-danger"><?php echo $error['address']; ?></p>
                        <?php endif; ?>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Chứng minh thư</p><input type="text" id="identity_card" name="identity_card" placeholder="Số CMT" value="<?php echo $identity_card ?>">
                        </div>
                        <?php if(isset($error['identity_card'])) : ?>
                            <p class="text-danger"><?php echo $error['identity_card']; ?></p>
                        <?php endif; ?>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Lương</p><input type="text" id="salary" name="salary" placeholder="Lương" value="<?php echo $salary ?>">
                        </div>
                        <?php if(isset($error['salary'])) : ?>
                            <p class="text-danger"><?php echo $error['salary']; ?></p>
                        <?php endif; ?>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Avatar</p><input type="file" id="avatar" name="avatar" placeholder="Ảnh đại điện">
                        </div>
                        <?php if(isset($error['avatar'])) : ?>
                            <p class="text-danger"><?php echo $error['avatar']; ?></p>
                        <?php endif; ?>
                        </br>
                        </br>
                        <div class="rowform">
                            <button type="submit" class="btn btn-success"> Lưu </button>
                            <input type="button" value="Cancel" name="cancel" onclick="returnStaff()" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>