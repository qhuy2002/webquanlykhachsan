<?php
session_start();
//require some files
include_once('../config/dbconfig.php');
include_once('../helper/helper.php');


$_SESSION['errors'] = array();

//collect user data

if(isset($_POST['book'])){
    //check for empty fields
    if(empty($_POST['name'])){
       $_SESSION['errors']['name'] = "Tên của bạn là bắt buộc";
   }
    
    if(empty($_POST['number'])){
       $_SESSION['errors']['number'] = "Số điện thoại của bạn là bắt buộc";
   }
    if(empty($_POST['email'])){
       $_SESSION['errors']['email'] = "Email của bạn là bắt buộc";
   }
   
    if(empty($_POST['gender'])){
       $_SESSION['errors']['gender'] = "Giới tính của bạn là bắt buộc";
   }
    if(empty($_POST['address'])){
       $_SESSION['errors']['address'] = "Địa chỉ của bạn là bắt buộc";
   } 
    if(empty($_POST['checkInDate'])){
       $_SESSION['errors']['checkInDate'] = "Ngày Nhận Phòng là bắt buộc";
   }
    if(empty($_POST['checkOutDate'])){
       $_SESSION['errors']['checkOutDate'] = "Ngày Trả Phòng là bắt buộc";
   }
    if(empty($_POST['room_name'])){
       $_SESSION['errors']['room_name'] = "Tên phòng là bắt buộc";
   }
    if(empty($_POST['agreeToTerms'])){
       $_SESSION['errors']['agreeToTerms'] = "Đồng ý với Điều khoản và Điều kiện của chúng tôi";
   }
    
    
    // filter and sanitize user inputs
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['number']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $cardType = mysqli_real_escape_string($db, $_POST['cardType']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $checkInDate = mysqli_real_escape_string($db, $_POST['checkInDate']);
    $checkOutDate = mysqli_real_escape_string($db, $_POST['checkOutDate']);

    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Định dạng email không hợp lệ";
        header('Location:../users/booking.php');
    }
    if(count($_SESSION['errors']) > 0){
        header('Location:../users/booking.php');
    }
    
    $room_name = $_POST['room_name'];
    $sql = "SELECT * FROM rooms WHERE room_name = '$room_name'";
    $res = $db->query($sql);
    $row = mysqli_fetch_assoc($res);
    $max_persons = $row['max_persons'];
    $room_price = $row['room_price'];
    
    $bookingDate = date("d/m/y");
    
    //for booking price 
    $diff = strtotime($checkInDate) - strtotime($checkOutDate);
    // 1 day = 24 hours
    //24 * 60 * 60 = 86400 seconds
    $days = ceil(abs($diff / 86400));
    if($days <= 0){
        $booking_price = 1 * $room_price;  
    }else{
        $booking_price = $days * $room_price;
    }
    
    
    $user_id = $_SESSION['id'];
    
    //GENERATE A RANDOM NUMBER AND ALPHBETS::::: 8 NUMBERS AND 1 ALPHBETS = 9 CHARACTERS
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXVZ";
    $bookingNumber = mt_rand(10000000, 99999999) . $characters[rand(0, strlen($characters) - 1)];
    
    
    $sql = "INSERT INTO bookings (user_id, user_name, user_number, user_email, booking_number, user_gender, user_address, booking_date, booking_price, room_name, max_persons, check_in_date, check_out_date) VALUES('$user_id', '$name', '$phonenumber', '$email',  '$bookingNumber', '$gender', '$address', '$bookingDate', '$booking_price', '$room_name', '$max_persons', '$checkInDate', '$checkOutDate')";
        
    //run msql query
    $res = mysqli_query($db, $sql);
    if($res){
        $_SESSION['success'] = 'Đặt phòng của bạn đã thành công';
        header('Location:../users/booking.php');
    }else{
        $_SESSION['errors']['error'] = 'Rất tiếc, có điều gì đó không đúng';
        header('Location:../users/booking.php');
    }
        
    
    
}else{
    $_SESSION['errors']['error'] = "Truy cập không được ủy quyền";
    header('Location:../users/booking.php');
}


?>
