<?php 
    require_once __DIR__."/autoload/autoload.php"; 
    if(!isset($_SESSION['fashion_admin_id'])){
        echo "<script>alert('Mời bạn hãy đăng nhập');location.href='dang-nhap.php'</script>";
    }
    $sql    = 'SELECT * FROM `transaction` WHERE id_store = '.$_SESSION['id_store_admin'].' ORDER BY id DESC LIMIT 5';
    // _debug($sql);die;
    $transaction    = $db->fetchsql($sql);
    // _debug($transaction);die;
?>
<?php require_once __DIR__."/layouts/header.php"; ?>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row col-sm-12" style="margin-left: 0px;">
                    <?php require_once __DIR__ ."/modules/thongke/doanhthu.php";  ?>
                </div>
                <div class="row col-sm-12" style="margin-left: 0px;">
                    <?php require_once __DIR__ ."/modules/thongke/danhmuc.php";  ?>
                </div><div class="row col-sm-12" style="margin-left: 0px;">
                    <?php require_once __DIR__ ."/modules/thongke/tonkho.php";  ?>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <!-- <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select class="form-control pull-right row b-none">
                                    <option>March 2017</option>
                                    <option>April 2017</option>
                                    <option>May 2017</option>
                                    <option>June 2017</option>
                                    <option>July 2017</option>
                                </select>
                            </div> -->
                            <h3 class="box-title">Đơn hàng gần đây</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>SĐT</th>
                                            <th>Thành tiền</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach($transaction as $item) : ?>
                                        <?php 
                                            
                                            $status = ($item['status'] == 1) ? "Hoàn thành" : 'Đang xử lý';
                                            $class  = ($item['status'] == 1) ? "btn-info" : "btn-default";
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td class="txt-oflo"><?php echo $item['customer_name']; ?></td>
                                            <td><?php echo $item['customer_phone']; ?></td>
                                            <!-- <td class="txt-oflo">April 18, 2017</td> -->
                                            <td><span class="text-info"><?php echo formatPrice($item['amount']); ?></span></td>
                                            <td><span class="<?php echo $class ?>"><?php echo $status; ?></span></td>
                                        </tr>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
                
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/layouts/footer.php"; ?>
