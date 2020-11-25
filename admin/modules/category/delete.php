<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    $open   = "category";
    $id     = intval(getInput('id'));
    $EditCategory   =   $db->fetchID("category", $id);
    if(empty($EditCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin('category');
    }else{
        $getname   = $EditCategory['name'];
        $getgroup  = $EditCategory['group'];
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        /**
     * Kiểm tra danh mục đã có sản phảm chưa, nếu có thì k được xóa
     */
        $is_product = $db->fetchOne("product"," id_category = $id ");
        if($is_product == NULL){
            $num = $db->delete("category", $id);
            if($num > 0){
                $_SESSION['success'] = "Xóa thành công!";
                redirectAdmin("category");
            }
            else{
                $_SESSION['error'] = "Xóa thất bại!";
                redirectAdmin("category");
            }
        }
        else{
            $_SESSION['error'] = "Danh mục có sản phẩm,bạn không thể xóa!";
            redirectAdmin("category");
        }
        ////////////////
        $num    = $db->delete('category', $id);
        if($num > 0){
            $_SESSION['success'] = "Xóa danh mục thành công!";
            redirectAdmin("category");
        }else{
            $_SESSION['error'] = "Xóa danh mục thất bai!";
            redirectAdmin("category"); 
        }
    }
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Xóa danh mục sản phẩm</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>/admin/category/index.php">Danh mục sản phẩm</a></li>
                            <li class="active">Xóa danh mục sản phẩm</li>
                        </ol>
                    </div>
                </div>
                <?php 
                    require_once __DIR__."/../../../errors/errors.php";
                ?>
                <div class="row">
                    <form class="frm" action="#" method="POST">
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Tên danh mục</p><input type="text" id="name" name="name" value="<?php echo $getname; ?>" placeholder="Tên danh mục">
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Group</p><input type="text" id="group" name="group" value="<?php echo $getgroup; ?>" placeholder="Tên danh mục">
                        </div>
                        </br>
                        <div class="rowform">
                            <button type="submit" class="btn btn-success"> Xác nhận xóa </button>
                            <input type="button" value="Cancel" name="cancel" onclick="returnCategory()" class="btn btn-success">
                            <!-- <input type="hidden" name="delete"> -->
                        </div>
                    </form>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>