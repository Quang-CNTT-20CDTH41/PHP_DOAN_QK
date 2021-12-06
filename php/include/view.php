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

    <!-- COMMENT -->
    <div class="border border-success rounded mt-3">
        <form action="" method="post">
            <div class="p-4 mt-1 my-5">
                <h4 class="header-text">Bình luận về <?php echo $result['product_name'] ?> - Chính hãng</h4>
                <div class="d-flex">
                    <div class="row">
                        <label for="start1" class="col-form-label font-size-20" id='label1'><i id="i1" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="1" name="star" id="start1">
                    </div>
                    <div class="row mx-1">
                        <label for="start2" class="col-form-label font-size-20"><i  id="i2" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="2" name="star" id="start2">
                    </div>
                    <div class="row">
                        <label for="start3" class="col-form-label font-size-20"><i  id="i3" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="3" name="star" id="start3">
                    </div>
                    <div class="row mx-1">
                        <label for="start4" class="col-form-label font-size-20"><i  id="i4" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="4" name="star" id="start4">
                    </div>
                    <div class="row">
                        <label for="start5" class="col-form-label font-size-20"><i  id="i5" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="5" name="star" id="start5">
                    </div>
                    <div class="row mx-2 pt-2">
                        <div class="header-text">Bạn đánh giá: <span id="text"></span></div>
                    </div>
                </div>
                <div class="row mt-1 px-2">
                    <textarea name="textarea" id="" cols="30" rows="10" class="form-control" placeholder="Nội dung tối thiểu 15 ký tự."></textarea>
                </div>
                <div class="row float-end my-3">
                    <button class="btn header-color text-white " name="comment"><i class="bi bi-send px-2"></i>Bình luận</button>
                </div>
                
            </div>
        </form>
        <div class="m-5" id="reviews">
            <h3 class="mb-3">Những đánh giá</h3>
            <?php
                $sqlShowView = 'select * from reviews where product_id = ' . $_GET['product_id']  . ' and reply_id = 0';
                $resultShowView = executeResult($sqlShowView);
                review($resultShowView);
            ?>
        </div>
    </div>
    <!-- !COMMENT -->

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
<script src="./js/star.js"></script>