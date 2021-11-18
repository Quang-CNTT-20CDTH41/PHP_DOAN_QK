<?php
require_once('./php/db/xuly-login.php')
?>
<!-- LOGIN -->
<div class="container my-5">
    <div class="rounded d-flex login p-3">
        <div class="img-login p-2 rounded  align-center">
            <img src="./images/login/login-bg.png" alt="">
        </div>
        <div class="content-login w-100">
            <div class="login-title mx-2">
                <?php
                if(isset($_GET['dangky'])) require_once('./php/include/login/createAcc.php');
                else require_once('./php/include/login/dangnhap.php');
                ?>
            </div>
        </div>
    </div>
</div>
<!-- !LOGIN -->