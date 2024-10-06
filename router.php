<?php
define('BASE_URL', $_SERVER['PHP_SELF']);
require 'SongsController.php';

if (isset($_GET['action'])){
    $action = $_GET['action'];
}else {
    $action = 'home';
}

$params = explode('/', $action);

switch ($action){
    case 'home':
    default:
        echo '<h1>This is the home page</h1>';
    case 'view-songs':
        $controller = new SongsController();
        $controller->showSongs();
}