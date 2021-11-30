<?php
require_once('./php/db/variable.php');

// ĐĂNG KÝ TÀI KHOẢN
if (isset($_POST['create'])) {
    if ($usernameErr == '' && $fullnameErr == '' && $passwordErr == '' && $confirmErr == '' && $emailErr == '' && $phonenumberErr == '' && $addressErr == '') {
        $sqlLogin = 'select * from `user` where user_name = "' . $username . '"';
        $resultLogin = executeSingleResult($sqlLogin);
        if ($resultLogin == 0) {
            $sqlCreateAccount = 'insert into user(hoten, gender, user_name, password, birthday, address, email, phone) 
            values("' . $fullname . '", "' . $gender . '", "' . $username . '", "' . md5($password) . '", "' . $birthday . '", "' . $address . '", "' . $email . '", "' . $phonenumber . '")';
            execute($sqlCreateAccount);
            echo '<script>alert("Đăng ký thành công.");</script>';
        } else {
            echo '<script>alert("Tên tài khoản đã tồn tại.");</script>';
        }
    }
}

// ĐĂNG NHẬP
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $userLogin = $_POST['username'];
        $passwordLogin = md5($_POST['password']);

        $sqlLogin = 'select * from `user` where user_name = "' . $userLogin . '"';
        $resultLogin = executeSingleResult($sqlLogin);
    
        // XÁC NHẬN MẬT KHẨU
        if ($resultLogin > 0) {
            if ($passwordLogin == $resultLogin['password']) {
                // LƯU THÔNG TIN BẰNG SESSION
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
                    $info[8] = $resultLogin['level'];
                    $_SESSION['info'] = $info;
                }
                header('Location: index.php');
            } else echo '<script>alert("Sai thông tin mật khẩu");</script>';
        } else echo '<script>alert("Sai thông tin tài khoản");</script>';
    }
}

// Xoá session khi đăng xuất 
if (isset($_GET['dangxuat'])) {
    session_destroy();
    header('Location: index.php');
    die();
}

// THAY ĐỔI THÔNG TIN NGƯỜI DÙNG
if(isset($_POST['changeAccount'])){
    if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }

    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
    }

    if(isset($_POST['birthday'])){
        $birthday = $_POST['birthday'];
    }

    if(isset($_POST['phonenumber'])){
        $phonenumber = $_POST['phonenumber'];
    }

    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    if(isset($_GET['change'])) {
        $change = $_GET['change'];

        $sqlCheck = 'select * from `user` where user_name = "' .  $_SESSION['info'][2] . '"';
        $resultCheck  = executeSingleResult($sqlCheck);

        if($change == 'password'){
            if(isset($_POST['passwordold']) && isset($_POST['changepwd']) && isset($_POST['confirm'])){
                $passwordold = $_POST['passwordold'];
                $changepwd = $_POST['changepwd'];
                $confirm = $_POST['confirm'];
                if(md5($passwordold) == $resultCheck['password']){
                    if($changepwd == $confirm) {
                        $sqlChange = 'update user set hoten = "'. $fullname .'", gender = "'. $gender .'", birthday = "'. $birthday .'", 
                        address = "'. $address .'", phone =  "'. $phonenumber .'" , password = "'. md5($changepwd) .'" where user_name = "'. $resultCheck['user_name'] .'"';
                        execute($sqlChange);
                        echo '<script>alert("Đổi thông tin thành công");</script>';
                    }else{
                        echo '<script>alert("Mật khẩu nhập lại không trùng khớp");</script>';
                    }
                }else{
                    echo '<script>alert("Mật khẩu cũ sai");</script>';
                }
            }
        }else{
            $sqlChange = 'update user set hoten = "'. $fullname .'", gender = "'. $gender .'", birthday = "'. $birthday .'", 
            address = "'. $address .'", phone =  "'. $phonenumber .'" where user_name = "'. $_SESSION['info'][2] .'"';
                $info = array();
                $info[0] = $fullname;
                $info[1] = $gender;
                $info[2] = $resultCheck['user_name'];
                $info[3] = $resultCheck['user_name'];
                $info[4] = $birthday;
                $info[5] = $address;
                $info[6] = $resultCheck['email'];
                $info[7] = $phonenumber;
                $info[8] = 0;
                $_SESSION['info'] = $info;
                execute($sqlChange);
                echo '<script>alert("Đổi thông tin thành công");</script>';
        }
    }
}
