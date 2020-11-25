<?php 
    
    $open = "product";
    require_once __DIR__."/../../autoload/autoload.php";
    if(!isset($_SESSION['fashion_admin_id'])){
        $urlt = base_url()."admin/dang-nhap.php";
        echo "<script>alert('Mời bạn hãy đăng nhập');location.href='$urlt'</script>";
    }
    $category = $db->fetchAll("category", $_SESSION['id_store_admin']);
    
    // _debug($_SESSION);die;
    $id_store = $_SESSION['id_store_admin'];
    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p = 1;
    }
    
    // Kiểm tra xem tồn tại post không, nếu không thì select tất cả, nếu có thì chỉ select phần danh mục được chọn
    //  Số trang trong 1 page
    $x = 9;
    if($_SERVER["REQUEST_METHOD"] != "POST" && !isset($_SESSION['id_category']) || ($_SESSION['id_category'] == 'all')){
        unset($_SESSION['id_category']);
        $sql = "SELECT product.*,category.name as namecate FROM product
            LEFT JOIN category on category.id = product.id_category
            WHERE product.id_store = '$id_store'
            ";
        $countTable = $db->countTableSQL($sql);
        $product = $db->fetchJone($countTable,$sql,$p, $x,true);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $_SESSION['id_category'] = $_POST['id_category'];
        
        $id_category = $_SESSION['id_category'];
        header('Location: '.base_url().'admin/modules/product/index.php');
        $id_category = (int) $id_category;
        // _debug($id_category);die;
        $sql = "SELECT product.*,category.name as namecate FROM product
            LEFT JOIN category on category.id = product.id_category
            WHERE product.id_store = '$id_store'
                AND product.id_category = '$id_category'
            ";
        
        $countTable = $db->countTableSQL($sql);
        $product = $db->fetchJone($countTable,$sql,$p, $x,true);
    }else{
        $id_category = $_SESSION['id_category'];
        $id_category = (int) $id_category;
        // _debug($id_category);die;
        
        $sql = "SELECT product.*,category.name as namecate FROM product
            LEFT JOIN category on category.id = product.id_category
            WHERE product.id_store = '$id_store'
                AND product.id_category = '$id_category'
            ";
        $countTable = $db->countTableSQL($sql);
        $product = $db->fetchJone($countTable,$sql,$p, $x,true);
    }
    // $sqldetail =    'SELECT d.*
    //                 FROM detail as d, product as p
    //                 WHERE d.id_product = p.id
    //                     AND p.id = 68
    //                 ';
    // $detailpro = $db->fetchsql($sqldetail);
    // // _debug($detailpro);die;
    // $xhtmldetail = '';
    // foreach($detailpro as $item){
        
    //     $xhtmldetail .= '- Màu: '.$item['color'].', Size: '.$item['size'].', Số  lượng: '.$item['number'].'';
    //     $xhtmldetail .= '<br />';
    // }
    // _debug($xhtmldetail);die;
    // _debug($product);die;
    if(isset($product['page'])){
        $sotrang = $product['page'];
        unset($product['page']);
    }
    // _debug($product);die;
    // _debug($product[0]['detail']);die;
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sản phẩm</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="add.php"
                            class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Thêm mới</a>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>/admin/index.php">Trang chủ</a></li>
                            <li class="active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>
                <?php 
                    require_once __DIR__."/../../../errors/errors.php";
                ?>
                <!-- /.row -->
                <!-- /row -->
                <div class="row">
                    <form class="frm" action="#" method="POST">
                        <div class="rowform">
                            <p style="width: 200px; float: left; text-align: right; margin-right: 20px;">Danh mục sản phẩm</p>
                            <select id="id_category" name="id_category" style="width: 500px;">
                            <?php
                                $xhtml  =   "";
                                $xhtml  .= '<option value="all">Xem tất cả</option>';
                                foreach($category as $key => $item){
                                    if($item['key']==1){
                                        unset($item);
                                    }else{
                                        
                                        if($item['id'] == $id_category){
                                            $xhtml  .= '<option value="'.$item['id'].'" selected>'.$item['name'].'</option>';
                                        }else{
                                            $xhtml  .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                        }
                                        
                                    }
                                    
                                }
                            ?>
                                    <?php echo $xhtml; ?>
                            </select>
                            <?php
                                if(isset($error['id_category'])) :
                                ?>
                                <p class="text-danger"> <?php echo $error['id_category'] ?> </p>
                            <?php endif ?>
                            <button type="submit" class="btn btn-success"> Xem </button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Danh mục</th>
                                            <th>Avatar</th>
                                            <th>Thông tin chi tiết</th>
                                            <!-- <th>Ảnh 1</th>
                                            <th>Ảnh 2</th>
                                            <th>Ảnh 3</th>
                                            <th>Ảnh 4</th> -->
                                            <th>Giá</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        if(isset($_GET['page'])){
                                            $num    =   getInput('page');
                                            $count  = 1 + ($num - 1) * $x;
                                        }else{
                                            $count = 1;
                                        }
                                        $xhtml  = "";
                                        foreach($product as $key => $item){
                                            unset($item['page']);
                                            // $sqldetail =    'SELECT * 
                                            //                 FROM detail as d, product as p
                                            //                 WHERE d.id_product = p.id
                                            //                     AND p.id = '.$item['id'].'
                                            //                 ';
                                            
                                            // $deHTML = "";
                                            // $detail = explode('|',$item['detail']);
                                            // foreach($detail as $key1 => $item1){
                                            //     if(empty($item1)){
                                            //         unset($item1);
                                            //     }else{
                                            //         $detail = explode('-', $item1);
                                            //         $deHTML .= "- Màu: $detail[0], Size: $detail[1], Số lượng: $detail[2]";
                                            //         $deHTML .= "<br />";
                                            //     }
                                                
                                            // }

                                            $sqldetail =    'SELECT d.*
                                                            FROM detail as d, product as p
                                                            WHERE d.id_product = p.id
                                                                AND p.id = '.$item['id'].'
                                                            ';
                                            $detailpro = $db->fetchsql($sqldetail);
                                            // _debug($detailpro);die;
                                            $xhtmldetail = '';
                                            foreach($detailpro as $item1){
                                                
                                                $xhtmldetail .= '- Màu: '.$item1['color'].', Size: '.$item1['size'].', Số  lượng: '.$item1['number'].'';
                                                $xhtmldetail .= '<br />';
                                            }
                                            // if(isset($product[0])){
                                            //     $detail = explode('|',$product[0]['detail']);
                                            //     _debug($detail);die;
                                            //     foreach($detail as $key => $item){
                                            //         $detail = explode('-', $item);
                                            //         $deHTML .= "- Màu: $detail[0], Size: $detail[1], Số lượng: $detail[2]";
                                            //         $deHTML .= "<br />";
                                            //     }
                                            // }
                                            $id = $item['id'];
                                            $xhtml  .=  '<tr>
                                                            <td>' . $count . '</td>
                                                            <td>'. $item['name'] .'</td>
                                                            <td>'. $item['namecate'] .'</td>
                                                            <td><img src="'.uploads().'product/'.$item['avatar'].'" alt="'. $item['name'] .'" width="80px" height="80px"></td>
                                                            <td>'. $xhtmldetail .'</td>
                                                            <td>'.formatPrice($item['price']).'</td>
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
                                <div class="pull-right">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                        <li>
                                        <a  href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        </a>
                                        </li>
                                        <?php for($i = 1; $i <= $sotrang; $i++): ?>
                                            <?php
                                                if(isset($_GET['page'])){
                                                    $p = $_GET['page'];
                                                }
                                                else{
                                                    $p = 1;
                                                }
                                            ?>
                                            <li class="<?php echo ($i == $p) ? 'active' : '' ?>" >
                                                <a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor ?>
                                        <li>
                                        <a  href="" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        </a>
                                        </li>
                                        </ul>
                                    </nav>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php require_once __DIR__."/../../layouts/footer.php"; ?>