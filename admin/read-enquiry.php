<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../helper/functions.php");
    include_once("../includes/admin-head.php");
    
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['delete-enquiry'])){
        deleteEnquiry($db);
    }elseif(isset ($_POST['reply-message'])){
        replyMessage($db);
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
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Quang-Huy Quản lý liên lạc </h3>
                    
                 <?php if(isset($_SESSION['success'])): ?>
             <ul class="error-msg">
	            <li class="alert alert-success alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['success']; ?></li>
             </ul>
							
            <?php endif; unset($_SESSION['success']);?>
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

                        <div class="col-xl-12 col-lg-12">

                            <!-- Edit and delete category -->
                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-uppercase text-success">Các Yêu Cầu Đã Đọc Của Chúng Tôi</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php
            $rows = getReadEnquiry($db);
            $count = 1;
            ?>
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col" class="d-none">ID Liên Hệ</th>
                    <th scope="col">Tên Liên Hệ</th>
                    <th scope="col">Email Liên Hệ</th>
                    <th scope="col">Tiêu Đề Liên Hệ</th>
                    <th scope="col">Nội Dung Liên Hệ</th>
                    <th scope="col">Ngày Liên Hệ</th>
                    <th scope="col">Trạng Thái Liên Hệ</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
                                    <tbody>
                                  <?php while($row = mysqli_fetch_assoc($rows)): ?>

                                        <tr>
                                          <td><?php echo $count++; ?></td>
                                            <td class="d-none"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['contact_name']; ?></td>
                                            <td><?php echo $row['contact_email']; ?></td>
                                            <td><?php echo $row['contact_subject']; ?></td>
                                            <td><?php echo $row['contact_message']; ?></td>
                                            <td><?php echo $row['contact_date']; ?></td>
                                            <td><?php echo $row['contact_status']; ?></td>
                                            <td>
                                                <div class="row mb-2">
                                                <div class="col-lg-12 col-xl-12">
       <button type="button" class="btn btn-sm btn-block btn-success reply">Hồi đáp</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-lg-12 col-xl-12">
       <button type="button" class="btn btn-sm btn-block btn-danger delete">Xóa</a>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        
      <!--####################### Modal For DELETING AN ENQUIRY   ###############-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
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
        <button type="submit" name="delete-enquiry" class="btn btn-danger">Xóa</button>
          </form>
      </div>
    </div>
  </div>
</div>
                                        
     <!--####################### Modal For REPLYING AN ENQUIRY   ###############-->
<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="modal-body">
        <input type="hidden" name="id" class="i" value=""/>
        <div class="form-group">
          <label for="sender-email" class="col-form-label">Người gửi:</label>
            <input type="email" name="from" class="form-control" id="sender-email" value="quanghuy&#64;gmail.com" readonly/>
          </div>  
          <div class="form-group">
          <label for="recipient-email" class="col-form-label">Người nhận:</label>
            <input type="email" class="form-control" name="to" id="recipient-email" value="">
          </div>
          <div class="form-group">
          <label for="email-subject" class="col-form-label">Chủ đề:</label>
            <input type="text" class="form-control" name="subject" id="email-subject" value="Khách Sạn Quang Huy" readonly/>
          </div>
          <div class="form-group">
          <label for="email-message" class="col-form-label">Tin nhắn:</label>
            <textarea class="form-control" name="message" id="email-message"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="submit" name="reply-message" class="btn btn-success">Gửi thư</button>
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
//FOR DELETING AN ENQUIRY
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
    
    //FOR REPLYING AN ENQUIRY
 $(document).ready(function(){
    
    $('.reply').on('click', function(){
       $('#reply').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('#recipient-email').val(data[3]);
        $('.i').val(data[1]);
    });
    
});    
</script>    