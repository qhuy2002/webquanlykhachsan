<?php
session_start();
//require some files
include_once('../config/dbconfig.php');
include_once('../helper/helper.php');


// Tạo một mảng để lưu trữ các thông báo lỗi
$_SESSION['errors'] = array();

if(isset($_POST['login'])){
    if(empty($_POST['email'])){
        $_SESSION['errors']['email'] = "Email của bạn là bắt buộc";
    }
    if(empty($_POST['password'])){
        $_SESSION['errors']['password'] = "Mật khẩu của bạn là bắt buộc";
    }
    
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(App\helper::checkPsw($password)){
        $_SESSION['errors']['passwordFailure'] = "Mật khẩu phải có ít nhất 8 ký tự";
        header('Location:../auth/login.php');
    }
    
    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
        header('Location:../auth/login.php');
    }
    
    // Nếu có bất kỳ lỗi nào
    if(count($_SESSION['errors']) > 0){
        header('Location:../auth/login.php');
    }
    // Nếu không có lỗi
    else{
        // Thực hiện truy vấn db
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = $db->query($sql);
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            if(password_verify($password, $row['password'])){
                $_SESSION['role'] = $row['role'];
                // Kiểm tra nếu người dùng đăng nhập là quản trị viên, tác giả hoặc chỉ là một người dùng
                if($_SESSION['role'] == 'Khách hàng'){
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['firstname'] = $row['first_name'];
                    $_SESSION['lastname'] = $row['last_name'];
                    $_SESSION['number'] = $row['mobile_number'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['info'] = "Bạn đã đăng nhập thành công";
                    header('Location:../default/home.php');
                }
                else if($_SESSION['role'] == "Quản trị viên"){
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['firstname'] = $row['first_name'];
                    $_SESSION['lastname'] = $row['last_name'];
                    $_SESSION['number'] = $row['mobile_number'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['info'] = "Bạn đã đăng nhập thành công";
                    header('Location:../admin/dashboard.php');
                }
                
            }else{
                $_SESSION['errors']['invalidPassword'] = "Mật khẩu không đúng";
                header('Location:../auth/login.php');
            }
        }
        else{
            $_SESSION['errors']['emailNotExist'] = 'Email không tồn tại';
            header('Location:../auth/login.php');
        }
    }
}else{
    $_SESSION['errors']['invalidRequest'] = 'Đã xảy ra lỗi';
    header('Location:../auth/login.php');
}
?>
