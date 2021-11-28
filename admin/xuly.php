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
}

if(isset($_POST['addProduct'])){
    if(isset($_POST['prdName'])){
        $prdName = $_POST['prdName'];
    }
    if(isset($_POST['price'])){
        $price = $_POST['price'];
    }
    if(isset($_POST['priceSale'])){
        $priceSale = $_POST['priceSale'];
    }
    if(isset($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
    }  
    if(isset($_POST['descript'])){
        $descript = $_POST['descript'];
    }

    $sqlParentId = 'select url from menu where menu_id = "'. $_GET['id'] .'"';
    $resultParentId = executeSingleResult($sqlParentId);

    $sqlMenuid = 'select url from menu where menu_id = "'. $_GET['type'] .'"';
    $resultMenuid = executeSingleResult($sqlMenuid);

    // if(!file_exists($dir)){
    //     // Tạo một thư mục mới
    //     if(mkdir($dir)){
    //         echo "Tạo thư mục thành công.";
    //     } else{
    //         echo "ERROR: Không thể tạo thư mục.";
    //     }
    // } else{
    //     echo "ERROR: Thư mục đã tồn tại.";
    // }

    $dir = 'images/product/'. $resultMenuid['url'] .'/'. $resultParentId['url'];
    
    if(!file_exists($dir)){
        if(mkdir($dir)){
            echo "Tạo thư mục thành công.";
        } else{
            echo "ERROR: Không thể tạo thư mục.";
        }
    }

    $urlImg = './images/product/'. $resultMenuid['url'] .'/'. $resultParentId['url'] .'/'.$image;
    $sqlAddPrd = 'insert into products (product_name, product_price, price_sale, descript, product_img, menu_id, menu_parent) value ("'. $prdName .'","'. $price .'","'. $priceSale .'","'. $descript .'","'.  $urlImg .'",'. $_GET['type'] .','. $_GET['id'] .')'; 

    execute($sqlAddPrd);
    move_uploaded_file($image_tmp, $urlImg);
    echo '<script>alert("Thêm thành công.");</script>';
}

function adminUser($user)
{
    $id = 1;
    foreach ($user as $item) {
        echo '<tr>
            <td>' . $id++ . '</td>
            <td>' . $item['hoten'] . '</td>
            <td>' . $item['gender'] . '</td>
            <td>' . $item['user_name'] . '</td>
            <td>' . $item['birthday'] . '</td>
            <td>' . $item['address'] . '</td>
            <td>' . $item['email'] . '</td>
            <td>' . $item['phone'] . '</td>
            <td>' . $item['level'] . '</td>
            <td><a href="./index.php?page=admin&manage=member&delete=' . $item['user_id'] . '"><button class="btn btn-danger">Xoá</button></a></td>
        </tr>';
    }
}

if(isset($_GET['delete']) && $_GET['manage'] == 'member'){
    $id = $_GET['delete'];
    $sqlDelete = 'delete from user where user_id = "'. $id .'"';
    execute($sqlDelete);
}

if(isset($_POST['editProduct'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        if(isset($_POST['prdName'])){
            $prdName = $_POST['prdName'];
        }
        
        if(isset($_POST['price'])){
            $price = $_POST['price'];
        }

        if(isset($_POST['priceSale'])){
            $priceSale = $_POST['priceSale'];
        }

        if(isset($_FILES['image']['name'])){
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
        }  

        if(isset($_POST['descript'])){
            $descript = $_POST['descript'];
        }

        $sqlEditPrd = 'update products set product_name = "' . $prdName . '", product_price = "' . $price . '", descript = "' . $descript . '" where product_id = ' . $id;
        
        execute($sqlEditPrd);
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
    }
}


if(isset($_POST['deleteMenu']) && isset($_POST['selectMenu'])){
    $selectMenu = $_POST['selectMenu'];
    $sqlDelete = 'delete from menu where menu_id = "' . $selectMenu . '"';
    execute($sqlDelete);
}