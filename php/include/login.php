<!-- LOGIN -->
<div class="container my-5">
    <div class="rounded d-flex login p-3 header-color text-white">
        <div class="img-login p-2 rounded  align-center">
            <img src="./images/login/login-bg.png" alt="">
        </div>
        <div class="content-login w-100">
            <div class="login-title mx-2 mb-3">
                <?php
                    if(isset($_GET['action'])){
                        switch($_GET['action']){
                            case 'dangky':
                                require_once('./php/include/login/dangky.php');
                                break;
                            case 'dangnhap': 
                                require_once('./php/include/login/dangnhap.php');
                                break;
                            case 'account': 
                                require_once('./php/include/login/account.php');
                                break;
                            case 'forget': 
                                require_once('./php/include/login/forget.php');
                                break;
                            default:
                                require_once('./php/include/login/dangnhap.php');
                        }
                    }else{
                        require_once('./php/include/login/dangnhap.php');
                    }
                ?>
            </div>
            <a href='./index.php' class="text-decoration-none mx-4 mt-3"><i class="bi bi-arrow-left-short"></i>Trở lại</a>
        </div>
    </div>
</div>
<!-- !LOGIN -->