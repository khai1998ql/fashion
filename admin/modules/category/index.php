<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    if(!isset($_SESSION['fashion_admin_id'])){
        $urlt = base_url()."admin/dang-nhap.php";
        echo "<script>alert('Mời bạn hãy đăng nhập');location.href='$urlt'</script>";
    }else{
        $open = "category";
        $id_store = $_SESSION['id_store_admin'];
        $category = $db->fetchAll($open, $id_store);
    }
    
    
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Danh mục sản phẩm</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="add.php"
                            class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Thêm mới</a>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active">Danh mục sản phẩm</li>
                        </ol>
                    </div>
                </div>
                <?php 
                    require_once __DIR__."/../../../errors/errors.php";
                ?>
                <!-- /.row -->
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <!-- <th>Hiển thị</th> -->
                                            <th>Group</th>
                                            <th>Key</th>
                                            <th>Cập nhật lần cuối</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <td>
                                                                <a href="status.php?id='.$id.'" class="btn btn-xs '. $class .'">
                                                                    '. $status .'
                                                                </a>
                                                            </td> -->
                                    <?php
                                        $count  = 1;
                                        $xhtml  = "";
                                        foreach($category as $key => $item){
                                            $id = $item['id'];
                                            // $status =   ($item['status'] == 1) ? "Hiển thị" : "Không";
                                            $key =   ($item['key'] == 1) ? "Có" : "Không";
                                            $class  =   ($item['status'] == 1) ? "btn-info" : "btn-default";
                                            $classKey  =   ($item['key'] == 1) ? "btn-info" : "btn-default";
                                            $xhtml  .=  '<tr>
                                                            <td>' . $count . '</td>
                                                            <td>'. $item['name'] .'</td>
                                                            
                                                            <td>'. $item['group'] .'</td>
                                                            <td>
                                                                <a href="key.php?id='.$id.'" class="btn btn-xs '. $classKey .'">
                                                                    '. $key .'
                                                                </a>
                                                            </td>
                                                            <td>'. $item['update_at'] .'</td>
                                                            <td>
                                                                <a href="edit.php?id='.$id.'" class="btn btn-xs btn-info"><i class = "fa fa-edit"></i>Sửa</a>
                                                                <a href="delete.php?id='.$id.'" class="btn btn-xs btn-danger"><i class = "fa fa-times"></i>Xóa</a>
                                                            </td>
                                                        </tr>';
                                            $count++;
                                        }
                                        echo $xhtml;
                                    ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>