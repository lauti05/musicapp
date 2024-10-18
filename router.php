<?php
require 'config.php';
require 'app/controllers/GeneralController.php';
require 'app/controllers/SongsController.php';
require 'app/controllers/ArtistsController.php';
require 'app/controllers/UserController.php';
require 'app/middlewares/session_auth_midw.php';

error_reporting(E_ALL & ~E_WARNING);

if (!empty(($_GET['action']))) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
    default:
        $controller = new GeneralController();
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
    case 'delete-song':
        checkLogStatus();
        $controller = new SongsController();
        $controller->deleteSong($params[1]);
        break;
    case 'edit-song':
        checkLogStatus();
        $controller = new SongsController();
        $controller->showEditSong($params[1]);
        break;
    case 'add-song':
        checkLogStatus();
        $controller = new SongsController();
        $controller->showAddForm();
        break;
    case 'view-artists':
        $controller = new ArtistsController();
        $controller->showArtists();
        break;
    case 'view-artist':
        if (isset ($params[1])){
            $controller = new ArtistsController();
            $controller->showArtistbyID($params[1]);
        }else{
            echo "error";
        }
        break;
    case 'addArtist':
        checkLogStatus();
        $artistController = new ArtistsController();
        $artistController->addArtist();
        break;
     case 'delete':
        checkLogStatus();
        $artistController = new ArtistsController();
        $artistController->deleteArtist($params[1]);
        break;
    case 'editArtist':
        //no puedo editar si ejecuto checkLogStatus();
        $artistController = new ArtistsController();
        $artist_id = $params[1];
        $artistController->editArtist($artist_id);
        break;
    case 'updateArtist':
        //me deja hacer el update sin necesidad de ejecutar checkLogStatus();
        checkLogStatus();
        $artistController = new ArtistsController();
        $artistController->updateArtist($artist_id);
        break;
    case 'login':
        $controller = new UserController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new UserController();
        $controller->authenticateUser();
        break;
    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;
    case 'update-song':
        $controller = new SongsController();
        $controller->updateSong($params[1]);
        break;
    case 'get-add-data':
        $controller = new SongsController();
        $controller->addSong();
        break;
}
