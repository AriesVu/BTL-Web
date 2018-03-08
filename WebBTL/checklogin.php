<?php
session_start();
function clearLoggedUser(){
    unset($_SESSION['account']);
}
function getLoggedUser(){
    $user = isset($_SESSION['account']) ? $_SESSION['account'] : 0;
    return $user;
}
function setLoggedUser($user){
    $_SESSION['account'] = $user;
}

function checkLoggedUser(){
    $user = getLoggedUser();
    if (!$user) {
        echo "BẠN CHƯA ĐĂNG NHẬP, HÃY VÀO <a href=\"login.php\">LOGIN</a>";
        exit();
    }
    return $user;
}
