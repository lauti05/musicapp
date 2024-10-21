<?php 

session_start();
function isLogged(){
    if (empty($_SESSION['USER_ID']))
        return false;
    else 
        return true;
}

