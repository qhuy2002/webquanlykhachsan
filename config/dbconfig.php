<?php
//To create a database conection
$db = mysqli_connect("localhost", "root", "", "hotels") or die("Không thể kết nối với cơ sở dữ liệu");
if($db->connect_error > 0){
    die($db->connect_error);
}


?>