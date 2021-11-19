<?php
$username = $fullname = $password = $confirm = $email = $gender = '';
$birthday = $phonenumber = $address = $terms = $passwordLogin = $userLogin = '';

$usernameErr = $passwordErr = $fullnameErr = $confirmErr = $emailErr = $genderErr = '';
$birthdayErr = $phonenumberErr = $addressErr = $termsErr = '';

// kiem tra văn bản
function variable_text ($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

// kiem tra phone
function validatePhone($data)
{
    $v = "/^[0]{1}[0-9]{2}[0-9]{3}[0-9]{4}$/";
    return preg_match($v, $data);
}

// kiểm tra password
function variable_password($pwd)
{
    $upperCase = preg_match('@[A-Z]@', $pwd);
    $lowerCase = preg_match('@[a-z]@', $pwd);
    $number = preg_match('@[0-9]@', $pwd);
    $specialChar = preg_match('@[^\w]@', $pwd);
    if (strlen($pwd) < 8  || !$upperCase || !$lowerCase || !$number  || !$specialChar) {
        return false;
    } else {
        return true;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Lấy thông tin tạo tài tài khoản
    if(isset($_POST['create'])){
        if(empty($_POST['username'])){
            $usernameErr = 'Vui lòng nhập tài khoản!';
        }else{
            $username = variable_text($_POST['username']);
        }
    
        if(empty($_POST['fullname'])){
            $fullnameErr = 'Vui lòng nhập họ và tên!';
        }else{
            $fullname = variable_text($_POST['fullname']);
        }
    
        if(empty($_POST['password'])){
            $passwordErr = 'Vui lòng nhập mật khẩu!';
        }else{
            $password = $_POST['password'];
            if(!variable_password($password)){
                $passwordErr = 'Ít nhất 8 kí tự, 1 kí tự hoa, 1 chữ số, 1 kí tự đặc biệt';
            }
        }
    
        if(empty($_POST['confirm'])){
            $confirmErr = 'Vui lòng nhập lại mật khẩu!';
        }else{
            $confirm = $_POST['confirm'];
            if($confirm != $password){
                $confirmErr = 'Nhập lại mật khẩu không khớp!';
            }
        }
    
        if(empty($_POST['email'])){
            $emailErr = 'Vui lòng nhập Email!';
        }else{
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email không hợp lệ!"; 
             }
        }
    
        if(isset($_POST['gender'])){        
            $gender = $_POST['gender'];
        }
    
        if(isset($_POST['birthday'])){        
            $birthday =$_POST['birthday'];
        }
        
        if(empty($_POST['phonenumber'])){
            $phonenumberErr = 'Vui lòng nhập SDT!';
        }else{
            $phonenumber = $_POST['phonenumber'];
            if(!validatePhone($phonenumber)){
                $phonenumberErr = 'SDT không đúng định dạng.';
            }
        }
        
        if(empty($_POST['address'])){
            $addressErr = 'Vui lòng không để trống địa chỉ!';
        }else{
            $address = $_POST['address'];
        }
    
        if(empty($_POST['terms'])){
            $termsErr = 'Bạn chưa xác nhận điều khoản!';
        }else{
            $terms = $_POST['terms'];
        }
    }
    // !Lấy thông tin tạo tài khoản
}
