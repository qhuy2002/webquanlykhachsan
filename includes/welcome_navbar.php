<nav class="navbar navbar-expand-lg  ftco-navbar-light">
<div class="container-xl">
<a class="navbar-brand align-items-center" href="../index.php">
<span class="">Quang-Huy <small>Đặt phòng khách sạn</small></span>
</a>

   <script>
var time = new Date();
var currenttime = time.getHours();
var text = document.getElementsByClassName('text-white');
if(currenttime < 12){
    document.write('<h3 class="text-white">Chào buổi sáng và chào mừng!</h3>');
}else if(currenttime == 12){
    document.write('<h3 class="text-white">Một ngày tốt lành và chào mừng!</h3>');
}else if(currenttime > 12 && currenttime <= 15){
    document.write('<h3 class="text-white">Chào buổi chiều và chào mừng!</h3>');
}else{
    document.write('<h3 class="text-white">Chào buổi tối và chào mừng!</h3>');
}
   </script>

</div>
</nav>
<?php
include_once("../includes/js_files.php");
?>
