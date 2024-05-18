<!DOCTYPE html>
<html lang="vi">
<?php    
    include_once("../helper/custom-functions.php");
    include_once("../helper/helper.php");
    include_once("../includes/head.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_POST['id'])){
            getDetails($db);
        }
    }
?>
<body>    
<?php 
    include_once("../includes/home_navbar.php");  
?> 
<!-----Chú Ý------>
<section class="hero-wrap" style="background-image: url('../assets/images/gallery-3.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<span class="subheading">Hãy Tận Hưởng Thời Gian Tuyệt Vời Của Bạn Với Trải Nghiệm Sang Trọng Tuyệt Vời!</span>
<h1 class="mb-4">Phòng/Hội Trường Đẹp</h1>
</div>
</div>
</div>
</section>
<!-----Kết Thúc Chú Ý------>
    
<!----Kiểm Tra Sẵn Sàng---->
<section class="ftco-section ftco-no-pb ftco-no-pt ftco-booking">
<div class="container">
<div class="row">
<div class="col-md-12">
<form class="booking-form">
<div class="row g-0">
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4 border-0">
<label for="#">Nhận Phòng</label>
<div class="form-field">
<div class="icon"><span class="fa fa-calendar"></span></div>
<input type="date" name="checkIn" class="form-control arrival_date" placeholder="Ngày Nhận Phòng">
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4">
<label for="#">Trả Phòng</label>
<div class="form-field">
<div class="icon"><span class="fa fa-calendar"></span></div>
<input type="date" name="checkOut" class="form-control departure_date" placeholder="Ngày Trả Phòng">
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4">
<label for="#">Phòng</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="rooms" id="" class="form-control">
     <?php $rows = getAllRoom($db); ?>
    <option style="color: #333333;" value="">Chọn Phòng</option>
        <?php while($row = mysqli_fetch_assoc($rows)): ?>
<option value="<?php echo $row['room_name']; ?>" style="color: #333333;"><?php echo $row['room_name']; ?></option>
<?php endwhile; ?>
</select>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4">
<label for="#">Khách</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="guests" id="" class="form-control">
    <option style="color: #333333;" value="">Chọn Khách</option>
    <option style="color: #333333;" value="1">1</option>
    <option style="color: #333333;" value="2 người">2</option>
    <option style="color: #333333;" value="3 người">3</option>
    <option style="color: #333333;" value="4 người">4</option>
    <option style="color: #333333;" value="5 người">5</option>
    <option style="color: #333333;" value="6-9 người">6-9</option>
    <option style="color: #333333;"value="10+ người">10+</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-md-12 col-lg d-flex">
<div class="form-group d-flex border-0">
<div class="form-field w-100 align-items-center d-flex">
<a href="../default/available.php" class="d-flex justify-content-center align-items-center align-self-stretch form-control btn btn-primary py-lg-4 py-xl-0"><span>Kiểm tra</span></a>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
<!-----Kết Thúc Kiểm Tra Sẵn Sàng------>
    
<!---Hiển Thị Các Phòng ----->
<section class="ftco-section bg-light">
<div class="container-xl">
<div class="row justify-content-center">
    <?php
           $rows = getAllAvailableRoom($db);
           while($row = mysqli_fetch_assoc($rows)):
           ?>
<div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
<div class="room-wrap d-md-flex flex-md-column-reverse">
<a href="../default/room_details.php?id=<?php echo $row['id'];?>" class="img img-room" style="background-image: url(<?php echo $row['room_image']; ?>);"></a>
<div class="text p-4 text-center" style="height:50% !important">
<h3><a href="../default/room_details.php?id=<?php echo $row['id'];?>"><?php echo $row['room_name']; ?></a></h3>
<p><?php echo $row['room_subject']; ?></p>
<p class="mb-0 mt-2"><span class="me-3 price"><?php echo App\helper::formatAmount($row['room_price']); ?> <small>/ đêm</small></span><a href="../default/room_details.php?id=<?php echo $row['id'];?>" class="btn-custom">Chi Tiết</a></p>
</div>
</div>
</div>
    <?php endwhile; ?>
</div>
</div>
</section>
<hr>
<!--- Kết Thúc Hiển Thị Các Phòng---->    

<!---Dịch vụ của chúng tôi----->
<section class="ftco-section">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Dịch Vụ Của Quang-Huy</span>
<h2 class="mb-4">Dịch Vụ Khách Sạn Của Chúng Tôi</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-wifi"></span></div>
<div class="text">
<h2>Wifi Miễn Phí</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-bed"></span></div>
<div class="text">
<h2>Đặt Phòng Dễ Dàng</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-bread-slice"></span></div>
<div class="text">
<h2>Nhà Hàng</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-swimming-pool"></span></div>
<div class="text">
<h2>Bể Bơi</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-spa"></span></div>
<div class="text">
<h2>Làm Đẹp &amp; Sức Khỏe</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-hands-helping"></span></div>
<div class="text">
<h2>Hỗ Trợ</h2>
</div>
</div>
</div>
</div>
</div>
</section>
<!---Kết Thúc Hiển Thị Dịch Vụ---->
    
<!---Chân trang---->
<?php 
    include_once("../includes/footer.php");
?>
<!---Kết Thúc Chân Trang---->
</body>
</html>
