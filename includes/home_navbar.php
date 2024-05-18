<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['id'])){
    $_SESSION['error']= "Bạn chưa đăng nhập";
    header('Location:../auth/login.php');
}
else if(isset($_SESSION['role']) != "Khách hàng"){
    $_SESSION['error'] = "Truy cập không được ủy quyền";
    header('Location:../admin/dashboard.php');
}
include_once("../helper/functions.php");
include_once("../helper/custom-functions.php");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_POST['id'])){
        getUserProfile($db);
    }elseif(isset($_POST['id'])){
        getUserBooking($db);
    }
}

?>

<nav class="navbar navbar-expand-lg  ftco-navbar-light">
    <div class="container-xl">
        <a class="navbar-brand align-items-center" href="index-2.html">
            <span class="">Quang-Huy <small>Đặt phòng khách sạn</small></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="../default/home.php">Trang Chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="../default/about.php">Giới Thiệu</a></li>
                <li class="nav-item"><a class="nav-link" href="../default/rooms.php">Phòng/Hội Trường</a></li>
                <li class="nav-item"><a class="nav-link" href="../auth/contact.php">Liên Hệ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài Khoản Của Tôi</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../users/profile.php?id=<?php echo $_SESSION['id']; ?>">Hồ Sơ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../users/mybooking.php?id=<?php echo $_SESSION['id']; ?>">Đặt Phòng Của Tôi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../users/change_password.php?id=<?php echo $_SESSION['id']; ?>">Thay Đổi Mật Khẩu</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../auth/logout.php">Đăng Xuất</a>
                    </div>
                </li>    
            </ul>
        </div>
    </div>
</nav>
<?php
include_once("../includes/js_files.php");
?>
