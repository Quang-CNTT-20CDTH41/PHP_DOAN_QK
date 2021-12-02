<?php
?>
<div id="main">
    <div class="container">
        <div class="all-product mt-3">
            <div class="my-3 title-product title-color d-inline-block">
                <h4><a href="" class="text-decoration-none header-color">Toàn bộ sản phẩm</a></h3>
            </div>

            <div class="sort d-flex">
                <div class="m-3 w-100">
                    <form action="" method="post" class="d-flex">
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="sort" id="" class="form-select rounded-0">
                                    <option value="asc">Giá tăng dần</option>
                                    <option value="desc">Giá giảm dần</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="sort_price" id="" class="form-select rounded-0">
                                    <option value="5000000">Dưới 5.000.000 VNĐ</option>
                                    <option value="10000000">5.000.000 - 100.000.000 VNĐ</option>
                                    <option value="20000000">100.000.000 - 20.000.000 VNĐ</option>
                                    <option value="20000001">Trên 20.000.000 VNĐ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn title-color text-white rounded-0">Lọc</button>
                        </div>
                    </form>
                </div>
            </div> 

            <div class="col-content list-prodcut text-center d-flex flex-wrap justify-content-center">
                <?php
                    if(isset($_POST['sort']) && isset($_POST['sort_price']) && isset($_POST['sort'])){
                        $sort = $_POST['sort'];
                        $sort_price = $_POST['sort_price'];
                        switch($sort_price){
                            case 5000000:
                                $price = 'product_price < 5000000';
                                break;
                            case 10000000:
                                $price = 'product_price < ' . $sort_price . ' and product_price > 5000000';
                                break;
                            case 20000000:
                                $price = 'product_price < ' . $sort_price . ' and product_price > 10000000';
                                break;
                            case 20000001:
                                $price = 'product_price > ' . $sort_price;
                                break;
                        }
                        $sqlShow = 'select * from products where '. $price .' order by `product_price` ' . $sort;
                        echo '<script>alert("Lọc thành công!.");</script>';
                    }else{
                        $sqlShow = 'select * from products';
                    }
                    $resultShow = executeResult($sqlShow);
                    product($resultShow);
                ?>
            </div>
        </div>

        <!-- CÓ THỂ BẠN THÍCH -->
        <div class="mt-3">
                <div class="my-3 title-product title-color d-inline-block">
                    <h4><a href="#" class="text-decoration-none header-color">CÓ THỂ BẠN THÍCH </a></h3>
                </div>
                <div class="content bg-white">
                    <div class="owl-carousel owl-theme py-2">
                        <?php
                            $sqlFlas = 'select * from products where price_sale > 0 order by rand() limit 10;';
                            $resultFlas = executeResult($sqlFlas);
                            singleProduct($resultFlas);
                        ?>
                    </div>
                </div>
            </div>
        <!-- CÓ THỂ BẠN THÍCH -->
    </div>
</div>