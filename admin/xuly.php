<?php
$prdName = $price = $priceSale = $descript = $image = $selectType = $selectCategory = '';

function adminProduct($product)
{
    $id = 1;
    foreach ($product as $item) {
        echo '<tr>
                <td>' . $id++ . '</td>
                <td>' . $item['product_name'] . '</td>
                <td>' . $item['product_price'] . '</td>
                <td>' . $item['price_sale'] . '</td>
                <td>' . $item['descript'] . '</td>
                <td><img src="' . $item['product_img'] . '" width="40px"></td>
                <td>' . $item['menu_name'] . '</td>
                <td><a href="./index.php?page=admin&manage=editProdcut&id=' . $item['product_id'] . '"><button class="btn btn-warning">Edit</button></a></td>
                <td><a href="./index.php?page=admin&manage=product&delete=' . $item['product_id'] . '"><button class="btn btn-danger">Delete</button></a></td>
        </tr>';
    }
}

if(isset($_GET['delete'])  && $_GET['manage'] == 'product'){
    $deletePrd = $_GET['delete'];
    $sqlDelete = 'delete from products where product_id = ' . $deletePrd;
    execute($sqlDelete);

    $sqlDeleteInfo = 'delete from info where product_id = ' . $deletePrd;
    execute($sqlDeleteInfo);
}

if(isset($_POST['addProduct'])){
    if(isset($_POST['prdName']) && isset($_POST['price']) && isset($_POST['priceSale']) && isset($_FILES['image']['name']) && isset($_POST['descript'])){
        $prdName = $_POST['prdName'];

        $price = $_POST['price'];
 
        $priceSale = $_POST['priceSale'];
 
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $descript = $_POST['descript'];

        $sqlParentId = 'select url from menu where menu_id = "'. $_GET['id'] .'"';
        $resultParentId = executeSingleResult($sqlParentId);

        $sqlMenuid = 'select url from menu where menu_id = "'. $_GET['type'] .'"';
        $resultMenuid = executeSingleResult($sqlMenuid);

        $dir = 'images/product/'. $resultMenuid['url'] .'/'. $resultParentId['url'];
        
        if(!file_exists($dir)){
            mkdir($dir);
        }

        $urlImg = './images/product/'. $resultMenuid['url'] .'/'. $resultParentId['url'] .'/'.$image;
        $sqlAddPrd = 'insert into products (product_name, product_price, price_sale, descript, product_img, menu_id, menu_parent) value ("'. $prdName .'","'. $price .'","'. $priceSale .'","'. $descript .'","'.  $urlImg .'",'. $_GET['type'] .','. $_GET['id'] .')'; 

        $resultAdd = execute($sqlAddPrd);
        move_uploaded_file($image_tmp, $urlImg);

        if(isset($_POST['display']) && isset($_POST['cameratruoc']) && isset($_POST['camerasau']) && isset($_POST['ram']) && isset($_POST['chip']) && isset($_POST['pin'])){
            $display = $_POST['display'];
            $cameratruoc = $_POST['cameratruoc'];
            $camerasau = $_POST['camerasau'];
            $chip = $_POST['chip'];
            $ram = $_POST['ram'];
            $pin = $_POST['pin'];
            $sqlShowInfo = 'select product_id from products where product_name = "' . $prdName . '"';
            $resultShowInfo = executeSingleResult($sqlShowInfo);
            $sqlInfo = "insert into info (display, camerasau, cameratruoc, chip, ram, pin, product_id) value('". $display ."','". $camerasau ."','". $cameratruoc ."','". $chip ."','". $ram ."','". $pin ."','". $resultShowInfo["product_id"] ."')";
            execute($sqlInfo);
            echo '<script>alert("Thêm thành công!.");</script>';
        }
    }
}

function adminUser($user)
{
    $id = 1;
    foreach ($user as $item) {
        $chucvu = ($item['level'] == 1) ? 'Quản lý' : 'Khách hàng';
        echo '<tr>
            <td>' . $id++ . '</td>
            <td>' . $item['hoten'] . '</td>
            <td>' . $item['gender'] . '</td>
            <td>' . $item['user_name'] . '</td>
            <td>' . $item['birthday'] . '</td>
            <td>' . $item['address'] . '</td>
            <td>' . $item['email'] . '</td>
            <td>' . $item['phone'] . '</td>
            <td>' . $chucvu . '</td>
            <td><a href="./index.php?page=admin&manage=member&edit=' . $item['user_id'] . '"><button class="btn btn-warning editAccount" id="">Sửa</button></a></td>
            <td><a href="./index.php?page=admin&manage=member&delete=' . $item['user_id'] . '"><button class="btn btn-danger">Xoá</button></a></td>
        </tr>';
    }
}

if(isset($_GET['delete']) && $_GET['manage'] == 'member'){
    $id = $_GET['delete'];
    $sqlDelete = 'delete from user where user_id = "'. $id .'"';
    execute($sqlDelete);
}

if(isset($_POST['changelevel'])){
    if(isset($_GET['edit']) && isset($_POST['level']) ){
        $userId = $_GET['edit'];
        $level = $_POST['level'];
        echo '<script>alert("Sửa sản phẩm thành công!");</script>';
        $sqlLevel = 'update user set level = "' . $level . '" where user_id = "' . $userId . '"';
        execute($sqlLevel);
    }
}

if(isset($_POST['editProduct'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        if(isset($_POST['prdName']) && isset($_POST['price']) && isset($_POST['priceSale']) && isset($_POST['descript'])){
            $prdName = $_POST['prdName'];
            $priceSale = $_POST['priceSale'];
            $price = $_POST['price'];
            $descript = $_POST['descript'];

            if(isset($_POST['display']) && isset($_POST['cameratruoc']) && isset($_POST['camerasau']) && isset($_POST['ram']) && isset($_POST['chip']) && isset($_POST['pin'])){
                $display = $_POST['display'];
                $cameratruoc = $_POST['cameratruoc'];
                $camerasau = $_POST['camerasau'];
                $chip = $_POST['chip'];
                $ram = $_POST['ram'];
                $pin = $_POST['pin'];
                $sqlEditPrd = 'update products set product_name = "' . $prdName . '", product_price = "' . $price . '", descript = "' . $descript . '" where product_id = ' . $id;
                execute($sqlEditPrd);
                $sqlEditInfo = "update info set display = '" . $display . "', cameratruoc = '" . $cameratruoc . "', camerasau = '" . $camerasau . "' , chip = '". $chip ."' , ram = '". $ram ."' , pin = '". $pin ."' where product_id = " . $id;
                execute($sqlEditInfo);
                echo '<script>alert("Sửa sản phẩm thành công!");</script>';
            }
        }
    }
}

function editMenu($sourceArr,  $parent = 0, &$newMenu, $text = "--") {
    if (count($sourceArr) > 0) {
        foreach ($sourceArr as $key => $value) {
            if ($value['parent'] == $parent) {
                $newMenu .= '<option value="'. $value['menu_id'] .'">'. $text . $value['menu_name'].'</option>';
                $newParent = $value['menu_id'];
                unset($sourceArr[$key]);
                editMenu($sourceArr, $newParent, $newMenu, $text."--");
            }
        }
    }
}

if(isset($_POST['addMenu'])){
    if(isset($_POST['menuName']) && isset($_POST['menuUrl']) && isset($_POST['selectMenu'])){
        $menuName = $_POST['menuName'];
        $menuUrl = $_POST['menuUrl'];
        $menuIcon = $_POST['menuIcon'];
        $selectMenu = $_POST['selectMenu'];

        $sql = 'select url from menu where menu_id = "' . $selectMenu . '"';
        $result  = executeSingleResult($sql);

        if($selectMenu == 0){
            $sqlMenu = "insert into menu(menu_name, parent, url, icon_menu) 
            value('". $menuName ."' , '0', '" . $menuUrl  ."', '". $menuIcon ."')";
        }else if(isset($_POST['menuIcon'])){
            $sqlMenu = "insert into menu(menu_name, parent, url, icon_menu) 
            value('". $menuName ."' , '". $selectMenu ."', '". $result['url'] . '-' . $menuUrl  ."', '". $menuIcon ."')";
        }else{
            $sqlMenu = "insert into menu(menu_name, parent, url) 
            value('". $menuName ."' , '". $selectMenu ."', '". $result['url'] . '-' . $menuUrl  ."')";
        }
        execute($sqlMenu);
        echo '<script>alert("Thêm menu thành công!");</script>';
    }
}

if(isset($_POST['editMenu'])){
    if(isset($_POST['menuName']) && isset($_POST['menuUrl']) && isset($_POST['selectMenu']) && isset($_POST['menuIcon'])){
        $menuName = $_POST['menuName'];
        $menuUrl = $_POST['menuUrl'];
        $menuIcon = $_POST['menuIcon'];
        $selectMenu = $_POST['selectMenu'];

        $sqlEditMenu = "update menu set menu_name = '" . $menuName . "', url = '" . $menuUrl . "', icon_menu = '" . $menuIcon . "' where menu_id = '" . $selectMenu . "'";

        execute($sqlEditMenu);
        echo '<script>alert("Sửa menu thành công!");</script>';
    }
}


if(isset($_POST['deleteMenu']) && isset($_POST['selectMenu'])){
    $selectMenu = $_POST['selectMenu'];
    $sqlDelete = 'delete from menu where menu_id = "' . $selectMenu . '"';
    execute($sqlDelete);
    echo '<script>alert("Xoá menu thành công!");</script>';
}