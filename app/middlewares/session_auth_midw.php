<?php 

session_start();
function checkLogStatus(){
    if (empty($_SESSION['USER_ID'])){
        header('Location: login');
    }
}

function getLogStatus(){
    if (empty($_SESSION['USER_ID'])){
        return false;
    }else{
        return true;
    }
}