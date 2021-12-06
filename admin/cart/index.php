<table class="table table-hover table-bordered title-color text-white">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Xác nhận</th>
        </tr>
    </thead>
    <tbody class="text-white">
        <?php 
            $sqlShowbuy = 'SELECT DISTINCT account_id  FROM `buying` ';
            $resultShowbuy = executeResult($sqlShowbuy);
            $stt = 1;
            foreach($resultShowbuy as $item){
                $sqlAccountBuy = 'select * from user where user_id = ' . $item['account_id'];
                $resultAccountBuy = executeResult($sqlAccountBuy);
                foreach($resultAccountBuy as $account){
                    echo '
                    <form action="" method="post">
                        <tr class="text-warning fw-bold">
                            <td>'. $stt++ .'</td>
                            <td>'. $account['hoten'].'</td>
                            <td>'. $account['address'].'</td>
                            <td>'. $account['phone'].'</td>
                            <input type="hidden" name="account" value="'. $account['user_id'].'">
                            <td><button class="btn bg-warning" name="delivery">Đã giao</button></td>
                        </tr>
                    </form>';
                    echo '
                    <tr class="text-black">
                        <th></th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Thời gian mua</th>
                        <th></th>
                    </tr>';
                        
                    $sqlCartBuy = 'select *  from buying where account_id = ' . $account['user_id'];
                    $resultCartBuy = executeResult($sqlCartBuy);
                    foreach($resultCartBuy as $item){
                        $sqlProductBuy = 'select * from products where product_id = ' . $item['product_id'];
                        $resultProductBuy = executeResult($sqlProductBuy);
                        foreach($resultProductBuy as $product){
                            echo '
                            <tr>
                                <td></td>
                                <td>'. $product['product_name'].'</td>
                                <td>'. $item['quantity'].'</td>
                                <td>'. $item['time'].'</td>
                            </tr>';
                        };
                    }
                }
                
            }
        ?>
    </tbody>
</table>