<!-- ĐĂNG KÝ -->
<div class="mt-3">
    <h4 class="text-center mt-4">Đăng ký tài khoản</h4>
    <p class="text-center">Chú ý các nội dung có dấu * bạn cần phải nhập</p>
    <form action="" method="post"> 
        <div class="row my-1">
            <label for="fullname" class="col-form-label col-sm-3"><h6>Họ và Tên</h6></label>
            <div class="col-sm-5">
                <input type="text" name="fullname" id="fullname" placeholder="Nhập tên của bạn" class="form-control" value="<?= $fullname?>">
            </div>
            <div class="col-sm-4">
                <span class="text-danger">* <?php echo $fullnameErr?></span>
            </div>
        </div>
        <div class="row my-1">
            <label for="username" class="col-form-label col-sm-3"><h6>Tài khoản</h6></label>
            <div class="col-sm-5">
                <input type="text" name="username" id="username" placeholder="Nhập tài khoản" class="form-control" value="<?= $username?>">
            </div>
            <div class="col-sm-4">
                <span class="text-danger">* <?php echo $usernameErr?></span>
            </div>
        </div>
        <div class="row my-1">
            <label for="password" class="col-form-label col-sm-3"><h6>Mật khẩu</h6></label>
            <div class="col-sm-5">
                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
            </div>
            <div class="col-sm-4">
                <span class="text-danger">* <?php echo $passwordErr?></span>
            </div>
        </div>
        <div class="row my-1">
            <label for="confirm" class="col-form-label col-sm-3"><h6>Nhập lại mật khẩu</h6></label>
            <div class="col-sm-5">
                <input type="password" name="confirm" id="confirm" placeholder="Nhập lại mật khẩu" class="form-control">
            </div>
            <div class="col-sm-4">
                <span class="text-danger">* <?php echo $confirmErr?></span>
            </div>
        </div>
        <div class="row my-1">
            <label for="email" class="col-form-label col-sm-3"><h6>Email</h6></label>
            <div class="col-sm-5">
                <input type="text" name="email" id="email" placeholder="Nhập Email của bạn" class="form-control"  value="<?= $email?>">
            </div>
            <div class="col-sm-4">
                <span class="text-danger">* <?php echo $emailErr ?></span>
            </div>
        </div>
        <div class="row my-1">
            <label for="" class="col-form-label col-sm-3"><h6>Giới tính</h6></label>
            <div class="col-sm-5">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Nữ</label>
                </div>
            </div>
        </div>
        <div class="row my-1">
            <label for="birthday" class="col-form-label col-sm-3"><h6>Ngày sinh</h6></label>
            <div class="col-sm-5">
                <input type="date" name="birthday" id="birthday" class="form-control">
            </div>
        </div>
        <div class="row">
            <label for="phonenumber" class="col-form-label col-sm-3"><h6>Số điện thoại</h6></label>
            <div class="col-sm-5">
                <input type="phone" name="phonenumber" id="phonenumber" class="form-control" placeholder="070-805-0907" value="<?= $phonenumber?>">
            </div>
            <div class="col-sm-4">
                <span class="text-danger">* <?php echo $phonenumberErr?></span>
            </div>
        </div>
        <div class="row my-1">
            <label for="address" class="col-form-label col-sm-3"><h6>Địa chỉ</h6></label>
            <div class="col-sm-5">
                <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn" value="<?= $address?>">
            </div>
            <div class="col-sm-4">
                <span class="text-danger">* <?php echo $addressErr?></span>
            </div>
        </div>
        <div class="form-check form-switch d-flex">
            <input class="form-check-input" type="checkbox" id="terms" name="terms">
            <label class="form-check-label mx-2" for="terms"> Đồng ý điều khoản. </label> 
            <div class="col-sm-5">
                <span class="text-danger mx-2">* <?php echo $termsErr ?></span>
            </div>
        </div>
        <div class="button d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="create">Đăng ký</button>
            <button type="submit" class="btn btn-success mx-2" name="login">
                    <a href="./index.php?page=login&dangnhap" class="text-decoration-none text-white">Đăng nhập</a>
            </button>
        </div>
        <div class="forgotpass">
            <a href="#" class="text-decoration-none float-end text-black h6">Điều khoản</a>
        </div>
    </form>
</div>
<!-- !ĐĂNG KÝ -->