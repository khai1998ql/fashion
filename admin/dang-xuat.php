<?php
    session_start();
    unset($_SESSION['fashion_admin_id']);
    unset($_SESSION['fashion_admin_name']);
    unset($_SESSION['fashion_admin_avatar']);
    unset($_SESSION['fashion_admin']);
    unset($_SESSION['fashion_admin_position']);
    echo "<script>alert('Đăng xuất thành công!');location.href='dang-nhap.php'</script>";
?>