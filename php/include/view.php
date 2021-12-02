<?php
    if(isset($_GET['product_id'] ) &&  isset($_GET['page']) == 'view'){
    $id = $_GET['product_id'] ;
    }
    $sql = "select * from products where `product_id` = ".$id;
    $sql1 = "select * from info where `product_id` = ".$id;
    $result = executeSingleResult($sql);
    $resultView = executeSingleResult($sql1);
?>
<section id="main">
    <div class="container">
        <!-- ALL PRODUCT -->
        <div class="all-product mt-3">
            <div class="my-3 title-product title-color d-inline-block">
                <h4><a class="text-decoration-none header-color">Chi Tiết Sản Phẩm</a></h4>
            </div>
            <div class="col-content list-prodcut text-center d-flex flex-wrap justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 bg-white rounded border"  style="line-height: 470px;">
                            <img sty src="<?php echo $result['product_img'] ?>" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card border-secondary">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        <?php echo $result['product_name'] ?>
                                    </h2>
                                </div>
                                <div class="card-body text-center">
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <b class="text-dark">Thời gian bảo hành : </b> 1 năm
                                                <table style="margin-top: 13px" class="table table-striped table-bordered table-hover">
                                                    <tbody>
                                                   
                                                    <tr>
                                                        <td style="font-weight: bold;width: 50%">Màn hình:</td>
                                                        <td><?php echo $resultView['display'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Camera sau:</td>
                                                        <td><?php echo $resultView['camerasau'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Camera sau:</td>
                                                        <td><?php echo $resultView['cameratruoc'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Chip:</td>
                                                        <td><?php echo $resultView['chip'];?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="font-weight: bold">RAM, ROM:</td>
                                                        <td><?php echo $resultView['ram'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Pin, Sạc:</td>
                                                        <td><?php echo $resultView['pin'];?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <span style="font-size: 20px;font-weight: bold;color: red">
                                                    <?php  echo number_format($result['product_price']);?> VNĐ
                                                </span>
                                                <span style="text-decoration: line-through;padding-left: 10px" class="text-muted">
                                                <?php echo number_format($result['price_sale']);?> VNĐ</span>
                                            </div> 
                                            <div class="col-md-12">
                                            <a  href="./index.php?page=cart&id=<?php echo $result['product_id']?>" 
                                            class="btn text-white add-to-cart" style="background-color: #00483d;margin-top:5px">Mua Sản Phẩm
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- !ALL PRODUCT -->

    <!-- WATCH -->
    <div class="apple-watch mt-3">
        <div class="my-3 title-product title-color d-inline-block">
            <h4><a href="#" class="text-decoration-none header-color">Có thể bạn thích.</a></h3>
        </div>
        <div class="content bg-white">
            <div class="owl-carousel owl-theme py-2">
                <?php
                    $sqlFlas = 'select * from products where menu_id = 4 and price_sale > 0';
                    $resultFlas = executeResult($sqlFlas);
                    singleProduct($resultFlas);
                ?>
            </div>
        </div>
    </div>
    <!-- ! WATCH -->

    </div>
    

</section>