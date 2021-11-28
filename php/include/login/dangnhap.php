<!-- ĐĂNG NHẬP -->
<div class="login-app">
    <h4 class="text-center m-3">Đăng ký tài khoản</h4>
    <div class="d-flex">
        <div class="m-auto">
            <button class="btn btn-primary">
                <i class="bi bi-facebook"></i>
                <span> Facebook</span>
            </button>
            <button class="btn btn-warning text-white">
                <i class="bi bi-google"></i>
                <span> Google</span>
            </button>
        </div>
    </div>
    <div class="splice">
        <p>Hoặc</p>
    </div>
    <!-- FORM LOGIN -->
    <div class="form-login m-5">
        <form action="" method="post"> 
            <div class="row">
                <label for="username" class="col-form-label col-sm-3"><h4>Tài khoản</h4></label>
                <div class="col-sm-9">
                    <input type="text" name="username" id="user" placeholder="Nhập tài khoản" class="form-control" value="<?= $userLogin?>">
                </div>
            </div>
            <div class="row">
                <label for="password" class="col-form-label col-sm-3"><h4>Mật khẩu</h4></label>
                <div class="col-sm-9">
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="memorize" name="memorize">
                <label class="form-check-label" for="memorize">Ghi nhớ thông tin đăng nhập</label>
            </div>
            <div class="button d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
                <button type="submit" class="btn btn-success mx-2" name="login">
                    <a href="./index.php?page=login&action=dangky" class="text-decoration-none text-white">Đăng ký</a>
                </button>
            </div>
            <div class="forgotpass">
                <a href="#" class="text-decoration-none float-end text-black h6">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
    <!-- !FORM LOGIN -->
</div>
<!-- !ĐĂNG NHẬP -->
