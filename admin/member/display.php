<?php
    $action = 'd-none';
    if(isset($_GET['edit'])){
        $action = 'd-block';
    }

    if(isset($_GET['edit'])){
        $idUser = $_GET['edit'];
        $sqlEditAcc = 'select hoten from user where user_id = "' . $idUser . '"'; 
        $resulgEditAcc = executeSingleResult($sqlEditAcc);
    }
?>

<table class="table table-bordered table-hover border bg-success text-white font-size-12">
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Username</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Level</th>
            <th>sửa</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sqlAdminUser = 'select * from `user`';
            $resultAdminUser = executeResult($sqlAdminUser);
            adminUser($resultAdminUser);
        ?>
    </tbody>
</table>

<div class="account <?php echo $action; ?>">
    <h4 class="text-white">Thay đổi Cấp</h4>
    <hr class="text-white">
    <form action="" method="post" class="d-flex justify-content-center">
        <div class="row">
            <h5 class="text-white"><?php echo $resulgEditAcc['hoten']; ?></h5>
            <label for="" class="col-form-label col-sm-3 text-white">Cấp bậc:</label>
            <div class="col-sm-8">
                <select name="level" class="form-select">
                    <option value="0">Khách hàng</option>
                    <option value="1">Quản lý</option>
                </select>
            </div>
            <div class="col-sm-12 my-2">
                <button class="btn btn-warning" name="changelevel">Thay đổi</button>
            </div>
        </div>
    </form>

</div>