<!DOCTYPE html>
<html lang="en">
<?php
  include_once("../helper/custom-functions.php");
    include_once("../helper/helper.php");
include_once("../includes/head.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset ($_POST['id'])){
        getDetails($db);
    }
}
?>

<body>
<?php
  include_once("../includes/home_navbar.php");
?>
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/bg_1.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<span class="subheading">Tận hưởng thời gian tuyệt vời của bạn với trải nghiệm xa xỉ tuyệt vời!</span>
<h1 class="mb-4">Chào Mừng Bạn</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>

<!----Availability Check---->

    <section class="ftco-section ftco-no-pb ftco-no-pt ftco-booking">
<div class="container">
<div class="row">
<div class="col-md-12">
<form class="booking-form" >
<div class="row g-0">
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4 border-0">
<label for="#">Nhận Phòng</label>
<div class="form-field">
<div class="icon"><span class="fa fa-calendar"></span></div>
<input type="date" name="checkIn" class="form-control arrival_date" placeholder="Nhận Phòng Date">
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4">
<label for="#">Trả Phòng</label>
<div class="form-field">
<div class="icon"><span class="fa fa-calendar"></span></div>
<input type="date" name="checkOut" class="form-control departure_date" placeholder="Trả Phòng Date">
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
    <div class="form-group ps-4">
        <label for="#">Phòng</label>
        <div class="form-field">
            <div class="select-wrap" >
                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                <select name="rooms" id="rooms" class="form-control" >
                    <?php $rows = getAllRoom($db); ?>
                    <option value="" style="color: #333333;">Tìm phòng</option>
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
<label for="#">Lượng khách</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="guests" id="" class="form-control">
    <option style="color: #333333;" value="">Chọn số lượng khách</option>
<option value="1 person" style="color: #333333;">1 </option>
<option value="2 person" style="color: #333333;">2 </option>
<option value="3 person" style="color: #333333;">3 </option>
<option value="4 person"style="color: #333333;">4 </option>
<option value="5 person"style="color: #333333;">5 </option>
<option value="6-9 person"style="color: #333333;">6-9 </option>
<option value="10+ person"style="color: #333333;">10+ </option>
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

    <!-----End of Availability Check------>

    <!---About Us----->

    <section class="ftco-section ftco-about-section">
<div class="container-xl">
<div class="row g-xl-5">
<div class="col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="row">
<div class="col-md-6">
<div class="f-services d-md-flex flex-md-column-reverse">
<div class="img w-100" style="background-image: url(../assets/images/f-services.jpg);"></div>
<div class="text w-100 p-4 text-center mb-md-4">
<div class="icon"><span class="fa fa-house-user"></span></div>
<h3>Phòng Ốc Ấm Cúng</h3>
<p>Chúng tôi có các phòng sang trọng khác nhau phù hợp với sở thích của bạn. Đây là nơi bạn gọi là nhà!</p>
</div>
</div>
</div>
<div class="col-md-6">
<div class="f-services">
<div class="img w-100 mb-md-4" style="background-image: url(../assets/images/f-services-2.jpg);"></div>
<div class="text w-100 p-4 text-center">
<div class="icon"><span class="fa fa-lightbulb"></span></div>
<h3>Các Ưu Đãi Đặc Biệt</h3>
<p>Chúng tôi mang đến những dịch vụ tốt nhất cho khách hàng của chúng tôi.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 heading-section d-flex align-items-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="mt-5 mt-md-0">
<span class="subheading">Về Chúng Tôi</span>
<h2 class="mb-4">Khách Sạn QuangHuy</h2>
<p class="mb-5">Nếu bạn đang tìm kiếm một khách sạn cao cấp, Quang-Huy là địa điểm hoàn hảo. Khách sạn của chúng tôi kết hợp sự hiện đại ngày nay với sự thanh lịch cổ điển. Bạn sẽ thích thú với sự tiện lợi của các phòng và suite được thiết kế lại, phòng tập thể dục đầy đủ dịch vụ, hồ bơi, nhà hàng lớn và một số quầy bar và phòng lounge tốt nhất để kỷ niệm và giải trí trong phong cách tinh tế.</p>
<p><a href="../users/booking.php" class="btn btn-primary py-3 px-4">Đặt Phòng Ngay</a></p>
</div>
</div>
</div>
</div>
</section>

    <!---- End of About Us---->

    <!----Our Services---->

    <section class="ftco-section">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">

<span class="subheading">Dịch Vụ Của Quang-Huy</span>
<h2 class="mb-4">Các Dịch Vụ Của Khách Sạn Chúng Tôi</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-wifi"></span></div>
<div class="text">
<h2>Wifi miễn phí</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-bed"></span></div>
<div class="text">
<h2>Đặt phòng dễ dàng</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-bread-slice"></span></div>
<div class="text">
<h2>Nhà hàng</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-swimming-pool"></span></div>
<div class="text">
<h2>Hồ bơi</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-spa"></span></div>
<div class="text">
<h2>Đẹp &amp; Trong lành</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-hands-helping"></span></div>
<div class="text">
<h2>Hỗ trợ nhanh chóng</h2>
</div>
</div>
</div>
</div>
</div>
</section>

    <!------End of our Services---->

<!----Phòng Nổi Bật---->
<section class="ftco-section bg-light">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Các Phòng Của Chúng Tôi</span>
<h2 class="mb-4">Phòng/Hội Trường Nổi Bật</h2>
</div>
</div>
<div class="row justify-content-center">
    <?php
           $rows = getThreeRooms($db);
           while($row = mysqli_fetch_assoc($rows)):

           ?>

<div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
<div class="room-wrap d-md-flex flex-md-column-reverse">
<a href="../default/room_details.php?id=<?php echo $row['id'];?>" class="img img-room" style="background-image: url(<?php echo $row['room_image']; ?>);">
</a>
<div class="text p-4 text-center" style="height:50% !important">
<h3><a href="../default/room_details.php?id=<?php echo $row['id'];?>"><?php echo $row['room_name']; ?></a></h3>
<p><?php echo $row['room_subject']; ?></p>
<p class="mb-0 mt-2"><span class="me-3 price"><?php echo App\helper::formatAmount($row['room_price']); ?> <small>/ đêm</small></span><a href="../default/room_details.php?id=<?php echo $row['id'];?>" class="btn-custom">Chi Tiết</a></p>
</div>
</div>
</div>

    <?php endwhile; ?>
</div>
    <div class="row justify-content-center">
    <div class="col-md-6 col-lg-2 d-flex" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
        <a href="../default/rooms.php" class="btn btn-primary p-4 py-3">XEM THÊM</a>
        </div>
    </div>
</div>
</section>
<!----Kết thúc phòng nổi bật---->

<!---Hiển thị Nhà hàng và Quầy Bar----->
    <section class="ftco-section">
<div class="container-fluid">
<div class="row justify-content-center pb-4">
<div class="col-md-7 text-center heading-section" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Nhà Hàng &amp; Quầy Bar</span>
<h2 class="mb-3">Nhà Hàng &amp; Quầy Bar</h2>
</div>
</div>
<div class="row g-md-5">
<div class="col-md-12 col-xl-5 d-flex align-items-stretch">
<div class="img w-100 img-cuisine" style="background-image: url(../assets/images/resto-bar.jpg);" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-bread-slice"></span></div>
</div>
</div>
<div class="col-md-12 col-xl-7 ps-xl-5">
<div class="row g-md-2">
<div class="col-md-6">
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/local.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Súp Rau Sạch</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/chicken.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Gà Sốt Kem</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/nkwobi.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Thịt Nướng Nkwobi</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/rice.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Cơm Chiên Bò</span></h3>

</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/menu-5.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Bò Nướng Kèm Khoai</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/fish.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Cá Hấp</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/menu-7.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Nước Ép Tự Nhiên Đa Dạng</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/menu-1.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Các Món Bánh Nướng Đa Dạng</span></h3>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<br>
    </br>
    <br>
    </br>

<?php
    include_once("../includes/footer.php");

?>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#d4b55d"
    }
  },
  "type": "opt-out"
});
</script>
</body>
