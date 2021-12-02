<?php

function execute($sql)
{
    require 'connect.php';
    mysqli_query($con, $sql);
    require 'close.php';
}

function executeResult($sql)
{
    require 'connect.php';
    $result = mysqli_query($con, $sql);
    $data = [];
    while ($row = mysqli_fetch_array($result, 1)) {
        $data[] = $row;
    }
    require 'close.php';
    return $data;
}

function executeSingleResult($sql)
{
    require 'connect.php';
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, 1);
    require 'close.php';
    return $row;
}

// MENU
function recursiveMenu($sourceArr, $parent = 0, &$newMenu, $sub = true)
{
    if (count($sourceArr) > 0) {
        $newMenu .= $sub ? '<ul class="nav menu">' : '<ul>';
        foreach ($sourceArr as $key => $value) {
            if ($value['parent'] == $parent) {
                $product = ($parent == 0) ? $value['url']  :   $value['url'] . '&parent';
                $newMenu .= '<li class="nav-item"><a href="index.php?page=product&product=' . $product . '" class="nav-link">' . $value['icon_menu'] . '<span>' . $value['menu_name'] . '</span></a>';
                $newParent = $value['menu_id'];
                unset($sourceArr[$key]);
                recursiveMenu($sourceArr, $newParent, $newMenu, $sub = false);
            }
        }
        $newMenu .= '</ul>';
    }
}

function product($sql)
{
    foreach ($sql as $item) {
        echo '
        <div class="item bg-white py-4 px-1">
            <div class="img py-2">
                <a href="./index.php?page=view&product_id='.$item['product_id'].'"><img src="' . $item['product_img'] . '" alt="" ></a>
            </div>
            <div class="info  py-1">
                <a href="./index.php?page=view&product_id='.$item['product_id'].'" class="text-decoration-none text-black fw-bold">' . $item['product_name'] . '</a>
            <div class="price">
                <span class="text-danger fw-bold">' . number_format($item['product_price']) . ' VNĐ</span>
                <del class="font-size-14">' . number_format($item['price_sale']) . ' VNĐ</del>
            </div>
            </div>
            <div class="note py-1">
                <span>' . $item['descript'] . '</span>
            </div>
            <div class="header-color p-1 w-75 m-auto rounded">
                <a href="./index.php?page=view&product_id='.$item['product_id'].'" class="text-decoration-none  text-white" >Xem sản phẩm</a>
            </div>
        </div>';
    }
}

// <a href="./index.php?page=product&id='.$item['product_id'].'" class="text-decoration-none  text-white" >Xem sản phẩm</a>

function singleProduct($sql)
{
    foreach ($sql as $item) {
        echo '<div class="item">
            <div class="product">
                <div style="height: 235px;"><a href="./index.php?page=view&product_id='.$item['product_id'].'"><img src="' . $item['product_img'] . '"></a></div>
                <div class="text-center mt-2">
                    <h6>' . $item['product_name'] . '</h6>
                    <div class="rating text-warning">
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-half"></i></span>
                        <span><i class="bi bi-star"></i></span>
                    </div>
                    <div class="price">
                        <span class="fw-bold">' . number_format($item['product_price']) . ' VNĐ</span>
                    </div>
                    <div class="old-price text-danger">
                        <del>' . number_format($item['price_sale']) . ' VND</del>
                    </div>
                    <div class="header-color p-1 w-75 m-auto rounded">
                        <a href="./index.php?page=cart&id='.$item['product_id'].'" class="text-decoration-none  text-white" >Mua Sản Phẩm</a>
                    </div>
                </div>
            </div>
        </div>';
    }
}

if(isset($_GET['page'])){
    if($_GET['page'] == 'cart' && isset($_GET['id'])){
        $CartId = $_GET['id'];
        $sqlCart = 'select * from `products` where product_id = "' . $CartId . '"';
        $resultCart = executeSingleResult($sqlCart);
        if($resultCart > 0){
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                $i = count($cart);
    
                $pos = -1;
    
                for($j = 0; $j < $i; $j++){
                    if($cart[$j][2] == $resultCart['product_name']){
                        $pos = $j; break;
                    }
                }
    
                if($pos != -1){
                    $cart[$pos][4]++;
                }else{
                    $cart[$i][0] = $i + 1;
                    $cart[$i][1] = $resultCart['product_img'];
                    $cart[$i][2] = $resultCart['product_name'];
                    $price = ($resultCart['price_sale'] != 0) ? $resultCart['price_sale'] : $resultCart['product_price'];
                    $cart[$i][3] = $price ;
                    $cart[$i][4] = 1;
                }
            } else {
                $cart = array(array());
                $cart[0][0] = 1;
                $cart[0][1] = $resultCart['product_img'];
                $cart[0][2] = $resultCart['product_name'];
                $price = ($resultCart['price_sale'] != 0) ? $resultCart['price_sale'] : $resultCart['product_price'];
                $cart[0][3] = $price ;
                $cart[0][4] = 1;
            }
            echo '<script>alert("Mua sản phẩm thành công");</script>';
            $_SESSION['cart'] = $cart;
        }
    }

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        unset($_SESSION['cart'][$delete-1]);
    }

    if(isset($_GET['clear'])){
        session_destroy();
        unset($_SESSION['cart']);
    }
}