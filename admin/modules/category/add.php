<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    $open = "category";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $data   =   array(
                        "name"  =>  postInput('name'),
                        'sub'   =>  to_sub(postInput('name')),
                        'group' =>  postInput('group'),
                        'id_store'  => $_SESSION['id_store_admin'],
                        'created_at'     =>  date('Y-m-d H:i:s', time()),
                        'update_at'     =>  date('Y-m-d H:i:s', time())
                    );
        $error = array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $name   =   postInput('name');
        $group   =   postInput('group');
        if($name == "" || $group == ""){
            $error[]    =   "Mời bạn hãy nhập đầy đủ dữ liệu!";
        }
        if(empty($error)){
            $isset  =   $db->fetchOne("category", "name = '$name' ");
            if(count($isset) > 0){
                $_SESSION['error']  =   "Tên danh mục đã tồn tại!";
            }else{
                $id_insert  =   $db->insert("category", $data);
                if($id_insert > 0){
                    $_SESSION['success'] = "Thêm mới thành công!";
                    redirectAdmin("category");
                }else{
                    $_SESSION['error'] = "Thêm mới thất bại!";   
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
                        <h4 class="page-title">Thêm mới danh mục sản phẩm</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>/admin/category/index.php">Danh mục sản phẩm</a></li>
                            <li class="active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
                <?php 
                    require_once __DIR__."/../../../errors/errors.php";
                ?>
                <div class="row">
                    <form class="frm" action="#" method="POST">
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Tên danh mục</p><input type="text" id="name" name="name" placeholder="Tên danh mục">
                        </div>
                        </br>
                        <div class="rowform">
                            <p style="width: 200px; float: left;">Group</p><input type="text" id="group" name="group" placeholder="Tên danh mục">
                        </div>
                        </br>
                        <div class="rowform">
                            <button type="submit" class="btn btn-success"> Lưu </button>
                            <input type="button" value="Cancel" name="cancel" onclick="returnCategory()" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>