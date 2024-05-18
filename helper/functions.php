<?php
include_once('../config/dbconfig.php');
include_once("../helper/helper.php");

// Lấy tổng số người dùng
function getAllUsers($db) {
    $allUsers = "SELECT * FROM users";
    $allUsersRes = $db->query($allUsers);
    $count = mysqli_num_rows($allUsersRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy tổng số phòng
function getAllRooms($db) {
    $allRoom = "SELECT * FROM rooms";
    $allRoomRes = $db->query($allRoom);
    $count = mysqli_num_rows($allRoomRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy tất cả các đặt phòng
function getAllBookings($db) {
    $allBookings = "SELECT * FROM bookings";
    $allBookingsRes = $db->query($allBookings);
    $count = mysqli_num_rows($allBookingsRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy tất cả các đặt phòng chưa giải quyết
function getAllBookingPending($db) {
    $allBookings = "SELECT * FROM bookings WHERE booking_status = 'Chưa giải quyết'";
    $allBookingsRes = $db->query($allBookings);
    $count = mysqli_num_rows($allBookingsRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy tất cả các đặt phòng đã được chấp nhận
function getAllApprovedBookings($db) {
    $allBookings = "SELECT * FROM bookings WHERE booking_status = 'Chấp nhận'";
    $allBookingsRes = $db->query($allBookings);
    $count = mysqli_num_rows($allBookingsRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy tất cả các đặt phòng bị hủy bỏ
function getAllCancelledBookings($db) {
    $allBookings = "SELECT * FROM bookings WHERE booking_status = 'Bị hủy bỏ'";
    $allBookingsRes = $db->query($allBookings);
    $count = mysqli_num_rows($allBookingsRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy tổng số yêu cầu chưa đọc
function getAllUnreadEnquiry($db) {
    $allUsers = "SELECT * FROM contact WHERE contact_status = 'Chưa đọc'";
    $allUsersRes = $db->query($allUsers);
    $count = mysqli_num_rows($allUsersRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy tổng số yêu cầu đã đọc
function getAllReadEnquiry($db) {
    $allUsers = "SELECT * FROM contact WHERE contact_status = 'Đã đọc'";
    $allUsersRes = $db->query($allUsers);
    $count = mysqli_num_rows($allUsersRes);
    $formatcount = number_format($count);
    return $formatcount;
}

// Lấy yêu cầu chưa đọc
function getUnreadEnquiry($db) {
    $sql = "SELECT * FROM contact WHERE contact_status = 'Chưa đọc' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

// Lấy yêu cầu đã đọc
function getReadEnquiry($db) {
    $sql = "SELECT * FROM contact WHERE contact_status = 'Đã đọc' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

// Lấy thông tin tất cả người dùng và hiển thị chúng
function getUsersInfo($db) {
    $sql= "SELECT * FROM users ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

// Lấy hồ sơ người dùng
function getUserProfile($db) {
    $id= $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $res = $db->query($sql);
    return $res;
}

// Cập nhật hồ sơ người dùng
function updateUserProfile($db) {
    $id = $_POST['id'];
    $_SESSION['errors']= array();

    // Thu thập dữ liệu người dùng
    if(isset ($_POST['update'])){
        // Kiểm tra trường trống
        if(empty($_POST['firstname'])){
            $_SESSION['errors']['firstname']= "Họ của bạn là bắt buộc";
        }
        if(empty($_POST['lastname'])){
            $_SESSION['errors']['lastname']= "Tên của bạn là bắt buộc";
        }
        if(empty($_POST['number'])){
            $_SESSION['errors']['number']= "Số điện thoại của bạn là bắt buộc";
        }
        if(empty($_POST['email'])){
            $_SESSION['errors']['email']= "Email của bạn là bắt buộc";
        }  

        // Lọc và làm sạch dữ liệu người dùng
        $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
        $phonenumber = mysqli_real_escape_string($db,$_POST['number']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $newDate = date("d/m/y");   

        if(App\helper::checkEmail($email)){
            $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
            header('Location:../users/profile.php');
        }

        if(count($_SESSION['errors']) > 0){
            header('Location:../users/profile.php');
        }
        // Nếu không có lỗi
        else{
            // Cập nhật vào cơ sở dữ liệu
            $sql = "UPDATE users SET first_name = '$firstname', last_name = '$lastname', mobile_number ='$phonenumber', email ='$email', date_of_reg = '$newDate' WHERE id = '$id'";
            $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            // Nếu có sự cập nhật
            if($affected_rows > 0){
                $_SESSION['success'] = 'Cập nhật hồ sơ thành công';
                header('Location:../users/profile.php');
            } else {
                $_SESSION['errors']['error']='Rất tiếc, đã xảy ra lỗi';
                header('Location:../users/profile.php');
            }
        }
    } else {
        // Điều hướng người dùng quay lại
        header('Location:../users/profile.php');
    }

}

//update admin profile
function updateAdminProfile($db){
    $id = $_POST['id'];
    
    $_SESSION['errors']= array();

    // Thu thập dữ liệu người dùng
    if(isset($_POST['update'])){
    
        // Kiểm tra trường rỗng
        if(empty($_POST['firstname'])){
            $_SESSION['errors']['firstname'] = "Họ của bạn là bắt buộc";
        }
        if(empty($_POST['lastname'])){
            $_SESSION['errors']['lastname'] = "Tên của bạn là bắt buộc";
        }
        if(empty($_POST['number'])){
            $_SESSION['errors']['number'] = "Số điện thoại của bạn là bắt buộc";
        }
        if(empty($_POST['email'])){
            $_SESSION['errors']['email'] = "Email của bạn là bắt buộc";
        }  
    
        // Lọc và làm sạch dữ liệu người dùng
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $phonenumber = mysqli_real_escape_string($db, $_POST['number']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $newDate = date("d/m/y");   
    
        if(App\helper::checkEmail($email)){
            $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
            header('Location:../admin/profile.php');
        }
    
        if(count($_SESSION['errors']) > 0){
            header('Location:../admin/profile.php');
        }
        // Nếu không có lỗi
        else{
            // Cập nhật thông tin vào cơ sở dữ liệu
            $sql = "UPDATE users SET first_name = '$firstname', last_name = '$lastname', mobile_number ='$phonenumber', email ='$email', date_of_reg = '$newDate' WHERE id = '$id'";
            // Thực thi câu truy vấn
            $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            // Nếu có dòng bị ảnh hưởng
            if($affected_rows > 0){
                $_SESSION['success'] = 'Cập nhật hồ sơ thành công';
                header('Location:../admin/profile.php');
            }else{
                $_SESSION['errors']['error'] = 'Rất tiếc, đã xảy ra lỗi';
                header('Location:../admin/profile.php');
            }
        }
    }else{
        // Chuyển hướng người dùng trở lại
        header('Location:../admin/profile.php');
    }
}

/// Cập nhật mật khẩu người dùng
function updateUserPassword($db) {
    $id = $_POST['id'];
    $_SESSION['errors'] = array();

    if(isset($_POST['resetPassword'])){
        // Kiểm tra trường trống
        if(empty($_POST['newPassword'])){
            $_SESSION['errors']['password'] = "Mật khẩu của bạn là bắt buộc";
        }
        if(empty($_POST['confirmPassword'])){
            $_SESSION['errors']['confirmPassword'] = "Xác nhận mật khẩu của bạn";
        }

        // Lọc và làm sạch dữ liệu người dùng
        $email = $_POST['email'];
        $newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
        $confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);

        if(App\helper::checkPsw($newPassword)){
            $_SESSION['errors']['passwordFailure'] = "Mật khẩu phải có ít nhất 8 ký tự";
            header('Location:../users/change_password.php');
        }

        if(App\helper::confirmPassword($newPassword, $confirmPassword)){
            $_SESSION['errors']['passwordMisMatch'] = "Không khớp mật khẩu";
            header('Location:../users/change_password.php');
        }

        if(count($_SESSION['errors']) > 0){
            header('Location:../users/change_password.php');
        }
        // Nếu không có lỗi
        else {
            // Cập nhật mật khẩu vào cơ sở dữ liệu
            $newHashpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '$newHashpassword' WHERE id = '$id'";
            $res = mysqli_query($db, $sql);
            $affected_rows = $db->affected_rows;
            // Nếu có sự cập nhật
            if($affected_rows > 0){
                $_SESSION['success'] = "Mật khẩu của bạn đã được thay đổi thành công";
                header('Location:../users/change_password.php');
            } else {
                $_SESSION['errors']['error'] = 'Rất tiếc, đã xảy ra lỗi';
                header('Location:../users/change_password.php');
            }
        }

    } else {
        // Điều hướng người dùng quay lại
        header('Location:../users/change_password.php');
    }
}

// Cập nhật mật khẩu người dùng quản trị
function updateAdminPassword($db) {
    $id = $_POST['id'];
    $_SESSION['errors'] = array();

    if(isset($_POST['resetPassword'])){
        // Kiểm tra trường trống
        if(empty($_POST['newPassword'])){
            $_SESSION['errors']['password'] = "Mật khẩu của bạn là bắt buộc";
        }
        if(empty($_POST['confirmPassword'])){
            $_SESSION['errors']['confirmPassword'] = "Xác nhận mật khẩu của bạn";
        }

        // Lọc và làm sạch dữ liệu người dùng
        $email = $_POST['email'];
        $newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
        $confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);

        if(App\helper::checkPsw($newPassword)){
            $_SESSION['errors']['passwordFailure'] = "Mật khẩu phải có ít nhất 8 ký tự";
            header('Location:../admin/change_password.php');
        }

        if(App\helper::confirmPassword($newPassword, $confirmPassword)){
            $_SESSION['errors']['passwordMisMatch'] = "Không khớp mật khẩu";
            header('Location:../admin/change_password.php');
        }

        if(count($_SESSION['errors']) > 0){
            header('Location:../admin/change_password.php');
        }
        // Nếu không có lỗi
        else {
            // Cập nhật mật khẩu vào cơ sở dữ liệu
            $newHashpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '$newHashpassword' WHERE id = '$id'";
            $res = mysqli_query($db, $sql);
            $affected_rows = $db->affected_rows;
            // Nếu có sự cập nhật
            if($affected_rows > 0){
                $_SESSION['success'] = "Mật khẩu của bạn đã được thay đổi thành công";
                header('Location:../admin/change_password.php');
            } else {
                $_SESSION['errors']['error'] = 'Rất tiếc, đã xảy ra lỗi';
                header('Location:../admin/change_password.php');
            }
        }

    } else {
        // Điều hướng người dùng quay lại
        header('Location:../admin/change_password.php');
    }
}

// Lấy và hiển thị các danh mục
function getCategory($db) {
    $sql= "SELECT * FROM categories ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

// Thêm danh mục phòng
function addCategory($db) {
    $_SESSION['errors'] = array();
    
    if(isset($_POST['addCategory'])){
        if(empty($_POST['categoryName'])){
            $_SESSION['errors']['category_name'] = "Tên danh mục là bắt buộc";
        } else {
            $category = mysqli_real_escape_string($db, $_POST['categoryName']);
            $sql = "SELECT * FROM categories WHERE category_name = '$category'";
            $res = $db->query($sql);
            $count = mysqli_num_rows($res);
            if($count > 0){
                $_SESSION['errors']['name_exist'] = 'Xin lỗi, tên danh mục đã tồn tại';
                header('Location:../admin/add-category.php');
            } else {
                $sql = "INSERT INTO categories (category_name) VALUES ('$category')";
                $res = mysqli_query($db, $sql);
                if($res){
                    $_SESSION['success'] = 'Loại phòng ' .$category. ' đã được tạo';
                    header('Location:../admin/add-category.php');
                } else {
                    $_SESSION['errors']['error'] = 'Rất tiếc, đã xảy ra lỗi';
                    header('Location:../admin/add-category.php');
                }
            }
        }
    } else {
        $_SESSION['errors']['error'] = 'Không được phép';
        header('Location:../admin/add-category.php');
    }
}


// Sửa Loại phòng
function editCategory($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    
    if(isset($_POST['edit-category'])){
        if(empty($_POST['category_name'])){
            $_SESSION['errors']['category_name'] = "Tên danh mục là bắt buộc";
        } else {
            // Sửa danh mục
            $category_name= $_POST['category_name'];
            $sql = "UPDATE categories SET category_name = '$category_name' WHERE id = '$id'";
            // Chạy truy vấn db
            $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            // Nếu có sự cập nhật
            if($affected_rows > 0){
                $_SESSION['success']= "Loại phòng đã được chỉnh sửa thành công";
                header('Location:../admin/add-category.php');
            } else {
                $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
                header('Location:../admin/add-category.php');
            }
        }
    } else {
        $_SESSION['errors']['error']="Truy cập không được ủy quyền";
        header('Location:../admin/add-category.php');
    }
}

// Xóa Loại phòng
function deleteCategory($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset($_POST['delete-category'])){
        $sql= "DELETE FROM categories WHERE id = '$id'";
        $res = $db->query($sql);
        $affected_rows = $db->affected_rows;
        
        // Nếu có sự xóa
        if($affected_rows > 0){
            $_SESSION['success']= "Loại phòng đã được xóa thành công";
            header('Location:../admin/add-category.php');
        } else {
            $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
            header('Location:../admin/add-category.php');
        }
    } else {
        $_SESSION['errors']['error']="Truy cập không được ủy quyền";
        header('Location:../admin/add-category.php');
    }
}

// Lưu trữ hình ảnh phòng
function storeImage($file){
    $_SESSION['errors'] = array();
    // Xử lý tải lên tệp
    $target_folder_dir = "../assets/hotel_rooms/";
    $target_file = $target_folder_dir.basename($_FILES["room_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Kiểm tra nếu tệp đã tồn tại
    if(file_exists($target_file)){
        $_SESSION['errors']['exists'] ='Hình ảnh phòng đã tồn tại';
        header('Location:../admin/add-room.php');
    }
    // Kiểm tra kích thước tệp
    else if($_FILES["room_image"]["size"] > 30000000){
        $_SESSION['errors']['big'] ='Kích thước hình ảnh quá lớn';
        header('Location:../admin/add-room.php');
    }
    // Kiểm tra định dạng tệp
    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg"){
       $_SESSION['errors']['format'] ='Định dạng hình ảnh không được chấp nhận';
         header('Location:../admin/add-room.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../admin/add-room.php');
    } else {
        $path = move_uploaded_file($_FILES["room_image"]["tmp_name"], $target_file);
        return $path;
    }
}

// Thêm Phòng
function addRoom($db){
    $_SESSION['errors'] = array();
    
    if(isset($_POST['add-Room'])){
        if(empty($_POST['room_name'])){
            $_SESSION['errors']['room_name'] = "Tên phòng là bắt buộc";
        }
        if(empty($_POST['room_category'])){
            $_SESSION['errors']['room_category'] = "Loại phòng phòng là bắt buộc";
        }
        
        if(empty($_POST['room_size'])){
            $_SESSION['errors']['room_size'] = "Kích thước phòng là bắt buộc";
        }
        
        if(empty($_POST['room_view'])){
            $_SESSION['errors']['room_view'] = "Tầm nhìn phòng là bắt buộc";
        }
        if(empty($_POST['room_bed'])){
            $_SESSION['errors']['room_bed'] = "Số lượng giường là bắt buộc";
        }
        if(empty($_POST['room_subject'])){
            $_SESSION['errors']['room_subject'] = "Chủ đề phòng là bắt buộc";
        }
        if(empty($_POST['room_description'])){
            $_SESSION['errors']['room_description'] = "Mô tả là bắt buộc";
        }
        if(empty($_POST['room_price'])){
            $_SESSION['errors']['room_price'] = "Giá phòng là bắt buộc";
        }
        if(empty($_POST['max_persons'])){
            $_SESSION['errors']['max_persons'] = "Số người tối đa là bắt buộc";
        }
        
        if(count($_SESSION['errors']) > 0){
            header('Location:../admin/add-room.php');
        }
        
        // Lọc và làm sạch dữ liệu người dùng
        $room_name = mysqli_real_escape_string($db, $_POST['room_name']);
        $room_category = mysqli_real_escape_string($db, $_POST['room_category']);
        $room_size = mysqli_real_escape_string($db, $_POST['room_size']);
        $room_view = mysqli_real_escape_string($db, $_POST['room_view']);
        $room_bed = mysqli_real_escape_string($db, $_POST['room_bed']);
        $room_subject = mysqli_real_escape_string($db, $_POST['room_subject']);
        $room_description = mysqli_real_escape_string($db, $_POST['room_description']);
        $room_price = mysqli_real_escape_string($db, $_POST['room_price']);
        $max_persons = mysqli_real_escape_string($db, $_POST['max_persons']);
        
        $target_folder_dir = "../assets/hotel_rooms/";
        $target_file = $target_folder_dir.basename($_FILES["room_image"]["name"]);
        
        if(storeImage($target_file)){
            // Tiếp tục chèn các trường khác vào db
            $sql = "INSERT INTO rooms (room_name, room_subject, room_description, category_id, room_image, room_price, room_size, room_view, no_of_bed, max_persons) VALUES ('$room_name','$room_subject','$room_description','$room_category','$target_file','$room_price','$room_size','$room_view','$room_bed','$max_persons')";
            
            $res = $db->query($sql);
                
            if($res){
                $_SESSION['success'] = 'Thông tin phòng đã được thêm vào Cơ sở dữ liệu';
                header('Location:../admin/add-room.php');
            } else {
                $_SESSION['errors']['error'] = 'Không thể chèn phòng vào Cơ sở dữ liệu';
                header('Location:../admin/add-room.php');
            }
        }
    } else {
        $_SESSION['errors']['unauthorized'] = "Truy cập không được ủy quyền";
        header("Location:../admin/add-room.php");
    }
}

// Lấy và hiển thị danh sách phòng
function getRooms($db){
    $sql= "SELECT * FROM rooms ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

// Đặt phòng không sẵn có
function makeUnavailable($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['make-unavailable'])){
        $sql= "UPDATE rooms SET room_status = 'Không có sẵn' WHERE id = '$id'";
        $res = $db->query($sql);
        $affected_rows = $db->affected_rows;
        
        // Nếu có sự cập nhật
        if($affected_rows > 0){
            $_SESSION['success']= "Trạng thái phòng đã được đặt không sẵn có thành công";
            header('Location:../admin/edit-room.php');
        } else {
            $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
            header('Location:../admin/edit-room.php');
        }
    } else {
        $_SESSION['errors']['error']="Truy cập không được ủy quyền";
        header('Location:../admin/edit-room.php');
    }
}

// Đặt phòng có sẵn
function makeAvailable($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['make-available'])){
        $sql= "UPDATE rooms SET room_status = 'Có sẵn' WHERE id = '$id'";
        $res = $db->query($sql);
        $affected_rows = $db->affected_rows;
        
        // Nếu có sự cập nhật
        if($affected_rows > 0){
            $_SESSION['success']= "Trạng thái phòng đã được đặt sẵn có thành công";
            header('Location:../admin/edit-room.php');
        } else {
            $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
            header('Location:../admin/edit-room.php');
        }
    } else {
        $_SESSION['errors']['error']="Truy cập không được ủy quyền";
        header('Location:../admin/edit-room.php');
    }
}

function updateRoomImage($db, $id){
    $_SESSION['errors'] = array();
    // Xử lý tải lên tệp
    $target_folder_dir = "../assets/hotel_rooms/";
    $target_file = $target_folder_dir . basename($_FILES["room_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Kiểm tra kích thước tệp
    if($_FILES["room_image"]["size"] > 30000000){
        $_SESSION['errors']['big'] ='Kích thước hình ảnh quá lớn';
        header('Location:../admin/add-room.php');
    }
    // Kiểm tra định dạng tệp
    else if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"){
       $_SESSION['errors']['format'] ='Định dạng hình ảnh không được chấp nhận';
         header('Location:../admin/add-room.php');
    }
    // Kiểm tra lỗi khi tải lên
    else if($_FILES["room_image"]["error"] !== UPLOAD_ERR_OK) {
        $_SESSION['errors']['upload'] = 'Lỗi khi tải lên hình ảnh';
        header('Location:../admin/add-room.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../admin/add-room.php');
    } else {
        $path = move_uploaded_file($_FILES["room_image"]["tmp_name"], $target_file);
        return $path;
    }
}




//Chỉnh sửa thông tin phòng
function editRoom($db){
    $id = $_POST['id'];
    
    $_SESSION['errors'] = array();
    
    if(isset($_POST['edit-room'])){
        if(empty($_POST['room_name'])){
            $_SESSION['errors']['room_name'] = "Tên phòng là bắt buộc";
        }
        if(empty($_POST['room_category'])){
            $_SESSION['errors']['room_category'] = "Loại phòng phòng là bắt buộc";
        }
        if(empty($_POST['room_size'])){
            $_SESSION['errors']['room_size'] = "Kích thước phòng là bắt buộc";
        }
        if(empty($_POST['room_view'])){
            $_SESSION['errors']['room_view'] = "Tầm nhìn của phòng là bắt buộc";
        }
        if(empty($_POST['room_bed'])){
            $_SESSION['errors']['room_bed'] = "Số giường là bắt buộc";
        }
        if(empty($_POST['room_subject'])){
            $_SESSION['errors']['room_subject'] = "Chủ đề phòng là bắt buộc";
        }
        if(empty($_POST['room_description'])){
            $_SESSION['errors']['room_description'] = "Mô tả là bắt buộc";
        }
        if(empty($_POST['room_price'])){
            $_SESSION['errors']['room_price'] = "Giá phòng là bắt buộc";
        }
        if(empty($_POST['max_persons'])){
            $_SESSION['errors']['max_persons'] = "Số người tối đa là bắt buộc";
        }
        if(count($_SESSION['errors']) > 0){
            header('Location:../admin/edit-room.php');
        }else{
            $room_name = mysqli_real_escape_string($db,$_POST['room_name']);
            $room_category = mysqli_real_escape_string($db,$_POST['room_category']);
            $room_size = mysqli_real_escape_string($db,$_POST['room_size']);
            $room_view = mysqli_real_escape_string($db,$_POST['room_view']);
            $room_bed = mysqli_real_escape_string($db,$_POST['room_bed']);
            $room_subject = mysqli_real_escape_string($db,$_POST['room_subject']);
            $room_description = mysqli_real_escape_string($db,$_POST['room_description']);
            $room_price = mysqli_real_escape_string($db,$_POST['room_price']);
            $max_persons = mysqli_real_escape_string($db,$_POST['max_persons']);
            
            $target_folder_dir = "../assets/hotel_rooms/";
            $target_file = $target_folder_dir.basename($_FILES["room_image"]["name"]);
            
            if(storeImage($target_file)){
                $sql = "UPDATE rooms SET room_name ='$room_name', room_subject ='$room_subject', room_description ='$room_description', category_id ='$room_category', room_image ='$target_file', room_price ='$room_price', room_size ='$room_size', room_view ='$room_view', no_of_bed ='$room_bed', max_persons ='$max_persons' WHERE id = '$id'";
                
                $res = $db->query($sql);
                $affected_rows = $db->affected_rows;
                
                //Nếu có cập nhật
                if($affected_rows > 0){
                    $_SESSION['success'] ='Thông tin phòng đã được cập nhật thành công';
                    header('Location:../admin/edit-room.php');
                }else{
                    $_SESSION['errors']['error'] ='Không thể cập nhật thông tin phòng trong Cơ sở dữ liệu';
                    header('Location:../admin/edit-room.php');
                }
            }
        }
    }else{
        $_SESSION['errors']['unauthorized'] = "Truy cập không được ủy quyền";
        header("Location:../admin/edit-room.php");
    }
}


// Xóa Phòng
function deleteRoom($db){
    $id= $_POST['id'];
   $_SESSION['errors'] = array();
   if(isset ($_POST['delete-room'])){
       $sql= "DELETE FROM rooms WHERE id = '$id'";
       $res = $db->query($sql);
           $affected_rows = $db->affected_rows;
           
           // Nếu có sự cập nhật
           if($affected_rows > 0){
               $_SESSION['success']= "Phòng đã được xóa thành công";
               header('Location:../admin/edit-room.php');
           } else {
             $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
               header('Location:../admin/edit-room.php');
           }
   } else {
       $_SESSION['errors']['error']="Truy cập không được ủy quyền";
               header('Location:../admin/edit-room.php');
   }
}

// Xóa Người dùng
function deleteUser($db){
   $id= $_POST['id'];
   $_SESSION['errors'] = array();
   if(isset($_POST['delete-user'])){
   $sql= "DELETE FROM users WHERE id = '$id'";
       $res = $db->query($sql);
           $affected_rows = $db->affected_rows;
           
           // Nếu có sự xóa
           if($affected_rows > 0){
               $_SESSION['success']= "Người dùng Liên Hệ đã được xóa thành công";
               header('Location:../admin/users.php');
           } else {
             $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
               header('Location:../admin/users.php');
           }
   } else {
       $_SESSION['errors']['error']="Truy cập không được ủy quyền";
               header('Location:../admin/users.php');
   }

}

// Thực hiện Người dùng làm Admin
function makeAdmin($db){
   $id= $_POST['id'];
   $_SESSION['errors'] = array();
   if(isset ($_POST['make-admin'])){
       $sql= "UPDATE users SET role = 'Quản trị viên' WHERE id = '$id'";
       $res = $db->query($sql);
           $affected_rows = $db->affected_rows;
           
           // Nếu có sự cập nhật
           if($affected_rows > 0){
               $_SESSION['success']= "Liên Hệ đã được chỉ định làm Admin thành công";
               header('Location:../admin/users.php');
           } else {
             $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
               header('Location:../admin/users.php');
           }
   } else {
       $_SESSION['errors']['error']="Truy cập không được ủy quyền";
               header('Location:../admin/users.php');
   }
   
}

// Thực hiện Admin làm Người dùng
function makeUser($db){
   $id= $_POST['id'];
   $_SESSION['errors'] = array();
   if(isset ($_POST['make-user'])){
       $sql= "UPDATE users SET role = 'Khách hàng' WHERE id = '$id'";
       $res = $db->query($sql);
           $affected_rows = $db->affected_rows;
           
           // Nếu có sự cập nhật
           if($affected_rows > 0){
               $_SESSION['success']= "Liên Hệ đã được chỉ định làm Người dùng thành công";
               header('Location:../admin/users.php');
           } else {
             $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
               header('Location:../admin/users.php');
           }
   } else {
       $_SESSION['errors']['error']="Truy cập không được ủy quyền";
               header('Location:../admin/users.php');
   }
   
}

// Thay đổi trạng thái yêu cầu thành đã đọc
function readEnquiry($db){
   $id= $_POST['id'];
   $_SESSION['errors'] = array();
   if(isset ($_POST['read-enquiry'])){
       $sql= "UPDATE contact SET contact_status = 'Đã đọc' WHERE id = '$id'";
        $res = $db->query($sql);
           $affected_rows = $db->affected_rows;
           
           // Nếu có sự cập nhật
           if($affected_rows > 0){
                $_SESSION['success']= "Yêu cầu đã được đánh dấu là đã đọc thành công";
               header('Location:../admin/unread-enquiry.php');
           } else {
             $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
               header('Location:../admin/unread-enquiry.php');
           }
   } else {
       $_SESSION['errors']['error']="Truy cập không được ủy quyền";
               header('Location:../admin/unread-enquiry.php');
   }
   
}

// Xóa Yêu cầu
function deleteEnquiry($db){
   $id= $_POST['id'];
   $_SESSION['errors'] = array();
   if(isset ($_POST['delete-enquiry'])){
       $sql= "DELETE FROM contact WHERE id = '$id'";
        $res = $db->query($sql);
           $affected_rows = $db->affected_rows;
           
           // Nếu có sự cập nhật
           if($affected_rows > 0){
                $_SESSION['success']= "Yêu cầu đã được xóa thành công";
               header('Location:../admin/read-enquiry.php');
           } else {
             $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
               header('Location:../admin/read-enquiry.php');
           }
   } else {
       $_SESSION['errors']['error']="Truy cập không được ủy quyền";
               header('Location:../admin/read-enquiry.php');
   }
   
}

// Đối với việc trả lời một yêu cầu
function replyMessage($db){
    $id= $_POST['id'];
   
   $_SESSION['errors']= array();

// Thu thập dữ liệu người dùng

if(isset ($_POST['reply-message'])){
   // Kiểm tra các trường trống
  if(empty($_POST['from'])){
      $_SESSION['errors']['from']= "Email người gửi là bắt buộc";
  }
   if(empty($_POST['to'])){
      $_SESSION['errors']['email']= "Email người nhận là bắt buộc";
  } 
   if(empty($_POST['subject'])){
      $_SESSION['errors']['subject']= "Tiêu đề là bắt buộc";
  }
   if(empty($_POST['message'])){
      $_SESSION['errors']['message']= "Nội dung tin nhắn là bắt buộc";
  } 
   // Lọc và vệ sinh đầu vào của người dùng
   $from = mysqli_real_escape_string($db,$_POST['from']);
   $to = mysqli_real_escape_string($db,$_POST['to']);
   $subject = mysqli_real_escape_string($db,$_POST['subject']);
   $message = mysqli_real_escape_string($db,$_POST['message']);
    
   if(App\helper::checkEmail($from)){
       $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
       header('Location:../admin/read-enquiry.php');
   }
   if(App\helper::checkEmail($to)){
       $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
       header('Location:../admin/read-enquiry.php');
   }
   
   if(count($_SESSION['errors']) > 0){
       header('Location:../admin/read-enquiry.php');
   }
   
   else{
       // Để gửi Email HTML
       $headers = 'MIME-Version: 1.0'. "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
       // Tạo tiêu đề email
       $headers .= 'From: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();
       // Soạn nội dung email HTML
       $message = '<html><body style="color: #080; font-size:18px;">';
       $message .= '</body></html>';
       
       // Gửi email
       if(mail($to, $subject, $message, $headers)){
          $_SESSION['success'] = 'Email đã được gửi thành công';
               header('Location:../admin/read-enquiry.php');
        }else{
               $_SESSION['errors']['error']='Rất tiếc, đã xảy ra lỗi';
               header('Location:../admin/read-enquiry.php');
           }
       
   }
   
}else{
       $_SESSION['errors']['error']="Truy cập không được ủy quyền";
               header('Location:../admin/read-enquiry.php');
   }
   
}


// Gửi yêu cầu
function insertEnquiry($db){
    
    $_SESSION['errors']= array();
    
    // Thu thập dữ liệu người dùng
    
    if(isset ($_POST['sendMessage'])){
        // Kiểm tra các trường trống
       if(empty($_POST['name'])){
           $_SESSION['errors']['name']= "Tên của bạn là bắt buộc";
       }
        if(empty($_POST['email'])){
           $_SESSION['errors']['email']= "Email của bạn là bắt buộc";
       } 
        if(empty($_POST['subject'])){
           $_SESSION['errors']['subject']= "Chủ đề của bạn là bắt buộc";
       }
        if(empty($_POST['message'])){
           $_SESSION['errors']['message']= "Tin nhắn của bạn là bắt buộc";
       } 
        // Lọc và vệ sinh đầu vào của người dùng
        $name = mysqli_real_escape_string($db,$_POST['name']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $subject = mysqli_real_escape_string($db,$_POST['subject']);
        $message = mysqli_real_escape_string($db,$_POST['message']);
        $date = date("d/m/y");   
        
        
        if(App\helper::checkEmail($email)){
            $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
            header('Location:../auth/contact.php');
        }
        
        
        if(count($_SESSION['errors']) > 0){
            header('Location:../auth/contact.php');
        }
        // Nếu không có lỗi
        else{
                // Chèn vào cơ sở dữ liệu
                $sql = "INSERT INTO contact (contact_name, contact_email, contact_subject, contact_message, contact_date) VALUES('$name','$email','$subject','$message','$date')";
                // Chạy truy vấn SQL
                $res = mysqli_query($db, $sql);
                if($res){
                    $_SESSION['success'] = 'Tin nhắn của bạn đã được gửi thành công';
                    header('Location:../auth/contact.php');
                }else{
                    $_SESSION['errors']['error']='Rất tiếc, đã xảy ra lỗi';
                    header('Location:../auth/contact.php');
                }
            }
        
        
    }else{
        // Chuyển hướng người dùng trở lại
        header('Location:../auth/contact.php');
    }
    
}


function getBookings($db){
    $sql= "SELECT * FROM bookings ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}


function getNewBookings($db){
    $sql= "SELECT * FROM bookings WHERE booking_status = 'Chưa giải quyết' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}


function getApprovedBookings($db){
    $sql= "SELECT * FROM bookings WHERE booking_status = 'Chấp nhận' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}


function getCancelledBookings($db){
    $sql= "SELECT * FROM bookings WHERE booking_status = 'Bị hủy bỏ' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}


function approveBooking($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['approve-booking'])){
        $sql= "UPDATE bookings SET booking_status = 'Chấp nhận' WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            

            if($affected_rows > 0){
                 $_SESSION['success']= "Đặt phòng đã được chấp nhận thành công";
                header('Location:../admin/new-booking.php');
            }else{
              $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
                header('Location:../admin/new-booking.php');
            }
}else{
        $_SESSION['errors']['error']="Truy cập không được ủy quyền";
                header('Location:../admin/new-booking.php');
    }
}


//Xác nhận một đặt phòng
function confirmBooking($db){
      $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['confirm-booking'])){
        $sql= "UPDATE bookings SET admin_remark = 'Xác nhận! Cảm ơn bạn đã chọn khách sạn của chúng tôi' WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //nếu có cập nhật
            if($affected_rows > 0){
                 $_SESSION['success']= "Đặt phòng đã được xác nhận thành công";
                header('Location:../admin/new-booking.php');
            }else{
              $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
                header('Location:../admin/new-booking.php');
            }
}else{
        $_SESSION['errors']['error']="Truy cập không được ủy quyền";
                header('Location:../admin/new-booking.php');
    }
}


//Hủy đặt phòng
function cancelBooking($db){
   $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['cancel-booking'])){
        $sql= "UPDATE bookings SET booking_status = 'Bị hủy bỏ' WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //nếu có cập nhật
            if($affected_rows > 0){
                 $_SESSION['success']= "Đặt phòng đã được hủy thành công";
                header('Location:../admin/new-booking.php');
            }else{
              $_SESSION['errors']['error']="Rất tiếc, đã xảy ra lỗi";
                header('Location:../admin/new-booking.php');
            }
}else{
        $_SESSION['errors']['error']="Truy cập không được ủy quyền";
                header('Location:../admin/new-booking.php');
    } 
}

//Tìm kiếm đặt phòng
function searchBooking($db){
    if(isset ($_GET['search-booking']))
        $bookingNumber = $_GET['bookingNumber'];
    $sql = "SELECT * FROM bookings WHERE booking_number = '$bookingNumber'";
    $res = $db->query($sql);
    return $res;
}

?>
