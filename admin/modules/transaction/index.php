<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    if(!isset($_SESSION['fashion_admin_id'])){
        $urlt = base_url()."admin/dang-nhap.php";
        echo "<script>alert('Mời bạn hãy đăng nhập');location.href='$urlt'</script>";
    }else{
        $open = "transaction";
        $id_store = $_SESSION['id_store_admin'];
        $transaction = $db->fetchAll($open, $id_store);
    }
    // _debug($transaction);die;
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Quản lý đơn hàng</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="add.php"
                            class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Thêm mới</a>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active">Quản lý đơn hàng</li>
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
                                            <th>Giá trị</th>
                                            <th>Hình thức</th>
                                            <th>Trạng thái</th>
                                            <th>Thanh toán</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count  = 1;
                                        $xhtml  = "";
                                        foreach($transaction as $key => $item){
                                            $id = $item['id'];
                                            $form =   ($item['form'] == 1) ? "Online" : "Offline";
                                            $status =   ($item['status'] == 0) ? "Đang xử lý" : "Hoàn thành";
                                            $thanhtoan = ($item['payment'] == 0) ? "Chưa thanh toán" : "Đã thanh toán";
                                            $classtt  =   ($item['payment'] == 1) ? "btn-info" : "btn-default";
                                            $class  =   ($item['status'] == 1) ? "btn-info" : "btn-default";
                                            $classForm  =   ($item['form'] == 1) ? "btn-info" : "btn-default";
                                            $xhtml  .=  '<tr>
                                                            <td>' . $count . '</td>
                                                            <td>'. $item['customer_name'] .'</td>
                                                            <td>'. $item['amount'] .'</td>
                                                            <td>
                                                                <span class="btn btn-xs '. $classForm .'">
                                                                    '. $form .'
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="status.php?id='.$id.'" class="btn btn-xs '. $class .'">
                                                                    '. $status .'
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span href="" class="btn btn-xs '. $classtt .'">
                                                                    '. $thanhtoan .'
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="delete.php?id='.$id.'" class="btn btn-xs btn-danger"><i class = "fa fa-times"></i>Xóa</a>
                                                                <a href="detail.php?id='.$id.'" class="btn btn-xs btn-info"><i class = "fa fa-edit"></i>Chi tiết</a>
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