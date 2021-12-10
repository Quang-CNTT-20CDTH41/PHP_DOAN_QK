<?php
    if(isset($_POST['love'])){
        if(isset($_GET['product_id']) && isset($_SESSION['info'])){
            $product_id = $_GET['product_id'];
            $sqlCheckLove = 'select * from love';
            $resultCheckLove = executeResult($sqlCheckLove);
            $kt = true;
            foreach($resultCheckLove as $item) {
                if($item['account_id'] == $_SESSION['info'][9] && $item['product_id'] == $product_id){
                    $kt = false;
                    break;
                }
            }

            if($kt == true){
                $sqlLove = 'insert into love(product_id, account_id) value("'. $product_id .'", "'. $_SESSION['info'][9] .'")';
                echo '<script>alert("Bạn đã yêu thích sản phẩm!");</script>';
            }else if($kt == false){
                $sqlLove = 'delete from love where product_id = ' . $product_id . ' and account_id = ' . $_SESSION['info'][9];
                echo '<script>alert("Bạn đã bỏ yêu thích sản phẩm!");</script>';
            }
            execute($sqlLove);
        }else{
            echo '<script>alert("Vui lòng đăng nhập!");</script>';
        }
    }

    $sqlShowLove = 'select count(quantity) as soluong from love where product_id = ' .  $_GET['product_id'];
    $resultShowLove =  executeSingleResult($sqlShowLove);

    function showLove() {
        $sql = 'select * from love';
        $result = executeResult($sql);
        $ktShow = false;
        if(isset($_SESSION['info'])){
            foreach($result as $item){
                if($item['account_id'] == $_SESSION['info'][9] && $item['product_id'] == $_GET['product_id']){
                   $ktShow = true; break;
                }
            }
        }
        if($ktShow){
            return '<i class="bi bi-heart-fill font-size-20 pt-4 text-danger"></i>';
        }else{
            return '<i class="bi bi-heart font-size-20 pt-4"></i>';
        }
    }
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
                    <?php
                        if(isset($_GET['page']) == 'view' && isset($_GET['product_id'])){
                            $id = (int) $_GET['product_id'];
                            $sqlView = 'select * from products inner join info where products.product_id = info.product_id and info.product_id = '. $id;
                            $resultView = executeSingleResult($sqlView);
                            if($resultView != null){
                                echo '<div class="row">
                                <div class="col-md-4 bg-white rounded border"  style="line-height: 470px;">
                                    <img sty src="'. $resultView['product_img'] .'" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <div class="card border-secondary">
                                        <div class="card-header">
                                            <h2 class="card-title">
                                                ' .$resultView['product_name'] .'
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
                                                                    <td>' .$resultView['display'] . '</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-weight: bold">Camera sau:</td>
                                                                    <td>' .$resultView['camerasau'] . '</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-weight: bold">Camera sau:</td>
                                                                    <td>' .$resultView['cameratruoc'] . '</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-weight: bold">Chip:</td>
                                                                    <td>' .$resultView['chip'] . '</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td style="font-weight: bold">RAM, ROM:</td>
                                                                    <td>' .$resultView['ram'] . '</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-weight: bold">Pin, Sạc:</td>
                                                                    <td>' .$resultView['pin'] . '</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="font-size-20 fw-bold text-danger">
                                                            '. number_format($resultView['product_price']) .' VNĐ
                                                        </span>
                                                        <del class="text-muted px-2">
                                                        '. number_format($resultView['price_sale']) .' VNĐ</del>
                                                        <form action="" method="post" class="float-end px-5">
                                                            <button class="border-0 bg-white" name="love">'.  showLove() .'</button>
                                                            <span>'.  $resultShowLove['soluong'] .' yêu thích</span>
                                                        </form>
                                                    </div> 
                                                    <div class="col-md-12">
                                                    <a  href="./index.php?page=cart&id='. $resultView['product_id'] .'" 
                                                    class="btn text-white add-to-cart" style="background-color: #00483d;margin-top:5px">Thêm vào giỏ hàng
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }else{
                                echo 'Sản phẩm không tồn tại';
                                require './php/include/footer.php';
                                die();
                            }
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- !ALL PRODUCT -->

    <!-- COMMENT -->
    <div class="border border-success rounded mt-3">
        <form action="" method="post">
            <div class="p-4 mt-1 my-5">
                <h4 class="header-text">Bình luận về <?php echo $resultView['product_name'] ?> - Chính hãng</h4>
                <div class="d-flex">
                    <div class="row">
                        <label for="start1" class="col-form-label font-size-20 sao"><i id="i1" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="1" name="star" id="start1">
                    </div>
                    <div class="row mx-1">
                        <label for="start2" class="col-form-label font-size-20 sao"><i  id="i2" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="2" name="star" id="start2">
                    </div>
                    <div class="row">
                        <label for="start3" class="col-form-label font-size-20 sao"><i  id="i3" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="3" name="star" id="start3">
                    </div>
                    <div class="row mx-1">
                        <label for="start4" class="col-form-label font-size-20 sao"><i  id="i4" class="bi bi-star"></i></label>
                        <input type="radio" class="d-none" value="4" name="star" id="start4">
                    </div>
                    <div class="row">
                        <label for="start5" class="col-form-label font-size-20 sao"><i  id="i5" class="bi bi-star"></i></label>
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
    

</section> -->
<script src="./js/star.js"></script>
