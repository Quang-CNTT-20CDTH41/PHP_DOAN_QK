<?php
$sendForm = '';
$veryForm = 'd-none';
if (isset($_POST['code'])) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $sqlCheckMail = 'select * from user where email = "' . $email . '"';
        $resultCheckMail = executeSingleResult($sqlCheckMail);
        if ($resultCheckMail > 0) {
            $code = bin2hex(random_bytes(3));
            $to_email = $resultCheckMail['email'];
            $subject = "Tin nhắn được gửi từ website SHOPMOBILE";
            $body = "Dây là mã để xác nhận mật khẩu của bạn: " . $code;
            $headers = "From: quangiphonex10@gmail.com";
            $_SESSION['code'] = $code; 
            $_SESSION['email'] = $email; 
            if (mail($to_email, $subject, $body, $headers)) {
                $sendForm = "d-none";
                $veryForm = "";
                echo '<script src="./js/countdown.js" language="javascript"></script>';
            } else {
                echo "Không thể gửi tin nhắn";
            }
        }else{
            echo "<script>alert('Email không trùng khớp với tài khoản nào trên hệ thống.');</script>";
        }
    }
}

if(isset($_POST['very'])){
    if(isset($_POST['code'])){
        $Verycode = $_POST['code'];
        if($Verycode == $_SESSION['code']){
            if(isset($_POST['password']) && isset($_POST['confirm'])){
                $password = $_POST['password'];
                $confirm = $_POST['confirm'];
                if($password == $confirm){
                    $sqlChangePw = 'update user set password = "' . md5($password) . '" where email = "' . $_SESSION['email'] . '"';
                    execute($sqlChangePw);
                    echo '<script>alert("Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại.");</script>';
                }
            }
        }
    }
}
?>
<!-- QUÊN MẬT KHẨU -->
<div class="login-app">
    <h4 class="text-center m-3">Quên mật khẩu</h4>
    <div class="splice"> </div>
    <!-- FORM FORGET -->
    <div class="form-login m-5">
        <form action="" method="post" class="<?php echo $sendForm?>">
            <div class="row">
                <label for="email" class="col-form-label col-sm-3">
                    <h4>Email</h4>
                </label>
                <div class="col-sm-9">
                    <input type="email" name="email" id="email" placeholder="Nhập Email" class="form-control">
                </div>
            </div>
            <div class="button d-flex justify-content-center mx-5">
                <button type="submit" class="btn btn-primary" name="code">Gửi mã</button>
            </div>
        </form>

        <form action="" method="post" class="<?php echo $veryForm?>">
        
        <div class="row">
                <label for="password" class="col-form-label col-sm-5">
                    <h4>Mật khẩu mới</h4>
                </label>
                <div class="col-sm-7">
                    <input type="password" name="password" id="password" placeholder="Nhập Mật Khẩu Mới" class="form-control">
                </div>
            </div>
            <div class="row">
                <label for="confirm" class="col-form-label col-sm-5">
                    <h4>Nhập lại mật khẩu</h4>
                </label>
                <div class="col-sm-7">
                    <input type="password" name="confirm" id="confirm" placeholder="Nhập Lại Mật Khẩu" class="form-control">
                </div>
            </div>
            <div class="row">
                <label for="code" class="col-form-label col-sm-5">
                    <h4>Mã xác nhận</h4>
                </label>
                <div class="col-sm-3">
                    <input type="text" name="code" id="code" placeholder="Nhập Mã Xác Nhận" class="form-control">
                </div>
            </div>
            <div class="button d-flex justify-content-center mx-5" id="very"></div>
        </form>

        <div class="forgotpass">
            <a href="./index.php?page=login&action=dangnhap" class="text-decoration-none float-end text-white h6">Đăng nhập</a>
        </div>
    </div>
    <!-- !FORM FORGET -->
</div>
<!-- !QUÊN MẬT KHẨU -->