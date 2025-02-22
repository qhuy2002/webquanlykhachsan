<!DOCTYPE html>
<html lang="en">
<?php    
include_once("../includes/head.php");
include_once("../helper/custom-functions.php");
include_once("../helper/helper.php");
    
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset ($_GET['id'])){
        getBookingDetails($db);
    }
}
?>
<body>    
<?php 
include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/banner-slider-2.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
    <p class="breadcrumbs"><span class="me-2"><a href="../default/home.php">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Tài Khoản Của Tôi <i class="fa fa-chevron-right"></i></span> <span> Chi Tiết Đặt Phòng Của Tôi</span></p>
<h1 class="mb-4">Chi Tiết Đặt Phòng Của Tôi</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>

<!----My bookings----->
    
<section class="ftco-section bg-light justify-content-center">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-3 col-xl-4 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-hotel"></span></div>
    <div class="text">
<h1 class="text-muted">Đặt Phòng Của Tôi</h1>
</div>
        </div>
    </div>
    </div>
    <br>
    <div class="row justify-content-center my-4" id="printable">
<div class="col-md-12">
    
<div class="wrapper justify-content-center">
<div class="row g-0 justify-content-center">
<div class="col-lg-12 justify-content-center">
    
    <?php
        $rows = getBookingDetails($db);
        $row = mysqli_fetch_assoc($rows);
           
        ?>
    <div class="card shadow mb-4" >
                                <!-- Card Header - Dropdown -->
            <div class="card-header mb-2">
             <h6 class="m-0 font-weight-bold text-uppercase text-center text-primary">Mã Đặt Phòng Của Tôi: <?php echo $row['booking_number']; ?></h6>
            </div>
        
        <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Đặt Phòng</h6>
            </div>
                                <!-- Card Body -->
        <div class="row">
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        
        <tr>
            <th>Tên Khách Hàng</th>
            <td><?php echo $row['user_name']; ?></td>
            </tr>
        <tr>
            <th>Số Điện Thoại Di Động</th>
            <td><?php echo $row['user_number']; ?></td>
            </tr>
            <tr>
            <th>E-mail</th>
            <td><?php echo $row['user_email']; ?></td>
            </tr>
     
        <tr>
            <th>Giới Tính</th>
            <td><?php echo $row['user_gender']; ?></td>
            </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td><?php echo $row['user_address']; ?></td>
            </tr>
        </table> 
    </table>
    </div> 
      </div>
            
            </div>
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Ngày Đặt Phòng</th>
            <td><?php echo $row['booking_date']; ?></td>
            </tr>
        
            <tr>
            <th>Ngày Nhận Phòng</th>
            <td><?php echo $row['check_in_date']; ?></td>
            </tr>
        <tr>
            <th>Ngày Trả Phòng</th>
            <td><?php echo $row['check_out_date']; ?></td>
            </tr>
        <tr>
            <th>Tên Phòng</th>
            <td><?php echo $row['room_name']; ?></td>
            </tr>
        <tr>
            <th>Giá Đặt Phòng Theo Số Ngày/Ngày</th>
            <td><?php echo App\helper::formatAmount($row['booking_price']); ?></td>
            </tr>
        <tr>
            <th>Số Người Tối Đa</th>
            <td><?php echo $row['max_persons']; ?></td>
            </tr>
        </table> 
    </table>
    </div> 
      </div>
            
            </div>
        </div>
    
    <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">Chú Thích Của Admin</h6>
            </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        
        <tr>
            <th>Tình Trạng Đặt Phòng</th>
            <td><?php echo $row['booking_status']; ?></td>
            </tr>
        
        </table> 
    </table>
    </div> 
      </div>
            
            </div>
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        
        <tr>
            <th>Chú Thích Của Admin</th>
            <td><?php echo $row['admin_remark']; ?></td>
            </tr>
        
        </table> 
    </div> 
      </div>
            
            </div>
        </div>
    
          <div class="row justify-content-center mb-4">
    <div class="col-md-6 col-lg-2 d-flex" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
        <a href="../users/print.php?id=<?php echo $row['id']; ?>" class="btn btn-primary p-4 py-3">IN</a>
        </div>
    </div>  
    
    
                            </div>
    
        
    </div>
    </div>
    
    
    </div>
        </div>
    </div>
    
    
    
    
        </div>
    </section>
    
<!--- End of Bookings display----> 
    
<?php
include_once("../includes/footer.php");
include_once("../includes/js_files.php");
?>
    
</body>
</html>
