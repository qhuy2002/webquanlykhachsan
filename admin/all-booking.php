<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../includes/admin-head.php");
    include_once('../helper/functions.php');
    include_once('../helper/helper.php');
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
               <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Quản lý đặt phòng</h3>
                  

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-12 col-lg-12">

                            <!-- Edit and delete category -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-primary">Đặt chỗ của chúng tôi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    $rows = getBookings($db);
                                    $count = 1;
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
                                        <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        <tr>
                                          <td><?php echo $count++; ?></td>
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
                                        <?php endwhile; ?>
                                    </tbody>
                                        </table>
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
        
    </div>
    </div>
    
    <?php
        include_once("../includes/admin-footer.php");
        ?>

             </body>  
              
    
                
<?php
    include_once("../includes/admin_js-files.php");
?>               