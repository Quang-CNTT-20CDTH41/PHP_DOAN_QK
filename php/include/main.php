
    <!-- MAIN -->
    <section id="main">
        <div class="container">
            <!-- SLIDER -->
            <div id="carouselExampleIndicators" class="carousel slide  mt-3 " data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./images/banner/banner-1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./images/banner/banner-2.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./images/banner/banner-3.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./images/banner/banner-4.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-black rounded-circle" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-black rounded-circle" aria-hidden="true"></span>
                </a>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3"><a href="#"><img src="./images/banner/san-pham-1.png" alt=""></a></div>
                <div class="col-sm-3"><a href="#"><img src="./images/banner/san-pham-2.png" alt=""></a></div>
                <div class="col-sm-3"><a href="#"><img src="./images/banner/san-pham-3.png" alt=""></a></div>
                <div class="col-sm-3"><a href="#"><img src="./images/banner/san-pham-4.png" alt=""></a></div>
            </div>
            <!-- !SLIDER -->

            <!-- FASH SALE -->
            <div class="flash-sale mt-3 ">
                <h2 class="text-danger font-anton">F<i class="bi bi-lightning-fill"></i>ASH SALE ONLINE</h2>
                <div class="content bg-white">
                    <div class="owl-carousel owl-theme  p-3">
                        <?php
                            $sqlFlas = 'select * from products where menu_id = 2 and price_sale > 0';
                            $resultFlas = executeResult($sqlFlas);
                            singleProduct($resultFlas);
                        ?>
                    </div>
                </div>
            </div>
            <!-- !FASH SALE -->

            <!-- BANNER -->
            <div class="banner mt-3">
                <div class="row">
                    <a href="#"><img src="./images/banner/bn-1.jpg" alt="" class="w-100"></a>
                </div>
                <div class="row">
                    <a href="#"><img src="./images/banner/bn-2.jpg" alt="" class="w-100"></a>
                </div>
            </div>
            <!-- !BANNER -->

            <!-- ĐIỆN THOẠI -->
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
            <!-- !ĐIỆN THOẠI -->

            <!-- BANNER -->
            <div class="banner mt-3">
                <div class="row">
                    <a href="#"><img src="./images/banner/iphone-13-series-pre-23423423.jpg" alt="" class="w-100"></a>
                </div>
                <div class="row">
                    <a href="#"><img src="./images/banner/galaxy-a52s-1200x200_637713772132991101.jpg" alt="" class="w-100"></a>
                </div>
            </div>
            <!-- !BANNER -->

            <!-- WATCH -->
            <div class="apple-watch mt-3">
                <div class="my-3 title-product title-color d-inline-block">
                    <h4><a href="#" class="text-decoration-none header-color">Apple Watch</a></h3>
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
            
            <!-- BANNER -->
            <div class="banner mt-4">
                <div class="row">
                    <a href="#"><img src="./images/banner/s21-moi-03.jpg" alt="" class="w-100"></a>
                </div>
            </div>
            <!-- !BANNER -->
           
            <!-- LAPTOP -->
            <div class="latop mt-3">
                <div class="my-3 title-product title-color d-inline-block">
                    <h4><a href="#" class="text-decoration-none header-color">Laptop</a></h3>
                </div>
                <div class="content bg-white">
                    <div class="owl-carousel owl-theme py-3">
                        <?php
                            $sqlFlas = 'select * from products where menu_id = 3 and price_sale > 0';
                            $resultFlas = executeResult($sqlFlas);
                            singleProduct($resultFlas);
                        ?>
                    </div>
                </div>
            </div>
            <!-- !LAPTOP -->
           
            <!-- ACCESSORY -->
            <div class="accessory mt-3">
                <div class="my-3 title-product title-color d-inline-block">
                    <h4><a href="#" class="text-decoration-none header-color">Phụ kiện</a></h3>
                </div>
                <div class="content bg-white">
                    <ul class="d-flex">
                        <?php
                            $sqlAccess = 'select * from accessory';
                            $resultAccess = executeResult($sqlAccess);
                            foreach($resultAccess as $item){
                                echo '
                                <li>
                                    <a href="'. $item['accessory_url'] .'">
                                        <span><img src="'. $item['accessory_img'] .'" alt=""></span>
                                        <label>'. $item['accessory_name'] .'</label>
                                    </a>
                                </li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- !ACCESSORY -->

            <!-- COVERVALUE -->
            <div class="covervalue d-flex mt-5 justify-content-between  px-5">
                <div class="item">
                    <div class="icon"><i class="bi bi-check-circle"></i></div>
                    <div class="text">
                        <span>Sản phẩm</span>
                        <strong>CHÍNH HÃNG</strong>
                    </div>
                </div>
                <div class="item">
                    <div class="icon"><i class="bi bi-cart-check"></i></div>
                    <div class="text">
                        <span>Miễn phí vận chuyển</span>
                        <strong>TOÀN QUỐC</strong>
                    </div>
                </div>
                <div class="item">
                    <div class="icon"><i class="bi bi-headset"></i></div>
                    <div class="text">
                        <span>Hotline hỗ trợ</span>
                        <strong>1900.2091</strong>
                    </div>
                </div>
                <div class="item">
                    <div class="icon"><i class="bi bi-arrow-repeat"></i></div>
                    <div class="text">
                        <span>Thủ tục đổi trả</span>
                        <strong>DỄ HÀNG</strong>
                    </div>
                </div>
            </div>
            <!-- !COVERVALUE -->

            <!-- SUBSCRIPT -->
            <div class="subscript d-flex jsutify-content-between">
                <div class="icon-text d-flex my-3">
                    <img src="./images/accessory/sub-logo.png" alt="">
                    <div class="text text-center">
                        <h4>Đăng ký nhận tin</h4>
                        <p>Đăng ký để nhận những chương trình khuyến mại hot nhất của Hoàng Hà Mobile</p>
                    </div>
                </div>
                <form action="" method="get">
                    <div class="input mx-5">
                        <input type="email" name="" id="" placeholder="Nhập E-mail của bạn">
                        <button type="submit"><i class="bi bi-send-fill"></i></button>
                    </div>
                </form>
            </div>
            <!-- !SUBSCRIPT -->
        </div>
    </section>
    <!-- !MAIN -->