<?php 
    require_once __DIR__."/../../autoload/autoload.php"; 
    if(!isset($_SESSION['fashion_admin_id'])){
        echo "<script>alert('Mời bạn hãy đăng nhập');location.href='/../dang-nhap.php'</script>";
    }
    $open = "transaction";
    $id_store = $_SESSION['id_store_admin'];
    $idtran = intval(getInput('id'));
    // _debug($id);die;
    $sql = 'SELECT * FROM `transaction` WHERE id = '.$idtran.'';
    $transaction = $db->fetchsql($sql);
    // _debug($transaction);die;
    $sqltran = 'SELECT * FROM `orders` WHERE id_transaction = '.$idtran.'';
    // _debug($sqltran);die;
    $tranorders = $db->fetchsql($sqltran);
    // _debug($tranorders);die;
    // $id = 68;
    // $sqlpro = 'SELECT * FROM `product` WHERE id = '.$id.'';
    // // _debug($sqlpro);die;
    // $tranproduct = $db->fetchsql($sqlpro);
    // _debug($tranproduct);die;
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
                        <!-- <a href="add.php"
                            class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Thêm mới</a> -->
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li><a href="<?php echo base_url(); ?>/admin/transacion/index.php">Quản lý đơn hàng</a></li>
                            <li class="active">Chi tiết đơn hàng</li>
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
                                            <th>Tên sản phẩm</th>
                                            <th>Màu</th>
                                            <th>Size</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count  = 1;
                                        $xhtml  = "";
                                        foreach($tranorders as $key => $item){
                                            $id = $item['id_product'];
                                            $sqlpro = 'SELECT * FROM `product` WHERE id = '.$id.'';
                                            $product = $db->fetchsql($sqlpro);
                                            $name = $product[0]['name'];
                                            $xhtml  .=  '<tr>
                                                            <td>' . $count . '</td>
                                                            <td>'. $name.'</td>
                                                            <td>'. $item['color'] .'</td>
                                                            <td>'. $item['size'] .'</td>
                                                            <td>'. $item['qty'] .'</td>
                                                            <td>'. $item['price'] .'</td>
                                                            <td>'. $item['price']*$item['qty'] .'</td>
                                                        </tr>';
                                            $count++;
                                        }
                                        echo $xhtml;
                                    ?>
                                    
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Tổng</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><?php echo formatPrice($transaction[0]['amount']) ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>