<?php
function search ($sqlSearch) {
        $resultSearch = executeResult($sqlSearch);
        if($resultSearch != null){
            product($resultSearch);
        }else{
            echo 'Không tìm thấy sản phẩm phù hợp';
        }
    }
?>
<div id="main">
    <div class="container">
        <div class="all-product mt-3">
            <div class="my-3 title-product title-color d-inline-block">
                <h4><a href="#" class="text-decoration-none header-color">Tất cả sản phẩm</a></h3>
            </div>
            <div class="col-content list-prodcut text-center d-flex flex-wrap justify-content-center">
                <?php
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $sqlSearch = 'select * from products where product_name like "%'. $search .'%"';
                        $resuslt = search($sqlSearch);
                    }
                ?>
            </div>
        </div>
    </div>
</div>