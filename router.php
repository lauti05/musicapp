<?php
require 'config.php';
require 'controllers/SongsController.php';


if (isset($_GET['action'])){
    $action = $_GET['action'];
}else {
    $action = 'home';
}

$params = explode('/', $action);

switch ($params[0]){
    case 'home':
    default:
        $controller = new SongsController();
        $controller->showHome();
        //var_dump(dirname($_SERVER['PHP_SELF']));
        break;
    case 'view-songs':
        $controller = new SongsController();
        $controller->showSongs();
        break;
    case 'view-song':
        $controller = new SongsController();
        $controller->showSong($params[1]);
    }