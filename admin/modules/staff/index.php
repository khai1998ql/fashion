<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    if(!isset($_SESSION['fashion_admin_id'])){
        $urlt = base_url()."admin/dang-nhap.php";
        echo "<script>alert('Mời bạn hãy đăng nhập');location.href='$urlt'</script>";
    }
    $open = "staff";
    $id_store   = $_SESSION['id_store_admin'];
    $sqlstaff   = 'SELECT * FROM `staff` WHERE position = 0';
    $staff = $db->fetchsql($sqlstaff);
    // _debug($staff);die;
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Nhân viên</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="add.php"
                            class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Thêm mới</a>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active">Nhân viên</li>
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
                                            <th>Email</th>
                                            <th>Tuỏi</th>
                                            <th>Địa chỉ</th>
                                            <th>Lương</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count  = 1;
                                        $xhtml  = "";
                                        $date = getdate();
                                        foreach($staff as $key => $item){
                                            $id = $item['id'];
                                            $xhtml  .=  '<tr>
                                                            <td>' . $count . '</td>
                                                            <td>'. $item['name'] .'</td>
                                                            <td>'. $item['email'] .'</td>
                                                            <td>'. ($date['year']-$item['birth']) .'</td>
                                                            <td>'. $item['address'] .'</td>
                                                            <td>'. $item['salary'] .'</td>
                                                            <td>
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