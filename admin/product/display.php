<?php 
?>
<div class="header-color py-2">
    <a href="./index.php?page=admin&manage=addProdcut"><button class="btn btn-success">Thêm Sản Phẩm</button></a>
</div>
<table class="table table-bordered table-hover border bg-success text-white font-size-12 m-0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Price Sale</th>
            <th>Descript</th>
            <th>Image</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sqlAdminPrd = 'select * from `products` inner join menu on products.menu_id = menu.menu_id';
            $resultAdminPrd = executeResult($sqlAdminPrd);
            adminProduct($resultAdminPrd);
        ?>
    </tbody>
</table>

