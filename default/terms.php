<!DOCTYPE html>
<html lang="vi">
<?php    
include_once("../includes/head.php");
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Chào mừng------>
<section class="hero-wrap" style="background-image: url('../assets/images/big-img-6.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<p class="breadcrumbs"><span class="me-2"><a href="../users/booking.php">Đặt Phòng <i class="fa fa-chevron-right"></i></a></span> <span>Điều Khoản và Điều Kiện</span></p>
<h1 class="mb-4">Điều Khoản và Điều Kiện</h1>
</div>
</div>
</div>
</section>
    <!-----Kết Thúc Chào mừng------>
    
<!---Điều Khoản và Điều Kiện ----->
    <section class="ftco-section bg-light justify-content-center">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-3 col-xl-4 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-legal"></span></div>
    <div class="text">
<h1 class="text-muted">Đồng Ý Với Điều Khoản</h1>
</div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center my-4">
<div class="col-md-12">
    
<div class="wrapper justify-content-center">
<div class="row g-0 justify-content-center">
<div class="col-lg-8 justify-content-center">   
    <div id="form-holder">
    <ol>
        <li class="mb-2">Giờ Nhận Phòng / Trả Phòng là 12:00 Trưa và bất kỳ gia hạn nào phải được xác nhận với quản lý.</li>
    <li class="mb-2">Khách không được phép vào phòng sau 10:00 giờ tối.</li>
        <li class="mb-2">Khách đến thăm phải được giải trí tại nhà hàng của chúng tôi.</li>
        <li class="mb-2">Két sắt an toàn có sẵn trong phòng. Ban quản lý không chịu trách nhiệm về việc mất mát của tài sản bỏ lại trong phòng/két sắt.</li>
        <li class="mb-2">Khách hàng phải kiểm tra và nhận phòng với thẻ căn cước do chính phủ cấp vì lý do bảo mật.</li>
        <li class="mb-2">Vui lòng lưu ý rằng bản sao của thẻ đăng ký kèm theo chứng minh nhân dân sẽ được gửi cho Cảnh sát khi được yêu cầu.</li>
        <li class="mb-2">Khách không được rời khỏi khuôn viên khách sạn với bất kỳ vật phẩm hoặc đồ vật nào không phải của họ.</li>
        <li class="mb-2">Trong trường hợp bất kỳ khoản phí nào chưa được thanh toán vào thời điểm trả phòng, thông tin thẻ tín dụng và thừa nhận trên thẻ đăng ký này sẽ được coi là sự ủy quyền cho các khoản chưa thanh toán.</li>
        <li class="mb-2">Khách hàng có đặt phòng không thể hủy sẽ phải chịu trách nhiệm cho toàn bộ thời gian đặt phòng ban đầu của họ.</li>
        <li class="mb-2">Luật pháp được sinh ra từ kinh nghiệm; do đó, các điều khoản và điều kiện của chúng tôi có thể thay đổi, được xem xét và cập nhật.</li>
        <li class="mb-2" >Tôi đã đọc và đồng ý với các điều khoản và điều kiện điều chỉnh kỳ nghỉ của mình tại Khách Sạn Quang-Huy.</li>
    </ol>
    </div>
    
    </div>
    </div>
    </div>
        </div>
    </div>
        </div>
    </section>
    <!---Kết Thúc Điều Khoản và Điều Kiện ----->
    <?php
    include_once("../includes/footer.php");
    ?>
    </body>
    <style>
        #form-holder{
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.25);
            border-top: 1px solid rgba(255,255,255,0.5);
            border-left: 1px solid rgba(255,255,255,0.5);
            padding: 40px;
            background: none;
            margin-bottom: 40px !important;
        }
        
    
    </style>
</html>
