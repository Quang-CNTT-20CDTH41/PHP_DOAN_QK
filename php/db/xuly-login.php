<?php
require_once('./php/db/variable.php');

// ĐĂNG KÝ TÀI KHOẢN
if(isset($_POST['create'])){
    if($usernameErr == '' && $fullnameErr == '' && $passwordErr == '' && $confirmErr == '' && $emailErr == '' && $phonenumberErr == '' && $addressErr == ''){
        $sqlCreateAccount = 'insert into user(hoten, gender, user_name, password, birthday, address, email, phone) 
        values("'.$fullname.'", "'.$gender.'", "'.$username.'", "'.md5($password).'", "'.$birthday.'", "'.$address.'", "'.$email.'", "'.$phonenumber.'")';
        execute($sqlCreateAccount);
        echo '<script>alert("Đăng ký thành công.");</script>';
    }
}

// ĐĂNG NHẬP
if(isset($_POST['login'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
        $userLogin = $_POST['username'];
        $passwordLogin = md5($_POST['password']);
    }

    if(isset($_POST['memorize'])){
        $memorize = $_POST['memorize'];
    }

    $sqlLogin = 'select * from `user` where user_name = "' . $userLogin . '"';
    $resultLogin = executeSingleResult($sqlLogin);

    if($resultLogin > 0){
        if($passwordLogin == $resultLogin['password']){
            $_SESSION['userLogin'] = $userLogin;
            header('Location: index.php');
        } else echo '<script>alert("Sai thông tin mật khẩu");</script>';
    }else echo '<script>alert("Sai thông tin tài khoản");</script>';
}

if(isset($_GET['dangxuat'])){
    unset($_SESSION['userLogin']);
    header('Location: index.php');
}

