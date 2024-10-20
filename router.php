<?php
require 'config.php';
require 'app/controllers/GeneralController.php';
require 'app/controllers/SongsController.php';
require 'app/controllers/ArtistsController.php';
require 'app/controllers/UserController.php';
require 'app/middlewares/session_auth_midw.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


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
        if (isLogged()) { //estos if-else estan en el router porque tienen mas sentido acá que crear un controlador e invocar un metodo para recién después chequear el login
            $controller = new SongsController();
            $controller->deleteSong($params[1]);
            break;
        }else{
            header('Location: '.BASE_URL.'home');
            break;
        }
    case 'edit-song':
        $controller = new SongsController();
        $controller->showEditSong($params[1]);
        break;
    case 'add-song':
        $controller = new SongsController();
        $controller->showAddForm();
        break;
    case 'login':
        $controller = new SongsController();
        $controller->showEditSong($params[1]);
        break;
    case 'auth':
        $controller = new UserController();
        $controller->authenticateUser();
        break;
    case 'view-artists': //done
        $controller = new ArtistsController();
        $controller->showArtists();
        break;
    case 'view-artist': //done
        $controller = new ArtistsController();
        $controller->showArtistById($params[1]);
        break;
    case 'add-artist'://done
        $controller = new ArtistsController();
        $controller->addArtist($artist_name);
        break;
    case 'delete-artist': //done
        $controller = new ArtistsController();
        $controller->deleteArtist($params[1]);
        break;
    case 'edit-artist': //done
        $controller = new ArtistsController();
        $artist_id = $params[1];
        $controller->editArtist($artist_id);
        break;
    case 'update-artist': //done
        $controller = new ArtistsController();
        $artist_id = $params[1];
        $controller->updateArtist($artist_id);
        break;
    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;
}
