<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
include_once("../includes/head.php");
?>
<body class="bg-darken">
<?php
  include_once("../includes/welcome_navbar.php");
?>
<section class="hero-wrap" style="background-image: url('../assets/images/faci-2.jpg');">
    <br>
<div class="overlay"></div>
<div class="container">
<div class="row  align-items-center justify-content-center">
<div class="col-lg-8 text-white">
    <br>
    </br>
    <ul class="nav nav-tabs mb-4 ">
    <li class="nav-item"><a class="nav-link" href="../index.php">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link active" href="../auth/signup.php">Đăng Ký</a></li>
        <li class="nav-item"><a class="nav-link" href="../auth/login.php">Đăng nhập</a></li>
    </ul>
<!---Sign up form ----->
    <div id="form-holder">
        <?php
            if(isset($_SESSION['errors'])):
            ?>
            <?php foreach($_SESSION['errors'] as $err => $errMsg): ?>
            <ul class="error-msg">
            <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $errMsg; ?>
                </li>
            </ul>
            <?php endforeach; ?>
            <?php endif;
            session_destroy()
                ?>
    <form method="post" action="../processors/signup-user.php" id="form" onsubmit="return validateForm()" >
        <div class="row mb-3">
        <div class="col-lg-6">
            <div class="form-group">
        <label for="firstname">Họ</label>
        <input type="text" oninput="checkFirstName()" class="form-control" id="firstname" placeholder="Nhập họ của bạn" name="firstname" autocapitalize="words"/>
        <small id="firstnameHelp error" class="errors"></small>
        </div>
            </div>
            <div class="col-lg-6">
            <div class="form-group">
        <label for="lastname">Tên</label>
        <input type="text" oninput="checkLastName()" class="form-control" id="lastname" placeholder="Nhập tên của bạn" name="lastname" autocapitalize="words" />
        <small id="lastnameHelp error" class="errors"></small>
        </div>
            </div>
        </div>

        <div class="row mb-3">
        <div class="col-lg-6">
            <div class="form-group">
        <label for="number">SĐT</label>
        <input type="number" oninput="checkNum()" class="form-control" id="number" placeholder="Nhập SĐT của bạn" name="number" />
        <small id="numberHelp error" class="errors"></small>
        </div>
            </div>
             <div class="col-lg-6">
            <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" oninput="validateEmail()" class="form-control" id="email" placeholder="Nhập E-mail của bạn" name="email"/>
        <small id="emailHelp error" class="errors"></small>
        </div>
            </div>
        </div>

        <div class="form-group mb-3" style="width: 100%;">
            <label for="gender" style="padding-right:30px">Giới</label>
        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="male" value="Nam">
            <label for="Nam" class="form-check-label">Nam</label>
        </div>
        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="female" value="Nữ">
            <label for="Nữ" class="form-check-label">Nữ</label>
        </div>
        <small id="radioHelp" class="errors"></small>
            </div>

        <div class="row mb-4">
        <div class="col-lg-6">
            <label for="password">Mật khẩu</label>
            <div class="input-group">

        <input type="password" oninput="checkPass()" class="form-control" id="password" placeholder="Nhập mật khẩu của bạn" name="password" aria-describedby="passwordHelp"/>
                <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>

        </div>
        <small id="passwordHelp" class="errors"></small>

            </div>
            <div class="col-lg-6">
                <label for="confirmPassword">Nhập lại mật khẩu</label>
            <div class="input-group">

        <input type="password" oninput="matchPass()" class="form-control mb-4" id="confirmPassword" placeholder="Nhập lại mật khẩu" name="confirmPassword" aria-describedby="confirmPasswordHelp"/>
            <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>
        </div>
        <small id="confirmPasswordHelp" class="errors" style="margin-top: -5px;"></small>
            </div>
        </div>


        <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary p-4 py-3" style="width:50%; margin-left:25%">Đăng nhập<span class="fa fa-sign-in-alt"></span></button>
        </form>
    </div>
    <!--- End of signup form---->
    <style>
        #form-holder{
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.25);
            border-top: 1px solid rgba(255,255,255,0.5);
            border-left: 1px solid rgba(255,255,255,0.5);
            padding: 40px;
            background: none;
            margin-bottom: 40px !important;
        }
        #eye{
            height: 45px !important;
        }
    </style>
</div>
</div>
</div>

</section>
    <div class="row">
    <div class="col-lg-12">
        <br>
        </br>
        <br>
        </br>
    <br>
        </br>
<br>
        </br>
        <?php
    include_once("../includes/copyright.php");
        include_once("../includes/js_files.php");
    ?>
        </div>
    </div>

</body>
<script>

    function showPass(){

      var inputType = $("#password").attr('type');
        if(inputType == 'password'){
           $('.fa-eye').css({display: "block"});
        $('.fa-eye-slash').css({display: "none"});
        $("#password").attr('type',"text");
            $('#confirmPassword').attr('type',"text");

        }else if(inputType == "text"){
             $('.fa-eye').css({display: "none"});
        $('.fa-eye-slash').css({display: "block"});
        $("#password").attr('type',"password");
            $('#confirmPassword').attr('type',"password");
        }

    }


    //Form validation
    let id = (id) => document.getElementById(id);

let classes = (classes) => document.getElementsByClassName(classes);

let firstname = id("firstname"),
  lastname = id("lastname"),
  number = id("number"),
  email = id("email"),
  password = id("password"),
  confirmPassword = id("confirmPassword"),
  form = id("form"),
male = id("male"),
female = id("female"),
  errorMsg = classes("errors");

//Checking the empty inputs
let validateForm = () =>{
  if(firstname.value.trim() === ""){
    errorMsg[0].classList.add("text-danger");
    errorMsg[0].innerHTML = "Họ không thể trống" ;
    firstname.style.border = "1px solid red";
    return false;
  }
  if(lastname.value.trim() === ""){
    errorMsg[1].classList.add("text-danger");
    errorMsg[1].innerHTML = "Tên không thể trống";
    lastname.style.border = "1px solid red";
    return false;
  }
  if(number.value.trim() === ""){
    errorMsg[2].classList.add("text-danger");
    errorMsg[2].innerHTML = "SĐT không thể trống";
    number.style.border = "1px solid red";
    return false;
  }
  if(email.value.trim() === ""){
    errorMsg[3].classList.add("text-danger");
    errorMsg[3].innerHTML = "Email không thể trống";
    email.style.border = "1px solid red";
    return false;
  }
  if(!(male.checked || female.checked)){
    errorMsg[4].classList.add("text-danger");
    errorMsg[4].innerHTML = "Chọn giới tính của bạn";
    return false;
  }
  if(password.value.trim() === ""){
    errorMsg[5].classList.add("text-danger");
    errorMsg[5].innerHTML = "Mật khẩu không thể trống";
    password.style.border = "1px solid red";
    return false;
  }
  if(password.value.trim() === ""){
    errorMsg[5].classList.add("text-danger");
    errorMsg[5].innerHTML = "Mật khẩu không thể trống";
    password.style.border = "1px solid red";
    return false;
  }
  if(confirmPassword.value.trim() === ""){
    errorMsg[6].classList.add("text-danger");
    errorMsg[6].innerHTML = "Nhâp lại mật khẩu không thể trống";
    confirmPassword.style.border = "1px solid red";
    return false;
  }
}

//   let validateForm = (id, serial, message) => {
//
//   if (id.value.trim() === "") {
//     errorMsg[serial].classList.add("text-danger");
//     errorMsg[serial].innerHTML = message;
//     id.style.border = "1px solid red";
//   }
//
//   else {
//     errorMsg[serial].innerHTML = "";
//     id.style.border = "1px solid green";
//
//
//   }
// }
//
// //event listener for the submit button
//   form.addEventListener("submit", (e) => {
//     e.preventDefault();

//   validateForm(firstname, 0, "First Name cannot be blank");
//   validateForm(lastname, 1, "Last Name cannot be blank");
//   validateForm(number, 2, "Mobile Number cannot be blank");
//  validateForm(email, 3, "Email cannot be blank");
//  validateForm(password, 5, "Password cannot be blank");
//  validateForm(confirmPassword, 6, "Password Confirm is empty");
// });

//Checking the strlen of first name
function checkFirstName(){
	var getFirst = firstname.value.trim();
	if(getFirst == ""){
		errorMsg[0].innerHTML = "";

	}else if(getFirst.length < 1){
    errorMsg[0].classList.add("text-danger");
	  errorMsg[0].innerHTML = "Tên không nên nhỏ hơn 1";
      firstname.style.border = "1px solid red";

	}else if(getFirst.length > 40){
    errorMsg[0].classList.add("text-danger");
          errorMsg[0].innerHTML = "Tên không nên quá 40";
      firstname.style.border = "1px solid red";

	}else{
		    errorMsg[0].innerHTML = "";
      firstname.style.border = "1px solid green";
	}
}

//Checking the strlen of last name
function checkLastName(){
	var getLast = lastname.value.trim();
	if(getLast == ""){
		errorMsg[1].innerHTML = "";

	}else if(getLast.length < 1){
    errorMsg[1].classList.add("text-danger");
	  errorMsg[1].innerHTML = "Tên không nên nhỏ hơn 1";
      lastname.style.border = "1px solid red";

	}else if(getLast.length > 25){
    errorMsg[1].classList.add("text-danger");
          errorMsg[1].innerHTML = "Tên không nên quá 25";
      lastname.style.border = "1px solid red";

	}else{
		    errorMsg[1].innerHTML = "";
      lastname.style.border = "1px solid green";
	}
}

//phone number validation
function checkNum(){
  var getNum = number.value.trim();
  var regExp = /^\d{10}$/;
  if(getNum.match(regExp)){
    errorMsg[2].innerHTML = "";
  number.style.border = "1px solid green";
}else if(getNum == ""){
  errorMsg[2].innerHTML = "";
number.style.border = "0px solid green";
}else {
  errorMsg[2].classList.add("text-danger");
        errorMsg[2].innerHTML = "Số điện thoại không chính xác";
    number.style.border = "1px solid red";
}
}

//email validation
function validateEmail(){
  var getEmail = email.value.trim();
  var regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if(regExp.test(getEmail)){
		errorMsg[3].innerHTML = "";
      email.style.border = "1px solid green";

	}else if(getEmail == ""){
		errorMsg[3].innerHTML = "";
      email.style.border = "0px solid green";

	}else{
    errorMsg[3].classList.add("text-danger");
		errorMsg[3].innerHTML = "Email không hợp lệ";
      email.style.border = "1px solid red";
	}
}

//password validation
function checkPass(){
	var getPass = password.value.trim();
	if(getPass == ""){
		errorMsg[5].innerHTML = "";
      password.style.border = "0px solid green";

	}else if(getPass.length < 8){
    errorMsg[5].classList.add("text-danger");
	  errorMsg[5].innerHTML = "Mật khẩu không được nhỏ hơn 8";
      password.style.border = "1px solid red";

	}else{
      errorMsg[5].innerHTML = "";
      password.style.border = "1px solid green";
	}
}

//password mismatch
function matchPass(){
  var getPass = password.value.trim();
	var getConfirmPass = confirmPassword.value.trim();

	if(getConfirmPass == ""){
		errorMsg[6].innerHTML = "";

	}else if(getPass != getConfirmPass){
    errorMsg[6].classList.add("text-danger");
		errorMsg[6].innerHTML = "Mật khẩu không khớp";
      confirmPassword.style.border = "1px solid red";

	}else{
		 errorMsg[6].innerHTML = "";
      confirmPassword.style.border = "1px solid green";
	}
}
</script>

</html>
