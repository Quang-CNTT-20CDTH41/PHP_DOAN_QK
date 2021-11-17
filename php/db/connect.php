<?php
require_once 'config.php';
// kết nối
$con = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
// kiếm tra kết nối
if($con->connect_error){
    echo "Lỗi kết nối ". $con->connect_error;
}
// set tiếng việt
mysqli_set_charset($con, 'utf-8');