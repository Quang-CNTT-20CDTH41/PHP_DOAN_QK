<?php
session_start();

require './php/db/database.php';

require('./php/db/xuly-login.php');

require('./php/include/header.php');

if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'login':
            require('./php/include/login.php');
            break;
        case 'admin':
            require('./admin/index.php');
            break;
        case 'product':
            require('./php/include/product.php');
            break;
        case 'view':
            require('./php/include/view.php');
            break;
        case 'show-cart':
            require('./php/include/cart.php');
            break;
        case 'show':
            require('./php/include/show.php');
            break;
        default:
            require('./php/include/main.php');
    }
}else if(isset($_GET['search'])){
    require('./php/include/search.php');
}else{
    require('./php/include/main.php');
}

require('./php/include/footer.php');
?>