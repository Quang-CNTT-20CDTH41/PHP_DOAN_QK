<?php
if(isset($_SESSION['info'])){
    if($_SESSION['info'][8] != 1) {
        echo '<script>location.href = "./index.php";</script>';
        die();
    }
}else{
    echo '<script>location.href = "./index.php";</script>';
}

require_once('xuly.php');
?>

<div class="container my-4">
    <div class="admin-product text-center header-color">
        <div class="form-admin">
            <form action="" method="post">
                <div class="card text-white border-white header-color">
                    <div class="card-header">
                        <h2 class="text-center">Trang quản lý</h2>
                    </div>
                    <div class="card-body">
                        <a href="./index.php?page=admin&manage=product" class="btn btn-success">Sản phẩm</a>
                        <a href="./index.php?page=admin&manage=member" class="btn btn-success">Thành viên</a>
                        <a href="./index.php?page=admin&manage=menu" class="btn btn-success">Thanh Menu</a>
                        <a href="./index.php?page=admin&manage=cart" class="btn btn-success">Giao hàng</a>
                    </div>
                </div>
            </form> 
        </div>
        <?php
            $manage = isset($_GET['manage']) ? $_GET['manage'] : '';
            switch ($manage) {
                case 'menu':
                    require('./admin/menu/index.php');
                    break;
                case 'product':
                    require('./admin/product/display.php');
                    break;
                case 'addProdcut':
                    require('./admin/product/add.php');
                    break;
                case 'editProdcut':
                    require('./admin/product/edit.php');
                    break;
                case 'member':
                    require('./admin/member/display.php');
                    break;
                case 'cart':
                    require('./admin/cart/index.php');
                    break;
                default:
                    require('./admin/product/display.php');
            }
        ?>
    </div>
</div>