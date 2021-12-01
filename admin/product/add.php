<div class="header-color text-white py-3">
    <div class="row">
        <div class="col-sm-2">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lựa Chọn Loại
                </button>
                <div class="dropdown-menu">
                    <?php
                        $sqlType = 'select * from menu where parent = 0';
                        $resultType = executeResult($sqlType);
                        foreach ($resultType as $item) {
                            echo '<a class="dropdown-item" href="index.php?page=admin&manage=addProdcut&type=' . $item['menu_id'] . '">' . $item['menu_name'] . '</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-1">  
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lựa Chọn Hãng
                </button>
                <div class="dropdown-menu">
                    <?php
                        if(isset($_GET['type'])){
                            $type = $_GET['type'];

                            $sqlParent = 'select * from menu where parent = ' . $type;
                            $resultParent = executeResult($sqlParent);

                            foreach ($resultParent as $item) {
                                echo '<a class="dropdown-item" href="index.php?page=admin&manage=addProdcut&type=' . $_GET['type'] . '&id='. $item['menu_id'] .'">' . $item['menu_name'] . '</a>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <?php
        if(isset($_GET['type'])){
            $sqlTypea = 'select * from menu where `menu_id` = "' . $_GET['type'] . '"'; 
            $a = executeSingleResult($sqlTypea);
            echo 'Bạn đang chọn Loại: ' . $a['menu_name'];
            echo '<br>';
            if(isset($_GET['id'])){
                $sqlTypeb = 'select * from menu where `menu_id` = "' . $_GET['id'] . '"'; 
                $b = executeSingleResult($sqlTypeb);
                echo 'Bạn đang hãng: ' . $b['menu_name'];
            }
        }
        ?>
    </div>
   
    <div class=" <?php if(isset($_GET['type']) && isset($_GET['id'])) { echo 'd-block';} else echo 'd-none'; ?>">
        <form action="" method="post" class="mx-5" enctype="multipart/form-data">
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Tên sản phẩm</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩn" name="prdName">
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Giá sản phẩm</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" placeholder="Nhập giá sản phẩn" name="price">
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Giảm giá</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" placeholder="Nhập giá giảm giá" name="priceSale">
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Mô tả</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nhập mô tả" name="descript">
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Hình ảnh</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="image"  placeholder="Nhập mô tả" name="image">
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Màn hình</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nhập mô tả" name="display" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Camera Trước</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Camera trước" name="cameratruoc" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Camera Sau</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Camera sau" name="camerasau" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Chip</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Chip" name="chip" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Ram</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="RAM" name="ram" required>
                </div>
            </div>
            <div class="row py-2">
                <label for="" class="col-form-label col-sm-2">Pin</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="PIN" name="pin" required>
                </div>
            </div>
            <button class="btn btn-success mb-2" name="addProduct">Thêm</button>
        </form>
    </div>
</div>