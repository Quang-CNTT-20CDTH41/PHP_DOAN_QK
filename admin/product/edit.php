<?php
    if(isset($_GET['id']) && ($_GET['manage'] == 'editProdcut')){
        $idEdit = $_GET['id'];
        $sqlProdcutEdit = 'select * from products inner join info where products.product_id = info.product_id and products.product_id = '. $idEdit;
        $resultPrdEdit = executeResult($sqlProdcutEdit);

    }

?>

<div class="header-color text-white">
    <form action="" method="post" class="mx-5" enctype="multipart/form-data">
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Tên sản phẩm</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩn" name="prdName" value="<?= $resultPrdEdit[0]['product_name'] ?>">
            </div>
        </div>
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Giá sản phẩm</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Nhập giá sản phẩn" name="price" value="<?= $resultPrdEdit[0]['product_price'] ?>">
            </div>
        </div>
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Giảm giá</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Nhập giá giảm giá" name="priceSale" value="<?= $resultPrdEdit[0]['price_sale'] ?>">
            </div>
        </div>
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Mô tả</label>
            <div class="col-sm-9">
                <textarea name="descript" id="" cols="90" rows="3" class="form-control"  placeholder="Nhập mô tả" ><?php echo $resultPrdEdit[0]['descript'] ?></textarea>
            </div>
        </div>
        <div class="row py-2">
            <label for="" class="col-form-label col-sm-2">Giảm giá</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Nhập giá giảm giá" name="priceSale" value="<?= $resultPrdEdit[0]['price_sale'] ?>">
            </div>
        </div>
        <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Màn hình</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nhập mô tả" name="display" value="<?= $resultPrdEdit[0]['display'] ?>" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Camera Trước</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Camera trước" name="cameratruoc" value="<?= $resultPrdEdit[0]['cameratruoc'] ?>" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Camera Sau</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Camera sau" name="camerasau" value="<?= $resultPrdEdit[0]['camerasau'] ?>" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Chip</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Chip" name="chip" value="<?= $resultPrdEdit[0]['chip'] ?>" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Ram</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="RAM" name="ram" value="<?= $resultPrdEdit[0]['ram'] ?>" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Pin</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="PIN" name="pin" value="<?= $resultPrdEdit[0]['pin'] ?>" required>
                </div>
            </div>
        <button class="btn btn-success mb-2" name="editProduct">Sửa</button>
        <a class="btn btn-warning  mb-2" href="./index.php?page=admin&manage=product">Trở lại</a>
    </form>
</div>