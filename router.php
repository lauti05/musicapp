<?php
require 'config.php';
require 'app/controllers/SongsController.php';
require 'app/controllers/ArtistsController.php';
require 'app/controllers/UserController.php';
require 'app/middlewares/session_auth_midw.php';



if (!empty(($_GET['action']))){
    $action = $_GET['action'];
}else {
    $action = 'home';
}

$params = explode('/', $action);

switch ($params[0]){
    case 'home':
    default:
        $controller = new ArtistsController(); //GeneralM, GeneralV, GeneralC ??
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
    case 'auth': 
        $controller = new UserController();
        $controller->authenticateUser();
        break;
    case 'delete-song':
        checkLogStatus();
        echo 'esto es delete-song';
        break;
    }
