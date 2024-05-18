<!DOCTYPE html>
<html lang="vi">
<?php    
include_once("../includes/head.php");
include_once("../helper/custom-functions.php");
?>
<body>
    
    
    
<div class="wrapper container justify-content-center mb-4">
<div class="row g-0 justify-content-center">
<div class="col-lg-12 justify-content-center">
    
    <?php
        $rows = getBookingDetails($db);
        $row = mysqli_fetch_assoc($rows);
    ?>
    <div class="card shadow mb-4">
        <!-- Tiêu đề Thẻ Card - Dropdown -->
        <div class="card-header mb-2">
            <h6 class="m-0 font-weight-bold text-uppercase text-center text-primary">Số Đặt Phòng Của Tôi: <?php echo $row['booking_number']; ?></h6>
        </div>
        
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Đặt Phòng</h6>
        </div>
        <!-- Thân Thẻ Card -->
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
                                <th>Email</th>
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
                                <th>Giá Đặt Phòng Cho Số Ngày/Đêm</th>
                                <td><?php echo App\helper::formatAmount($row['booking_price']); ?></td>
                            </tr>
                            <tr>
                                <th>Số Người Tối Đa</th>
                                <td><?php echo $row['max_persons']; ?></td>
                            </tr>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Ghi Chú Từ Admin</h6>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Trạng Thái Đặt Phòng</th>
                                <td><?php echo $row['booking_status']; ?></td>
                            </tr>
                        </table>
                    </div> 
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Ghi Chú Từ Admin</th>
                                <td><?php echo $row['admin_remark']; ?></td>
                            </tr>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center mb-3">
            <div class="col-lg-2" >
                <button type="button" onclick="window.print()" class="btn btn-primary p-4 py-2">NHẤN ĐỂ IN</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
      
    
<!--- Kết Thúc Hiển Thị Đặt Phòng ----> 
    
<?php
include_once("../includes/js_files.php");
?>
    
</body>

</html>
