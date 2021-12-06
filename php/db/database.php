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

// CART

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
                    $cart[$i][5] = $resultCart['product_id'];
                }
            } else {
                $cart = array(array());
                $cart[0][0] = 1;
                $cart[0][1] = $resultCart['product_img'];
                $cart[0][2] = $resultCart['product_name'];
                $price = ($resultCart['price_sale'] != 0) ? $resultCart['price_sale'] : $resultCart['product_price'];
                $cart[0][3] = $price ;
                $cart[0][4] = 1;
                $cart[0][5] =  $resultCart['product_id'];
            }
            echo '<script>alert("Mua sản phẩm thành công");</script>';
            $_SESSION['cart'] = $cart;
        }
    }

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        unset($_SESSION['cart'][$delete-1]);
    }

    if(isset($_POST['update'])){
        $update = $_POST['idUpdate'];
        $number =  $_POST['quantity'];
        for($i = 0; $i < count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i][0] == $update){
                $_SESSION['cart'][$i][4] = $number;
            }
        }
    }

    if(isset($_GET['clear'])){
        unset($_SESSION['cart']);
    }
}

// BUYING

if(isset($_GET['buying'])){
    if(isset($_SESSION['cart']) && isset($_SESSION['info'])){
        $account_id = $_SESSION['info'][9];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        for($i = 0; $i < count($_SESSION['cart']); $i++){
            $sqlBuying = 'insert into buying(account_id,  product_id, quantity, time) value("'. (int) $account_id .'", "'. (int) $_SESSION['cart'][$i][5] .'", "'. (int) $_SESSION['cart'][$i][4] .'", "'. $date .'")';
            execute($sqlBuying);
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Cám ơn bạn đã mua hàng.");</script>';
    }
}

// COMMENT

if(isset($_POST['comment'])){
    if(isset($_POST['star']) && isset($_POST['textarea']) && isset($_SESSION['info'])){
        $star = $_POST['star'];
        $textarea = $_POST['textarea'];
        $product_id = $_GET['product_id'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $sqlReview = 'insert into reviews(review_name, time, comment, star, product_id) value("'. $_SESSION['info'][0] .'", "'. $date .'", "'. $textarea .'", "'. $star .'", "'. $product_id .'")';
        execute($sqlReview);
        echo '<script>alert("Bình luận thành công!.");</script>';
    }
}

if(isset($_POST['reply'])){
    if(isset($_POST['textReply']) && isset($_POST['reply_id'])){
        $textReply = $_POST['textReply'];
        $reply_id = $_POST['reply_id'];
        $product_id = $_GET['product_id'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $sqlReply = 'insert into reviews(review_name, time, comment, reply_id, product_id) value("'. $_SESSION['info'][0] .'", "'. $date .'", "'. $textReply .'", "'. $reply_id .'", "'. $product_id .'")';
        execute($sqlReply);
    }
}

function review($sql) {
    $reviewText = '';
    foreach($sql as $item){
        $reviewText .= '<div class="row mt-3">
                <div class="mx-4 d-flex">
                    <img src="./images/account/avt.png" alt="" width="5%" class="avt rounded-circle">
                    <h5 class="mx-2">'. $item["review_name"] .'</h5>';
                    while($item["star"] > 0){
                        $reviewText .=  '<span><i class="bi bi-star-fill yellow mt-1"></i></span>';
                        $item["star"]--;
                    }

                    $reviewText .= '<span class="position-absolute m-4 mx-5 px-3">'. $item["time"] .'</span>
                </div>
                <div class="mx-5 px-5"><span class="header-text fw-bold">'. $item["comment"] .'</span></div>
                <div class="mx-5 px-5 row">
                    <label class="px-5 fw-bold" id="reply">Trả lời
                        <form action="" method="post">
                            <input type="checkbox" id="checkbox" class="d-none">
                            <div class="textComment">
                                    <input type="text" class="form-control mt-3" placeholder="Trả lời bình luận" name="textReply">
                                    <input type="hidden" name="reply_id" value="'. $item["reviews_id"] .'">
                                    <button class="btn title-color mt-3 text-white float-end" name="reply">Trả lời</button>
                            </div>
                        </form>
                    </label>
                    <div class="row mt-3">';
                   
                    $sqlReply = 'select * from reviews where reply_id = '. $item["reviews_id"];
                    $resultReply = executeResult($sqlReply);
                    foreach($resultReply as $item){
                        $reviewText .= ' <div class="mx-4 d-flex mt-3">
                        <img src="./images/account/avt.png" alt="" width="5%" class="avt rounded-circle">
                        <h5 class="mx-2">'. $item["review_name"] .'</h5>
                        <span class="position-absolute m-4 mx-5 px-3">'. $item["time"] .'</span>
                            </div>
                    <div class="mx-5 px-5"><span class="header-text fw-bold">'. $item["comment"] .'</span></div>';
                    }
                $reviewText .= ' 
            </div>
        </div>
    </div>';
    }
    echo $reviewText ;
}