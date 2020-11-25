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
    }else{
        $sql = 'SELECT id
        FROM `detail`
        WHERE id_product = '.$id.'';
        // _debug($sql);die;
        $id_detail = $db->fetchsql($sql);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $delete = $db->delete($open, $id);
            if($delete > 0){
                foreach($id_detail as $key => $item){
                    foreach($item as $key1 => $item1){
                        $id_dele    =   $db->delete('detail', $item1);
                    }
                }
                $_SESSION['success'] = "Xóa sản phẩm thành công!";
                redirectAdmin($open);
            }else{
                $_SESSION['error'] = "Xóa sản phẩm thất bại!";
                redirectAdmin($open);
            }
            
        }
    }
    
    
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Xóa sản phẩm</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>/admin/category/index.php">Sản phẩm</a></li>
                            <li class="active">Xóa sản phẩm</li>
                        </ol>
                    </div>
                </div>
                <?php 
                    require_once __DIR__."/../../../errors/errors.php";
                ?>
                <div class="row">
                    <form class="frm" action="#" method="POST" enctype="multipart/form-data">
                        
                        
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
                            <button type="submit" class="btn btn-success"> Xác nhận xóa </button>
                            <input type="button" value="Cancel" name="cancel" onclick="returnProduct()" class="btn btn-success">
                        </div>
                    </form>
                </div>
                
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>