<?php
require 'config.php';
require 'controllers/SongsController.php';
require 'controllers/ArtistsController.php';


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
        break;
    case 'view-songs':
        $controller = new SongsController();
        $controller->showSongs();
        break;
    case 'view-song':
        $controller = new SongsController();
        $controller->showSong($params[1]);
        break;
    case 'view-artists':
        $controller = new ArtistsController();
        $controller->showArtists();
        break;
    case 'view-artist':
        $controller = new ArtistsController();
        $controller->showArtist($params[1]);
        break;

    case 'login': 
        $controller = new UserController();
        $controller->showLogin();
        break;
    }
