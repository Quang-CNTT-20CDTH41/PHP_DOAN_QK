<?php
function execute($sql){
    require 'connect.php';
    mysqli_query($con, $sql);
    require 'close.php';
}

function executeResult($sql){
    require 'connect.php';
    $result = mysqli_query($con, $sql);
    $data = [];
    while($row = mysqli_fetch_array($result,1)){
        $data[] = $row;
    }
    require 'close.php';
    return $data;
}

function executeSingleResult($sql){
    require 'connect.php';
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, 1);
    require 'close.php';
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