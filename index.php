<?php
require_once './php/db/database.php';
?>

    <?php
    require_once('./php/include/header.php');

    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'login':
                require_once('./php/include/login.php');
                break;
            default:
                require_once('./php/include/main.php');
        }
    }else{
        require_once('./php/include/main.php');
    }
    
    require_once('./php/include/footer.php');
    ?>

 
  