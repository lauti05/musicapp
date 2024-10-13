<?php 
function checkLogStatus(){
    session_start();
    if (empty($_SESSION['USER_ID'])){
        header('Location: login');
    }
}