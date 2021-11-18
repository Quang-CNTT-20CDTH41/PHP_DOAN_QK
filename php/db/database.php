<?php
function execute($sql){
    $con = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_query($con, $sql);
    require_once 'close.php';
}

function executeResult($sql){
    require_once 'connect.php';
    $result = mysqli_query($con, $sql);
    $data = [];
    while($row = mysqli_fetch_array($result,1)){
        $data[] = $row;
    }
    require_once 'close.php';
    return $data;
}

function executeSingleResult($sql){
    require_once 'connect.php';
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, 1);
    require_once 'close.php';
    return $row;
}

// MENU
function recursiveMenu($sourceArr, $parent = 0, &$newMenu, $sub = true){
    if(count($sourceArr) > 0){
        $newMenu .= $sub ? '<ul class="nav menu">' : '<ul>';
        foreach($sourceArr as $key => $value){
            if($value['parent'] == $parent){
                $t = ($parent == 0) ? 'page' : 'product';
                $newMenu .= '<li class="nav-item"><a href="index.php?'.$t.'='.$value['url'].'" class="nav-link">'.$value['icon_menu'].'<span>'.$value['name'].'</span></a>';
                $newParent = $value['menu_id'];
                unset($sourceArr[$key]);
                recursiveMenu($sourceArr, $newParent, $newMenu, $sub = false);
            }
        }
        $newMenu .= '</ul>';
    }    
}