<?php
	require_once __DIR__ ."/autoload/autoload.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// _debug($_POST);die;
		$open = "staff";
		$error = array();
		if(empty($_POST['username']) || empty($_POST['password'])){
			$error['login'] = "Hãy nhập đầy đủ tên đăng nhập và mật khẩu!";
		}
		if(empty($error)){
			$query = 'email = "'.$_POST['username'].'" AND password = "'.md5($_POST['password']).'" and id_store = '.$_SESSION['id_store_admin'].' ';
			// _debug($query);die;
			$staff = $db->fetchOne($open, $query);
			// _debug($staff);die;
			if(!empty($staff)){
				$_SESSION['fashion_admin_id'] 		= $staff['id'];
				$_SESSION['fashion_admin_name'] 	= $staff['name'];
				$_SESSION['fashion_admin_avatar'] 	= $staff['avatar'];
				$_SESSION['fashion_admin_position']	= intval($staff['position']);
				$_SESSION['fashion_admin']			= $staff['id_store'];
				
				echo "<script>alert('Đăng nhập thành công!');location.href='index.php'</script>";
			}
		}
		
		// _debug($staff);die;
		// if($_POST['username'])
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập trang quản lý</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url()?>public/login_admin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/login_admin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="#">
					<span class="login100-form-title p-b-34">
						Đăng nhập Admin
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="username" placeholder="Tài khoản">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('<?php echo base_url()?>public/login_admin/images/dangnhap.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>public/login_admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>public/login_admin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>public/login_admin/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>public/login_admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>public/login_admin/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>public/login_admin/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url()?>public/login_admin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>public/login_admin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>public/login_admin/js/main.js"></script>

</body>
</html>