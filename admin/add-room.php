<!DOCTYPE html>
<html lang="en">
<?php 
    include_once('../helper/functions.php');
    include_once("../includes/admin-head.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	    if(isset ($_POST['add-Room'])){
            addRoom($db);
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
               <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Quản lý phòng</h3>
                    
                     <?php if(isset($_SESSION['success'])): ?>
                <ul class="error-msg">
                <li class="alert alert-success alert-dismissable " data-dismiss="alert">&times; <?php echo $_SESSION['success']; ?>
                </li>
                </ul>  
                <?php endif; ?>
                 <?php if(isset($_SESSION['errors'])) :?>
                <?php foreach($_SESSION['errors'] as $err => $errMsg) : ?>
                      <ul class="error-msg">
                    <li class="alert alert-danger alert-dismissable " data-dismiss="alert">&times; <?php echo $errMsg; ?>
                        </li>
                      </ul> 
                        <?php endforeach;  ?>  
                 
                        <?php endif;  ?>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                     
                        
                         <!-- Add Category -->
                        <div class="col-xl-10 col-lg-10">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-primary">Thêm chi tiết phòng</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                     <label for="roomname">Tên phòng</label>
                                     <input type="text" class="form-control" id="roomname" name="room_name" placeholder="Nhập Tên phòng" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                            <?php $row = getCategory($db); ?>
                                          <label for="roomtype">Loại phòng</label>
                                           <select class="form-control" id="roomtype" name="room_category">
                                            <option value="">Chọn loại phòng</option>
                                               <?php while($rows = mysqli_fetch_assoc($row)): ?>
                                             <option value="<?php echo $rows['id']; ?>"><?php echo $rows['category_name']; ?></option>
                                             <?php endwhile; ?>
                                             </select>    
                                            </div>
                                        
                                        <div class="form-group">
                                     <label for="roomsize">Kích cỡ phòng</label>
                                     <input type="text" class="form-control" id="roomsize" placeholder="Nhập Kích cỡ phòng" name="room_size" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomview">Hướng nhìn</label>
                                     <input type="text" class="form-control" id="roomview" placeholder="Nhập Hướng nhìn" name="room_view" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roombed">Số giường</label>
                                     <input type="number" class="form-control" id="roombed" placeholder="Nhập số phòng" name="room_bed" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomsubject">Chủ đề phòng</label>
                                     <textarea class="form-control" id="roomsubject" placeholder="Nhập chủ đề phòng" name="room_subject" required></textarea>   
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomdescription">Mô tả</label>
                                     <textarea class="form-control" id="roomdescription" placeholder="Nhập mô tả" name="room_description" required></textarea>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomprice">Gía phòng</label>
                                     <input type="number" class="form-control" id="roomprice" placeholder="Nhập giá phòng" name="room_price"  required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="maxperson">Số lượng người tối đa</label>
                                     <input type="number" class="form-control" id="maxperson" placeholder="Nhập số người" name="max_persons" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                    <img src="../assets/images/rooms/room-2.jpg" alt="img-placeholder" height="240"   id="display_image" />
                                   <br />
                                     <label for="roomimage">Ảnh phòng</label>
                                     <input type="file" class="form-control" id="roomimage" name="room_image" onchange="document.getElementById('display_image').src = window.URL.createObjectURL(this.files[0])" required/>    
                                      </div>
                                    
                                        <hr>
                                        <button type="submit" name="add-Room" class="btn btn-primary">Xác nhận</button>
                                    </form>
                                     
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