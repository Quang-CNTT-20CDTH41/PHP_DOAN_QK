<div class="container">
    <div class="header-color rounded text-white">
        <div class="text-center">
            <h2>Giỏ hàng</h2>
        </div>
        <hr class="bg-white">
        <form action="" method="get">
        <table class="table table-hover table-bordered text-white title-color rounded">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody >
               
                <?php
                    if(isset($_SESSION['cart'])){
                        $cart = $_SESSION['cart'];
                        $output = '';
                        $tong = 0;
                        $index = 1;
                        foreach($cart as $item) {
                            $output .= '<tr>
                                    <td>'. $index++ .'</td>
                                    <td><img src="'. $item[1] .'" width="100px"></td>
                                    <td>'. $item[2] .'</td>
                                    <td>'. number_format($item[3]) .'</td>
                                    <td>'. $item[4] .'</td>
                                    <td>'. number_format($item[3] * $item[4]) .'</td>
                                    <td><a href="./index.php?page=show-cart&delete='. $item[0] .'" class="btn btn-danger">Xoá</a></td>
                                </tr>';
                                $tong +=  $item[3] * $item[4];
                        }
                        $output .= '<tr>
                                        <td colspan="5">Tổng tiền:</td>
                                        <td>'. number_format($tong) .'</td>
                                        <td><a href="./index.php?page=show-cart&clear" class="btn btn-danger">Xoá tất cả</a></td>
                                    </tr>';
                        echo $output;
                    }else{
                        echo '<tr>
                            <td colspan="7">Bạn chưa có sản phẩm nào.</td>
                            <a href="./index.php?search=" class="btn btn-warning m-2">Mua sản phẩm mới ngay.</a>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
        </form>
    </div>
</div>