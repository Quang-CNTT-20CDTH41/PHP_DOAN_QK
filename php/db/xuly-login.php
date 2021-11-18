<?php
require_once('./php/db/variable.php');

if(isset($_POST['create'])){
    if($usernameErr == '' && $fullnameErr == '' && $passwordErr == '' && $confirmErr == '' && $emailErr == '' && $phonenumberErr == '' && $addressErr == ''){
        $sqlCreateAccount = 'insert into user(hoten, gender, user_name, password, birthday, address, email, phone) 
        values("'.$fullname.'", "'.$gender.'", "'.$username.'", "'.$password.'", "'.$birthday.'", "'.$address.'", "'.$email.'", "'.$phonenumber.'")';
        execute($sqlCreateAccount);
    }
}
if(isset($_POST['login'])){

}