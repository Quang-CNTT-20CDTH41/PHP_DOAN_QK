<?php
    if(empty($_SESSION['info'])) {
        require('./php/include/login/dangnhap.php');
        die();
    };
?>
<div class="container">
    <h4 class="text-center">Thông tin khách hàng</h4>
    <ul class="nav nav-pills mb-3">
        <li>
            <a class="nav-link text-color <?php if(isset($_GET['profile'])){echo 'active"';};?>" href="index.php?page=login&action=account&profile">Tài khoản</a>
        </li>
        <li>
            <a class="nav-link text-color <?php if(isset($_GET['change'])){echo 'active"';};?>"  href="index.php?page=login&action=account&change">Thay đổi thông tin</a>
        </li>
    </ul>
    <div class="tab-content">
        <div <?php if(isset($_GET['change'])){echo 'class="d-none"';};?>>
            <!-- HIỂN THỊ THÔNG TIN TÀI KHOẢN -->
            <div class="row">
                    <div class="title-info d-flex my-1">
                        <label for="" class="col-sm-2">Họ  và Tên</label>
                        <span class="mx-3">: <?php echo $_SESSION['info'][0]; ?></span>
                    </div>
                    <div class="title-info d-flex my-1">
                        <label for="" class="col-sm-2">Giới tính</label>
                        <span class="mx-3">: <?php echo $_SESSION['info'][1]; ?></span>
                    </div>
                    <div class="title-info d-flex my-1">
                        <label for="" class="col-sm-2">Tên tài khoản</label>
                        <span class="mx-3">: <?php echo $_SESSION['info'][2]; ?></span>
                    </div>
                    <div class="title-info d-flex my-1">
                        <label for="" class="col-sm-2">Ngày sinh: </label>
                        <span class="mx-3">: <?php echo $_SESSION['info'][4]; ?></span>
                    </div>
                    <div class="title-info d-flex my-1">
                        <label for="" class="col-sm-2">Địa chỉ: </label>
                        <span class="mx-3">: <?php echo $_SESSION['info'][5]; ?></span>
                    </div>
                    <div class="title-info d-flex my-1">
                        <label for="" class="col-sm-2">Email: </label>
                        <span class="mx-3">: <?php echo $_SESSION['info'][6]; ?></span>
                    </div>
                    <div class="title-info d-flex my-1">
                        <label for="" class="col-sm-2">Số điện thoại: </label>
                        <span class="mx-3">: <?php echo $_SESSION['info'][7]; ?></span>
                    </div>
                </div>
            </div>
            <!-- HIỂN THỊ THÔNG TIN TÀI KHOẢN -->
            
        <div <?php if(isset($_GET['profile'])){echo 'class="d-none"';};?>>
            <!-- THAY ĐỔI THÔNG TIN TÀI KHOẢN -->
            <div class="row">
                <form action="" method="post"> 
                    <div class="row my-1">
                        <label for="fullname" class="col-form-label col-sm-3"><h6>Họ và Tên</h6></label>
                        <div class="col-sm-5">
                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $_SESSION['info'][0] ?>">
                        </div>
                    </div>
                    <div class="btn btn-success" id="changePassword">Đổi mật khẩu</div>
                    <div class="d-none" id="hiddenPassword">
                        <div class="row">
                            <label for="passwordold" class="col-form-label col-sm-3"><h6>Mật khẩu cũ</h6></label>
                            <div class="col-sm-5">
                                <input type="password" name="passwordold" id="passwordold" placeholder="Nhập mật khẩu cũ" class="form-control">
                            </div>
                        </div>
                        <div class="row my-1">
                            <label for="changepwd" class="col-form-label col-sm-3"><h6>Mật khẩu mới</h6></label>
                            <div class="col-sm-5">
                                <input type="password" name="changepwd" id="changepwd" placeholder="Nhập mật khẩu mới" class="form-control">
                            </div>
                        </div>
                        <div class="row my-1">
                            <label for="confirm" class="col-form-label col-sm-3"><h6>Nhập lại mật khẩu</h6></label>
                            <div class="col-sm-5">
                                <input type="password" name="confirm" id="confirm" placeholder="Nhập lại mật khẩu mới" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <label for="" class="col-form-label col-sm-3"><h6>Giới tính</h6></label>
                        <div class="col-sm-5">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Nam" <?php if($_SESSION['info'][1] == 'Nam') echo 'checked';?>>
                                <label class="form-check-label" for="male">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ" <?php if($_SESSION['info'][1] == 'Nữ') echo 'checked';?>>
                                <label class="form-check-label" for="female">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <label for="birthday" class="col-form-label col-sm-3"><h6>Ngày sinh</h6></label>
                        <div class="col-sm-5">
                            <input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo $_SESSION['info'][4]; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label for="phonenumber" class="col-form-label col-sm-3"><h6>Số điện thoại</h6></label>
                        <div class="col-sm-5">
                            <input type="phone" name="phonenumber" id="phonenumber" class="form-control" placeholder="070-805-0907" 
                            value="<?= $_SESSION['info'][7] ?>">
                        </div>
                    </div>
                    <div class="row my-1">
                        <label for="address" class="col-form-label col-sm-3"><h6>Địa chỉ</h6></label>
                        <div class="col-sm-5">
                            <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn"
                            value="<?= $_SESSION['info'][5] ?>">
                        </div>
                    </div>
                    <div class="button d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="changeAccount">Xác nhận</button>
                    </div>
                </form>
            </div>
            <!-- THAY ĐỔI THÔNG TIN TÀI KHOẢN -->
        </div>
    </div>

</div>

<script>
    changePassword = document.getElementById('changePassword');
    hiddenPassword = document.getElementById('hiddenPassword');
    i = 1;
    changePassword.addEventListener('click', function () {
        switch(i){
            case 1:
                hiddenPassword.setAttribute('class', 'd-block');
                i = -1;
                break;
            case -1:
                hiddenPassword.setAttribute('class', 'd-none');
                i = 1;
                break;
        }
    });

</script>