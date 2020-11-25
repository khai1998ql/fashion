<?php
    require_once __DIR__."/autoload/autoload.php";
//neu tồn tại biến term từ gửi sang
    if(isset($_GET['term']))
    {
        //lay từ khóa cần tìm kiếm
        $key = $_GET['term'];
        
        //cau hinh thong tin ket noi CSDL
    //Kết nối tới csdl
        // $conn = mysql_connect("localhost", "root", "") or die("can't connect database");
        // //Lựa chọn csdl và cho phép hiển thị mã utf8
        // mysql_select_db("autocomplete",$conn);
        // mysql_query("SET NAMES 'utf8'");
        
        //cau lenh truy van tim kiem voi tu khoa
        $req = "SELECT name, avatar, price, id "
            . "FROM product "
                . "WHERE name LIKE '%" . $key . "%' ";
        $query = mysqli_query($db->link,$req);
        
        while ($row = mysqli_fetch_array($query)) {
            $results[] = array('label' => $row['name']);
            // $results[] = array('label' => '<a href='.base_url().'public/uploads/product/san-pham?id='.$row['id'].'>'.$row['name'].'</a>');
        }
        //trả về dữ liệu dạng json
        // echo $results;
        echo json_encode($results);
}