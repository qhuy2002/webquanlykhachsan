<!DOCTYPE html>
<html lang="en">
<?php 
    include_once('../helper/functions.php');
    include_once('../helper/helper.php');
    include_once("../includes/admin-head.php");
    
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['edit-room'])){
        editRoom($db);
    }elseif(isset ($_POST['make-unavailable'])){
        makeUnavailable($db);
    }elseif(isset ($_POST['make-available'])){
        makeAvailable($db);
    }elseif(isset ($_POST['delete-room'])){
        deleteRoom($db);
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
	            <li class="alert alert-success alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['success']; ?></li>
             </ul>
							
            <?php endif; ?>
            <?php if(isset($_SESSION['error'])): ?>
            <ul class="error-msg">
	          <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['error']; ?></li>
            </ul>
            <?php endif; ?>
							
            <?php if(isset($_SESSION['errors'])): ?>
            <?php foreach($_SESSION['errors'] as $err => $errMsg): ?>
							
             <ul class="error-msg">
	            <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $errMsg; ?></li>
             </ul>
            <?php endforeach; ?>
            <?php endif; ?>

                    <!-- Content Row -->
                    <div class="row">
                    


                        <div class="col-xl-12 col-lg-12">

                            <!-- Edit and delete room -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-success"> Chi tiết phòng</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php 
                                    $rows = getRooms($db);
                                    $count = 1;
                                    ?>
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>STT</th>
                                            <th class="d-none">Mã phòng</th>
                                            <th>Tên phòng</th>
                                            <th>Mã loại phòng</th>
                                            <th>chủ đề phòng</th>
                                            <th>Mô tả</th>
                                            <th>Ảnh phòng</th>
                                            <th>Giá phòng</th>
                                            <th>Kích cỡ phòng</th>
                                            <th>Hướng nhìn</th>
                                            <th>số phòng</th>
                                            <th>Số người tối đa</th>
                                            <th>Trạng thái</th>
                                            <th>Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        <tr>
                                          <td><?php echo $count++; ?></td>
                                            <td class="d-none"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['room_name']; ?></td>
                                            <td><?php echo $row['category_id']; ?></td>
                                            <td><?php echo $row['room_subject']; ?></td>
                                            <td><?php echo $row['room_description']; ?></td>
                                            <td><img src="<?php echo $row['room_image']; ?>" alt="<?php echo $row['room_name']; ?>" class="img-responsive" height="240" width="200"/></td>
                                            <td><?php echo App\helper::formatAmount($row['room_price']); ?></td>
                                            <td><?php echo $row['room_size']; ?></td>
                                            <td><?php echo $row['room_view']; ?></td>
                                            <td><?php echo $row['no_of_bed']; ?></td>
                                            <td><?php echo $row['max_persons']; ?></td>
                                            <td><?php echo $row['room_status']; ?></td>
                                            <td>
                                                <div class="row mb-3 justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                           <button type="button" class="btn btn-sm btn-block btn-primary edit">Chỉnh sửa</button>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                                                  <?php if($row['room_status'] == 'Có sẵn'): ?>  
                        <button type="button" class="btn btn-sm btn-block btn-secondary unavailable">Không có sẵn</button>
                                                    <?php else: ?>
                        <button type="button" class="btn btn-sm btn-block btn-success available">Có sẵn</button>
                                                     <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                        <button type="button" class="btn btn-sm btn-block btn-danger delete">Xóa</button>
                                                    </div>
                                                </div>  
                                            </td>
                                        </tr>
                                        
                                        <?php endwhile; ?>
                                    </tbody>
                                        </table>
                                    </div>
                                    
                                                 <!--####################### Modal For MAking A room Unavailable ###############-->
<div class="modal fade" id="unavailable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thay đổi "<span class="title text-success"> </span>" thành không có sẵn?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-warning">Bạn có chắc không ?</h4>
      </div>
      <div class="modal-footer">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <input type="hidden" name="id" class="i" value=""/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="submit" name="make-unavailable" class="btn btn-primary">Thay đổi</button>
          </form>
      </div>
    </div>
  </div>
</div>                 
                                        
                    
                                        
  <!--####################### Modal For MAking A room Available ###############-->
<div class="modal fade" id="available" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thay đổi "<span class="title text-success"> </span>" thành có sẵn?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-warning">Bạn có chắc không ?</h4>
      </div>
      <div class="modal-footer">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <input type="hidden" name="id" class="i" value=""/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="submit" name="make-available" class="btn btn-success">Thay đổi</button>
          </form>
      </div>
    </div>
  </div>
</div>                 
       
                                        
      <!--####################### Modal For MAking A room Available ###############-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa không "<span class="title text-success"> </span>" ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-warning">Bạn có chắc không ?</h4>
      </div>
      <div class="modal-footer">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <input type="hidden" name="id" class="i" value=""/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="submit" name="delete-room" class="btn btn-danger">Xóa</button>
          </form>
      </div>
    </div>
  </div>
</div>  
                                        
                                        
             <!--####################### Modal For Editing A room  ###############-->
             <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa "<span class="title text-success"></span>"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../admin/edit-room.php" enctype="multipart/form-data">
      <div class="modal-body">
       <input type="hidden" name="id" class="i" value=""/>
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
                                     <label for="roombed">Số phòng</label>
                                     <input type="number" class="form-control" id="roombed" placeholder="Nhập số phòng" name="room_bed" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomsubject">chủ đề phòng</label>
                                     <textarea class="form-control" id="roomsubject" placeholder="Nhập chủ đề phòng" name="room_subject" required></textarea>   
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomdescription">Mô tả</label>
                                     <textarea class="form-control" id="roomdescription" placeholder="Nhập Mô tả" name="room_description" required></textarea>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomprice">Giá phòng</label>
                                     <input type="text" class="form-control" id="roomprice" placeholder="Nhập Giá phòng" name="room_price"  required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="maxperson">Số người tố đa</label>
                                     <input type="number" class="form-control" id="maxperson" placeholder="Nhập số người" name="max_persons" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                    <img src="../assets/images/rooms/room-2.jpg" alt="img-placeholder" height="240"   id="display_image" />
                                   <br />
                                     <label for="roomimage">Ảnh phòng</label> 
                                     <input type="file" class="form-control" id="roomimage" name="room_image" onchange="document.getElementById('display_image').src = window.URL.createObjectURL(this.files[0])" required/>    
                                      </div>
          
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="submit" name="edit-room" class="btn btn-success">Chỉnh sửa</button>
          </form>
      </div>
    </div>
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
        
    </div>
    </div>
    
    <?php
            include_once("../includes/admin-footer.php");
            ?>

             </body>  

<?php
    include_once("../includes/admin_js-files.php");
?>          
    
    
    
<script>
    // FOR MAKING ROOM -=== UNAVAILABLE
$(document).ready(function(){
    
    $('.unavailable').on('click', function(){
       $('#unavailable').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
});
    
   // FOR MAKING ROOM -=== AVAILABLE
$(document).ready(function(){
    
    $('.available').on('click', function(){
       $('#available').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
}); 
    
    
     // FOR DELETING ROOM
$(document).ready(function(){
    
    $('.delete').on('click', function(){
       $('#delete').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
}); 

    
        
     // FOR EDITING A ROOM
$(document).ready(function(){
    
    $('.edit').on('click', function(){
       $('#edit').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
        $('#roomname').val(data[2]);
        $('#roomsize').val(data[8]);
        $('#roomview').val(data[9]);
        $('#roombed').val(data[10]);
        $('#roomsubject').val(data[4]);
        $('#roomdescription').val(data[5]);
        $('#roomprice').val(data[7]);
        $('#maxperson').val(data[11]);
        $('#roomimage').val(data[12]);
    });
    
}); 
    
    </script>    