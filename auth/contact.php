<!DOCTYPE html>
<html lang="en">
<?php    
    
    include_once("../helper/functions.php");
include_once("../includes/head.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['sendMessage'])){
        insertEnquiry($db);
    }
}
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/gallery-5.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<p class="breadcrumbs"><span class="me-2"><a href="../default/home.php">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Liên Hệ</span></p>
<h1 class="mb-4">Liên Hệ Chúng Tôi</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>
    <div class="row justify-content-center">
    <div class="col-lg-8">
           <?php if(isset($_SESSION['success'])): ?>
                <ul class="error-msg">
                <li class="alert alert-success alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['success']; ?></li>
                </ul>
                <?php endif; ?>
                <?php if(isset($_SESSION['error'])): ?>
                <ul class="error-msg">
                <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['error']; ?></li>
                </ul>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['errors'])): ?>
                <?php foreach($_SESSION['errors'] as $err => $errMsg) : ?>
                <ul class="error-msg">
                <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $errMsg; ?></li>
                </ul>
                <?php endforeach; ?>
                <?php endif; ?>
        </div>
    </div>
<section class="ftco-section bg-light justify-content-center">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
     
<div class="wrapper justify-content-center">
<div class="row g-0 justify-content-center">
<div class="col-lg-10">
<div class="contact-wrap w-100 p-md-5 p-4">
<h3>Liên Hệ</h3>
<p class="mb-4">Chúng tôi mở cho bất kỳ đề xuất nào hoặc chỉ để trò chuyện</p>
<div class="row">
<div class="col-md-4">
<div class="dbox w-100 d-flex align-items-start">
<div class="text">
<p><span>Địa Chỉ:</span> #BTL , HÀ NỘI</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="dbox w-100 d-flex align-items-start">
<div class="text">
<p><span>Email:</span> quanghuy&#64;gmail.com</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="dbox w-100 d-flex align-items-start">
<div class="text">
<p><span>SĐT:</span> +0987654321</p>
</div>
</div>
</div>
</div>
   <br>
    </br>
<form id="contactForm" name="contactForm" class="contactForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="row">
    
<div class="col-md-12">
 
<div class="form-group mb-3">
<input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" required>
</div>
</div>
<div class="col-md-12">
<div class="form-group mb-3">
<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
</div>
</div>
<div class="col-md-12">
<div class="form-group mb-4">
<input type="text" class="form-control" name="subject" id="subject" placeholder="Chủ đề" required>
</div>
</div>
<div class="col-md-12">
<div class="form-group mb-5">
<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Tạo một thông điệp ở đây" required></textarea>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<button type="submit" name="sendMessage" class="btn btn-primary">Gửi</button>
<div class="submitting"></div>
</div>
</div>
</div>
</form>
<div class="w-100 social-media mt-5">
<h3>Theo dõi ở đây</h3>
<ul class="ftco-footer-social list-unstyled mt-2">
<li><a href="#"><span class="fab fa-twitter"></span></a></li>
<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
<li><a href="#"><span class="fab fa-instagram"></span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<?php 
include_once("../includes/footer.php");
    include_once("../includes/js_files.php");
    ?>
    
    </body>    