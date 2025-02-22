<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../helper/functions.php");
    include_once("../includes/admin-head.php");
    
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['addCategory'])){
        addCategory($db);
    }elseif(isset ($_POST['edit-category'])){
        editCategory($db);
    }elseif(isset ($_POST['delete-category'])){
       deleteCategory($db); 
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
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Quản lý danh mục phòng khách sạn</h3>
                    
                      <?php if(isset($_SESSION['success'])): ?>
             <ul class="error-msg">
	            <li class="alert alert-success alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['success']; ?></li>
             </ul>
							
            <?php endif; unset($_SESSION['success']); ?>
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
            <?php endif; unset($_SESSION['errors']); ?>
                  

                    <!-- Content Row -->
                    <div class="row">
                        
                         <!-- Add Category -->
                        <div class="col-xl-5 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-primary">Thêm loại phòng</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                     
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                     <label for="addcategory">Tên loại phòng</label>
                                     <input type="text" class="form-control" id="addcategory" name="categoryName" autocapitalize="words" required/>    
                                      </div>
                                    
                                        <hr>
                                        <button type="submit" name="addCategory" class="btn btn-primary">Xác nhận</button>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    


                        <div class="col-xl-7 col-lg-7">

                            <!-- Edit and delete category -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-success">Danh sách loại phòng</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php 
                                    $rows = getCategory($db);
                                  $count = 1;
                                  ?>
                                    <thead class="bg-dark text-white">
                                        <tr>
                                        <th scope="col">STT</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col" class="d-none">ID loại phòng/th>
                                            <th scope="col">Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        <tr>
                                          <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td class="d-none"><?php echo $row['id']; ?></td>
                                            <td>
                                                <div class="row">
                                                <div class="col-lg-6 col-xl-6 mb-3">
<button type="button" class="btn btn-sm btn-primary edit" >Chỉnh sửa</button>
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6">
<button type="button" class="btn btn-sm btn-danger delete">Xóa</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                                                      
                                        
 <!--##################### Modal FOR EDITING A CATEGORY ################## -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa"<span class="title text-success"> </span>"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="modal-body">
    <h4 class="text-warning">Bạn có chắc không ?</h4>
     
         <input type="text" value="" class="category_name form-control" id="category_name" name="category_name">
     <input type="hidden" name="id" id="category_id" class="i" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="submit" name="edit-category" class="btn btn-primary">Chỉnh sửa</button>
          
      </div>
          </form>
    </div>
  </div>
</div>
                                        
                                        
                                   
<!--####################### Modal FOR DELETING A CATEGORY ######################-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa "<span class="title text-success"> </span>"</h5>
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
        <button type="submit" name="delete-category" class="btn btn-danger">Xóa</button>
          </form>
      </div>
    </div>
  </div>
</div>
                                        
                                        
                                        

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
    
   <script>

$(document).ready(function(){
    
    $('.edit').on('click', function(){
       $('#edit').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('#category_name').val(data[1]);
        $('.title').text(data[1]);
        $('#category_id').val(data[2]);
    });
    
});

$(document).ready(function(){
    
    $('.delete').on('click', function(){
       $('#delete').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('#category_name').val(data[1]);
        $('.title').text(data[1]);
        $('.i').val(data[2]);
    });
    
});
	
</script>    