
<div class="container">
    <h4 class="text-center">Thông tin khách hàng</h4>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Thay đổi thông tin</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <!-- THAY ĐỔI THÔNG TIN TÀI KHOẢN -->
            <div class="row">
                <form action="" method="post"> 
                    <div class="row my-1">
                        <label for="fullname" class="col-form-label col-sm-3"><h6>Họ và Tên</h6></label>
                        <div class="col-sm-5">
                            <input type="text" name="changefn" id="fullname" class="form-control" value="<?= $_SESSION['info'][0]?>">
                        </div>
                        <div class="col-sm-4">
                            <span class="text-danger">* <?php echo $fullnameErr?></span>
                        </div>
                    </div>
                    <div class="row my-1">
                        <label for="passwordold" class="col-form-label col-sm-3"><h6>Mật khẩu cũ</h6></label>
                        <div class="col-sm-5">
                            <input type="password" name="passwordold" id="passwordold" placeholder="Nhập mật khẩu cũ" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <span class="text-danger">* <?php echo $passwordErr?></span>
                        </div>
                    </div>
                    <div class="row my-1">
                        <label for="changepwd" class="col-form-label col-sm-3"><h6>Mật khẩu mới</h6></label>
                        <div class="col-sm-5">
                            <input type="password" name="changepwd" id="changepwd" placeholder="Nhập mật khẩu mới" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <span class="text-danger">* <?php echo $passwordErr?></span>
                        </div>
                    </div>
                    <div class="row my-1">
                        <label for="confirm" class="col-form-label col-sm-3"><h6>Nhập lại mật khẩu</h6></label>
                        <div class="col-sm-5">
                            <input type="password" name="confirm" id="confirm" placeholder="Nhập lại mật khẩu mới" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <span class="text-danger">* <?php echo $confirmErr?></span>
                        </div>
                    </div>
                    <div class="row my-1">
                        <label for="" class="col-form-label col-sm-3"><h6>Giới tính</h6></label>
                        <div class="col-sm-5">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Nam">
                                <label class="form-check-label" for="male">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ">
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
                    <div class="button d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="create">Xác nhận</button>
                    </div>
                </form>
            </div>
            <!-- THAY ĐỔI THÔNG TIN TÀI KHOẢN -->
        </div>
    </div>

</div>