<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng điện thoại</title>
    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- !BOOTSTRAP CSS-->

    <!-- STYLE -->
    <link rel="stylesheet" href="./css/style.css"/>
    <!-- !STYLE -->
    
    <!--  ICON BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--  !ICON BOOTSTRAP -->

    <!-- THEM OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- !THEM OWL CAROUSEL -->
</head>
<body>
    <!-- HEADER -->
    <section id="header">
        <!-- TOP NAVIGATION -->
        <div class="top-navigation">
            <div class="container header-color">
                <ul>
                    <li><a href="#">Bản mobile</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Sản phẩm đã xem</a></li>
                    <li><a href="#">Trung tâm bảo hành</a></li>
                    <li><a href="#">Hệ thống 78 siêu thị</a></li>
                    <li><a href="#">Tuyển dụng</a></li>
                    <li><a href="#">Tra cứu đơn hàng</a></li>
                    <?php
                        if(isset($_SESSION['info'])){
                            echo '<li><a href="./index.php?page=login&action=account&profile">Tài khoản: '. $_SESSION['info'][0] .'</a></li>
                            <li><a href="./index.php?page=login&dangxuat">Đăng xuất</a></li>';
                            if($_SESSION['info'][8] == 1){ 
                                $info = $_SESSION['info'];
                                echo '<li><a href="./index.php?page=admin" class="text-decoration-none text-white">Setting</a></li>';
                            }
                        }else{
                            echo '<li><a href="./index.php?page=login&action=dangnhap">Đăng nhập</a></li>
                            <li><a href="./index.php?page=login&action=dangky">Đăng ký</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- !TOP NAVIGATION -->

        <!-- HEADING -->
        <div class="heading text-center d-block py-2">
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <h1><a href="index.php" class="text-decoration-none header-text">SHOP MOBILE</a></h1>
                </div>
                <div class="search-box w-50">
                    <form action="" method="get">
                        <?php  $search = (isset($_GET['search'])) ?  $_GET['search'] : ''?>
                        <input type="search" class="w-100 p-2" placeholder="Tìm kiếm sản phẩm" name="search" value="<?= $search ?>">
                        <button type="submit" class="position-absolute"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <div class="order-tools d-flex">
                    <div class="item check-order header-color">
                        <a href="#" class="font-size-12 d-block">
                            <span class="icon"><i class="bi bi-truck font-size-20"></i></span>
                            <span class="text">Xem đơn hàng</span>
                        </a>
                    </div>
                    <div class="item cart p-2">
                        <a href="#" class="text-decoration-none text-white d-flex">
                            <i class="bi bi-cart-plus-fill font-size-20"></i>
                            <i class="bi bi-caret-left-fill font-size-20 text-warning"></i>
                            <span id="cart-total" class="bg-warning px-2">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- !HEADING -->

        <!-- NAVBAR -->
        <div id="stickytypeheader" class="container">
            <div class="navbar">
                <div class="container header-color rounded text-white">
                    <a class="nav-link text-white d-flex" href="index.php">
                        <h3>Trang chủ</h3>
                    </a>
                    <?php 
                        $query = executeResult('select * from menu');
                        recursiveMenu($query, 0, $newMenu, true);
                        echo str_replace('<ul></ul>','',$newMenu);
                    ?>
                </div>
            </div>
        </div>
        <!-- !NAVBAR -->
    </section>
    <!-- !HEADER -->