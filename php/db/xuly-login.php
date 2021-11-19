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

    $sqlLogin = 'select * from `user` where user_name = "' . $userLogin . '"';
    $resultLogin = executeSingleResult($sqlLogin);

    // XÁC NHẬN MẬT KHẨU
    if($resultLogin > 0){
        if($passwordLogin == $resultLogin['password']){
            $_SESSION['userLogin'] = $userLogin;
            
            // LƯU THÔNG TIN BẰNG SESSION
            if(isset($_POST['memorize'])){
                if (empty($_SESSION['info'])) {
                    $info = array();
                    $info[0] = $resultLogin['hoten'];
                    $info[1] = $resultLogin['gender'];
                    $info[2] = $resultLogin['user_name'];
                    $info[3] = $resultLogin['password'];
                    $info[4] = $resultLogin['birthday'];
                    $info[5] = $resultLogin['address'];
                    $info[6] = $resultLogin['email'];
                    $info[7] = $resultLogin['phone'];
                    $_SESSION['info'] = $info;
                }
            }else{
                if (empty($_SESSION['info'])) {
                    $info = array();
                    $info[0] = $resultLogin['hoten'];
                    $info[1] = $resultLogin['gender'];
                    $info[2] = $resultLogin['user_name'];
                    $info[3] = $resultLogin['password'];
                    $info[4] = $resultLogin['birthday'];
                    $info[5] = $resultLogin['address'];
                    $info[6] = $resultLogin['email'];
                    $info[7] = $resultLogin['phone'];
                    $_SESSION['info'] = $info;
                } 
            }
            header('Location: index.php');

        } else echo '<script>alert("Sai thông tin mật khẩu");</script>';

        
    }else echo '<script>alert("Sai thông tin tài khoản");</script>';

    
}

if(isset($_GET['dangxuat'])){
    session_destroy();
    header('Location: index.php');
    die();
}

