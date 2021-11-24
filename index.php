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
        default:
            require('./php/include/main.php');
    }
}else if(isset($_GET['product'])){
    require('./php/include/product.php');
}else{
    require('./php/include/main.php');
}



require('./php/include/footer.php');
?>