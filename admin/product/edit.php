<?php
    if(isset($_GET['id']) && ($_GET['manage'] == 'editProdcut')){
        $idEdit = $_GET['id'];
        $sql = 'select * from products where product_id = '. $idEdit;
        $s = executeResult($sql);
    }

?>

<div class="header-color text-white">
    <form action="" method="post" class="mx-5" enctype="multipart/form-data">
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Tên sản phẩm</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩn" name="prdName" value="<?= $s[0]['product_name'] ?>">
            </div>
        </div>
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Giá sản phẩm</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Nhập giá sản phẩn" name="price" value="<?= $s[0]['product_price'] ?>">
            </div>
        </div>
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Giảm giá</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Nhập giá giảm giá" name="priceSale" value="<?= $s[0]['price_sale'] ?>">
            </div>
        </div>
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Mô tả</label>
            <div class="col-sm-9">
                <textarea name="descript" id="" cols="90" rows="3" class="form-control"  placeholder="Nhập mô tả" ><?php echo $s[0]['descript'] ?></textarea>
            </div>
        </div>
        <button class="btn btn-success mb-2" name="editProduct">Sửa</button>
        <a class="btn btn-warning  mb-2" href="./index.php?page=admin&manage=product">Trở lại</a>
    </form>
</div>