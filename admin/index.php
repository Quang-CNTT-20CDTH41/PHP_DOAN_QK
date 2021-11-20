<?php
if(isset($_SESSION['info'])){
    if($_SESSION['info'][8] != 1) {
    echo '<script>location.href = "./index.php";</script>';
    die();
    }
}
?>

<div class="container my-4">
<div class="admin-product">
    <form action="" method="post">
        <div class="card text-white border-white header-color">
            <div class="card-header">
                <h2 class="text-center">Trang quản lý</h2>
            </div>
            <div class="card-body">
                <a href="./index.php?page=admin&product" class="btn btn-success">Sản phẩm</a>
                <a href="./index.php?page=admin&category" class="btn btn-success">Thành viên</a>
            
            </div>
            <?php
                    if(isset($_GET['category'])) require('./admin/category/index.php');
                    if(isset($_GET['product'])) require('./admin/product/index.php');
                ?>
        </div>
    </form> 
</div>
</div>