<?php
    $sqlCategory = "select * from menu where `url` = '". $_GET['product'] ."'";
    $resultCategory = executeSingleResult($sqlCategory);
    $id = isset($_GET['parent']) ? 'menu_parent' : 'menu_id';
    $sqlProduct = 'select * from products where '. $id .'=' . $resultCategory['menu_id'];
    $resultProduct = executeResult($sqlProduct);
?>
<div id="main">
    <div class="container">
        <div class="smart-phone mt-3">
            <div class="my-3 title-product title-color d-inline-block">
                <h4>
                    <a href="#" class="text-decoration-none header-color">
                        <?php echo $resultCategory['menu_name'];?>
                    </a>
                </h4>
            </div>
            <div class="col-content list-prodcut text-center d-flex flex-wrap justify-content-center">
                <?php
                    product($resultProduct);
                ?>
            </div>
        </div>
    </div>
</div>