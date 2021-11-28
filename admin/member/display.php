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