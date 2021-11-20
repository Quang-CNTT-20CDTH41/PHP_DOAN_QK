<div id="main">
    <div class="container">
    <div class="smart-phone mt-3">
        <div class="my-3 title-product title-color d-inline-block">
                <h4><a href="#" class="text-decoration-none header-color">Điện thoại</a></h3>
            </div>
            <div class="col-content list-prodcut text-center d-flex flex-wrap justify-content-center">
                <?php
                    $sqlProduct = 'select * from products where menu_id = 1';
                    $resultProduct = executeResult($sqlProduct);
                    product($resultProduct);
                ?>
            </div>
        </div>
    </div>
</div>