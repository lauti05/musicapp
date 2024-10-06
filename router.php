<?php
define('BASE_URL', $_SERVER['PHP_SELF']);

if (isset($_GET['action'])){
    $action = $_GET['action'];
}else {
    $action = 'home';
}

$params = explode('/', $action);

switch ($action){
    case 'home':
    default:
        echo '<h1>Este es el home</h1>';
}