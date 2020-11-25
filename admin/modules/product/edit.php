<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    $open = "product";
    $category = $db->fetchAll("category", $_SESSION['id_store_admin']);
    $id = intval(getInput('id'));
    $EditProduct    =   $db->fetchID($open, $id);
    // _debug($category);die;
    if(empty($EditProduct)){
        $_SESSION['error']  =   "Dữ liệu không tồn tại!";
        redirectAdmin("product");
    }
    $sql = 'SELECT id
            FROM `detail`
            WHERE id_product = '.$id.'';
    // _debug($sql);die;
    $id_detail = $db->fetchsql($sql);
    
    // _debug($id_detail);die;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // _debug($_POST);die;
        $data   =   array(
                        "name"  =>  postInput("name"),
                        'sub'   =>  to_sub(postInput("name")),
                        "id_category"   =>  postInput("id_category"),
                        "price" =>  postInput("price"),
                        "sale" =>  postInput("sale"),
                        "detail"    =>  postInput("detail"),
                        "number"    =>  postInput("number"),
                        "content"   =>  postInput("content"),
                        "id_store"  =>  $_SESSION['id_store_admin'],
                        'update_at'     =>  date('Y-m-d H:i:s', time())
                    );
        $error = array();
        if(postInput("name") == ""){
            $error['name'] = "Mời bạn nhập tên sản phẩm!";
        }
        if(postInput("id_category") == ""){
            $error['id_category'] = "Mời bạn chọn danh mục sản phẩm";
        }
        if(postInput("price") == ""){
            $error['price'] = "Mời bạn nhập giá sản phẩm!";
        }
        if(postInput("detail") == ""){
            $error['detail'] = "Mời bạn nhập thông tin chi tiết sản phẩm!";
        }
        if(postInput("number") == ""){
            $error['number'] = "Mời bạn nhập số lượng sản phẩm!";
        } 
        if(postInput("content") == ""){
            $error['content'] = "Mời bạn nhập nội dung sản phẩm!";
        }
        // if(isset($_FILES['avatar'])){
        //     $error['avatar'] = "Mời bạn chọn hình ảnh!";
        // }
        if(empty($error)){
            if(isset($_FILES['avatar'])){
                $file_name  =   randomString($_FILES['avatar']['name'], 6);
                $file_type  =   $_FILES['avatar']['type'];
                $tmp_name   =   $_FILES['avatar']['tmp_name'];
                $file_error =   $_FILES['avatar']['error'];
                if($file_error == 0){
                    $part   =   ROOT ."product/";
                    $data['avatar'] =   $file_name;
                }
            }
            if(isset($_FILES['image1'])){
                $file_name1  =   randomString($_FILES['image1']['name'], 6);
                $file_type1  =   $_FILES['image1']['type'];
                $tmp_name1   =   $_FILES['image1']['tmp_name'];
                $file_error1 =   $_FILES['image1']['error'];
                if($file_name1 == 0){
                    $part  =   ROOT ."product/";
                    $data['image1'] =   $file_name1;
                }
            }
            if(isset($_FILES['image2'])){
                $file_name2  =   randomString($_FILES['image2']['name'], 6);
                $file_type2  =   $_FILES['image2']['type'];
                $tmp_name2   =   $_FILES['image2']['tmp_name'];
                $file_error2 =   $_FILES['image2']['error'];
                if($file_error == 0){
                    $part  =   ROOT ."product/";
                    $data['image2'] =   $file_name2;
                }
            }
            if(isset($_FILES['image3'])){
                $file_name3  =   randomString($_FILES['image3']['name'], 6);
                $file_type3  =   $_FILES['image3']['type'];
                $tmp_name3   =   $_FILES['image3']['tmp_name'];
                $file_error3 =   $_FILES['image3']['error'];
                if($file_error == 0){
                    $part  =   ROOT ."product/";
                    $data['image3'] =   $file_name3;
                }
            }
            if(isset($_FILES['image4'])){
                $file_name4  =   randomString($_FILES['image4']['name'], 6);
                $file_type4  =   $_FILES['image4']['type'];
                $tmp_name4   =   $_FILES['image4']['tmp_name'];
                $file_error4 =   $_FILES['image4']['error'];
                if($file_error == 0){
                    $part  =   ROOT ."product/";
                    $data['image4'] =   $file_name4;
                }
            }
            // $id_insert  =   $db->insert("product", $data);
            $id_update  =   $db->update($open, $data, array("id" => $id));
            if($id_update){
                move_uploaded_file($tmp_name, $part.$file_name);
                move_uploaded_file($tmp_name1, $part.$file_name1);
                move_uploaded_file($tmp_name2, $part.$file_name2);
                move_uploaded_file($tmp_name3, $part.$file_name3);
                move_uploaded_file($tmp_name4, $part.$file_name4);
                if($id_update > 0){
                    foreach($id_detail as $key => $item){
                        foreach($item as $key1 => $item1){
                            $id_dele    =   $db->delete('detail', $item1);
                        }
                    }
                    $detail = postInput('detail');
                    $detail = explode('|', $detail);
                    // array_pop($detail);
                    foreach($detail as $item){
                        if(empty($item)){
                            unset($item);
                        }else{
                            $chitiet = array();
                            $chitiet    = explode('-', $item);
                            $color      = $chitiet[0];
                            $size       = $chitiet[1];
                            // _debug($chitiet[1]);die;
                            $number     = $chitiet[2];
                            $number     = (int) $number;
                            // _debug($number);die;
                            $data3  =   array(
                                            'id_product'    =>  $id,
                                            'color'         =>  $color,
                                            'size'          =>  $size,
                                            'number'        =>  $number
                                        );
                            // _debug($data2);die;
                            $id_insert2     =   $db->insert("detail", $data3);
                        }
                        
                    }
                    // _debug($detail);die;
                }
                $_SESSION['success']    =   "Cập nhật sản phẩm thành công!";
                redirectAdmin("product");
            }else{
                $_SESSION['error']  =   "Cập nhật sản phẩm thất bại!";
                redirectAdmin("product");
            }
        }
    }
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Thêm mới sản phẩm</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>/admin/category/index.php">Sản phẩm</a></li>
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
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Danh mục sản phẩm</p>
                            <select id="id_category" name="id_category" style="width: 500px;">
                            <?php
                                $xhtml  =   "";
                                // _debug($category);die;
                                foreach($category as $key => $item){
                                    $select = ($item['id'] == $EditProduct['id_category']) ? 'selected="selected"' : '';
                                    if($item['key']==1){
                                        unset($item);
                                    }else{
                                        $xhtml  .= '<option value="'.$item['id'].'" '.$select.'>'.$item['name'].'</option>';
                                    }
                                    
                                }
                            ?>
                                <option value="">Mời bạn chọn danh mục sản phẩm</option>
                                    <?php echo $xhtml; ?>
                            </select>
                            <?php
                                if(isset($error['id_category'])) :
                                ?>
                                <p class="text-danger"> <?php echo $error['id_category'] ?> </p>
                            <?php endif ?>
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Tên sản phẩm</p><input type="text" style="width: 500px;" id="name" name="name" value="<?php echo $EditProduct['name'] ?>" placeholder="Tên sản phẩm">
                            <?php
                                if(isset($error['name'])) :
                                ?>
                                <p class="text-danger"> <?php echo $error['name'] ?> </p>
                            <?php endif ?>
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Giá sản phẩm</p><input type="text" style="width: 500px;" id="price" name="price" value="<?php echo $EditProduct['price'] ?>" placeholder="9.000.000">
                            <?php
                                if(isset($error['price'])) :
                                ?>
                                <p class="text-danger"> <?php echo $error['price'] ?> </p>
                            <?php endif ?>
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Giá sản phẩm</p><input type="text" style="width: 500px;" id="detail" name="detail" value="<?php echo $EditProduct['detail'] ?>" placeholder="Yellow-M-20(Màu-Size-Số lượng)">
                            <?php
                                if(isset($error['detail'])) :
                                ?>
                                <p class="text-danger"> <?php echo $error['detail'] ?> </p>
                            <?php endif ?>
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Số lượng</p><input type="text" style="width: 500px;" id="number" name="number" value="<?php echo $EditProduct['number'] ?>" placeholder="100">
                            <?php
                                if(isset($error['number'])) :
                                ?>
                                <p class="text-danger"> <?php echo $error['number'] ?> </p>
                            <?php endif ?>
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Giảm giá</p><input type="text" style="width: 500px;" id="sale" name="sale" placeholder="0">
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Avatar</p><input type="file" style="width: 500px;" id="avatar" name="avatar">
                            <?php
                                if(isset($error['avatar'])) :
                                ?>
                                <p class="text-danger"> <?php echo $error['avatar'] ?> </p>
                            <?php endif ?>
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Hình ảnh 1</p><input type="file" style="width: 500px;" id="image1" name="image1">
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Hình ảnh 2</p><input type="file" style="width: 500px;" id="image2" name="image2">
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Hình ảnh 3</p><input type="file" style="width: 500px;" id="image3" name="image3">
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Hình ảnh 4</p><input type="file" style="width: 500px;" id="image4" name="image4">
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Nội dung</p>
                            <textarea name="content" id="content" rows="5" style="width: 500px;" value="<?php echo $EditProduct['content'] ?>"><?php echo $EditProduct['content'] ?></textarea>
                            <?php
                                if(isset($error['content'])) :
                                ?>
                                <p class="text-danger" style="margin-left: 300px;"> <?php echo $error['content'] ?> </p>
                            <?php endif ?>
                        </div>
                        </br>
                        <div class="rowform">
                            <button type="submit" class="btn btn-success"> Lưu </button>
                            <input type="button" value="Cancel" name="cancel" onclick="returnProduct()" class="btn btn-success">
                        </div>
                    </form>
                </div>
                
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>