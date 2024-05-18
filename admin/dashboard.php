<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../helper/functions.php");
    include_once("../includes/admin-head.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset ($_GET['search-booking'])){
        searchBooking($db);
    }
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!---- Sidebar---->
        <?php
        include_once("../includes/admin-sidebar.php");
        ?>
        <!--- End of Sidebar---->
        
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php 
                include_once("../includes/admin-topbar.php");
                ?>
                <!-- End of Topbar -->
                    
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bảng điều khiển</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Number of registered users -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Tổng số khách hàng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllUsers($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of rooms -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tổng số phòng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllRooms($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bed fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of bookings -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tổng lượt đặt phòng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllBookings($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Number of new booking -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Lượt đặt phòng mới</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllBookingPending($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row 2 --> 
                    <div class="row mb-4">

                        <!-- Number of Approved Booking -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Đặt chỗ được phê duyệt</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllApprovedBookings($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Cancelled Bookings -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Đã hủy đặt phòng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllCancelledBookings($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Read Enquiries -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Đọc các yêu cầu</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllReadEnquiry($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Number of unread enquiries -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Các yêu cầu chưa đọc</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getAllUnreadEnquiry($db); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--SEARCH FOR BOOKINGS-->
                    <div class="row mb-5">
                    <div class="col-lg-6">
                        
                       <h1 class="h3 mb-3 text-gray-800">Tìm kiếm đặt phòng</h1>
                        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="input-group">
                            
        <input type="search" class="form-control" id="booking" placeholder="Nhập số đặt phòng" name="bookingNumber" required/>
                            <div class="input-group-append">
                                            <button class="btn btn-primary" name="search-booking" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
        </div>
                            </form>
                        </div>
                    
                    </div>
<!--                    DISPLAY SEARCH RESULTS-->
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    $rows = searchBooking($db);
                                    $row = mysqli_fetch_assoc($rows);
                                    ?>
                                    <thead class="bg-dark text-white">
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Số đặt phòng</th>
        <th scope="col">Tên người dùng</th>
        <th scope="col">Mã khách hàng</th>
        <th scope="col">SĐT</th>
        <th scope="col">Email</th>
        <th scope="col">Giới tính</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Tên phòng</th>
        <th scope="col">Số người tối đa</th>
        <th scope="col">Ngày nhận phòng</th>
        <th scope="col">Ngày trả phòng</th>
        <th scope="col">Giá đặt phòng</th>
        <th scope="col">Ngày đặt phòng</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Ghi chú của quản trị viên</th>
    </tr>
</thead>





                                    <tbody>
                                        <tr>
                                          <td>1</td>
                                            <td><?php echo $row['booking_number']; ?></td>
                                            <td><?php echo $row['user_name']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['user_number']; ?></td>
                                            <td><?php echo $row['user_email']; ?></td>
                                            <td><?php echo $row['user_gender']; ?></td>
                                            <td><?php echo $row['user_address']; ?></td>
                                            <td><?php echo $row['room_name']; ?></td>
                                            <td><?php echo $row['max_persons']; ?></td>
                                            <td><?php echo $row['check_in_date']; ?></td>
                                            <td><?php echo $row['check_out_date']; ?></td>
                                            <td><?php echo App\helper::formatAmount($row['booking_price']); ?></td>
                                            <td><?php echo $row['booking_date']; ?></td>
                                            <td><?php echo $row['booking_status']; ?></td>
                                            <td><?php echo $row['admin_remark']; ?></td>
                                        </tr> 
                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                        
                        </div>
                    
                    </div>

                </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
                
                
                
            </div>
        <!-- End of Content Wrapper -->    
                
                <?php
            include_once("../includes/admin-footer.php");
            ?>
    </body>
                
<?php
    include_once("../includes/admin_js-files.php");
?>                
    
    
 