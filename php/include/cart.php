<div class="container">
    <div class="header-color rounded text-white">
        <div class="text-center">
            <h2>Giỏ hàng</h2>
        </div>
        <hr class="bg-white">
        <table class="table table-hover table-bordered text-white title-color rounded">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <th style="width: 100px;">Update</th>
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
                            $output .= '
                            <form action="" method="post">
                                <tr>
                                    <td>'. $index++ .'</td>
                                    <td><img src="'. $item[1] .'" width="100px"></td>
                                    <td>'. $item[2] .'</td>
                                    <td>'. number_format($item[3]) .'</td>
                                    <td style="width: 100px"><input type="number" class="form-control" value="'. $item[4].'" name="quantity"></td>
                                    <td>'. number_format($item[3] * $item[4]) .'</td> 
                                    <input type="hidden" value="'. $item[0] .'" name="idUpdate">
                                    <td><button class="btn btn-warning" style="width: 100px" name="update">Update</button></td>
                                    <td><a href="./index.php?page=show-cart&delete='. $item[0] .'" class="btn btn-danger">Delete</a></td>
                                </tr>
                            </form>';
                                $tong +=  $item[3] * $item[4];
                        }
                        $output .= '<tr>
                                        <td colspan="5">Tổng tiền:</td>
                                        <td>'. number_format($tong) .'</td>
                                        <td><a href="./index.php?page=cart&clear" class="btn btn-danger">Clearn</a></td>
                                        <td><a href="./index.php?page=show-cart&buying" class="btn bg-primary text-white" name="buying">Mua</a></td>
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
    </div>
</div>