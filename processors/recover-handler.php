<?php
session_start();
//include your dbconfig and helper files
require_once("../config/dbconfig.php");
require_once("../helper/helper.php");

$_SESSION['errors'] = array();

//collect user data

if(isset($_POST['resetPassword'])){
    //check for empty fields
  
    if(empty($_POST['email'])){
        $_SESSION['errors']['email'] = "Email của bạn là bắt buộc";
    } 
    if(empty($_POST['newPassword'])){
        $_SESSION['errors']['password'] = "Mật khẩu mới là bắt buộc";
    } 
    if(empty($_POST['confirmPassword'])){
        $_SESSION['errors']['confirmPassword'] = "Xác nhận mật khẩu của bạn";
    } 
    
    // filter and sanitize user inputs
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);
      
    
    if(App\helper::checkPsw($newPassword)){
        $_SESSION['errors']['passwordFailure'] = "Mật khẩu phải có ít nhất 8 ký tự";
        header('Location:../auth/forgot.php');
    }
    
    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
        header('Location:../auth/forgot.php');
    }
    
    if(App\helper::confirmPassword($newPassword, $confirmPassword)){
        $_SESSION['errors']['passwordMisMatch'] = "Mật khẩu không khớp";
        header('Location:../auth/forgot.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../auth/forgot.php');
    }
    //if no errors
    else{
        //check if user does not exist
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = $db->query($sql);
        if($res->num_rows <= 0){
            $_SESSION['errors']['user'] = "Xin lỗi, người dùng không tồn tại. Đăng ký!";
            header('Location:../auth/forgot.php');
        }else{
            //user exists
            //hash the user's password
            $newHashpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            //update the password in the database
            $sql = "UPDATE users SET password = '$newHashpassword' WHERE email = '$email'";
            //run mysql query
            $res = mysqli_query($db, $sql);
            $affected_rows = $db->affected_rows;
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success'] = "Mật khẩu của bạn đã được thay đổi thành công";
                header('Location:../auth/login.php');
            }else{
                $_SESSION['errors']['error'] = 'Rất tiếc, đã xảy ra lỗi';
                header('Location:../auth/forgot.php');
            }
        }
    }
    
}else{
    //redirect the user back
    header('Location:../auth/forgot.php');
}
?>
