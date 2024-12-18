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
        } else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
    case 'edit-song':
        if (isLogged()) {
            $controller = new SongsController();
            $controller->showEditSong($params[1]);
            break;
        } else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
    case 'add-song':
        if (isLogged()) {
            $controller = new SongsController();
            $controller->showAddForm();
            break;
        } else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
    case 'login':
        if (!isLogged()) {
            $controller = new UserController();
            $controller->showLogin(' ');
            break;
        } else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
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
    case 'add-artist': //done
        if (isLogged()) {
            $controller = new ArtistsController();
            $controller->addArtist();
            break;}
        else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
        
    case 'delete-artist': //donde
        if (isLogged()) {
            $controller = new ArtistsController();
            $controller->deleteArtist($params[1]);
            break;}
        else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
    case 'edit-artist': //done
        if (isLogged()) {
            $controller = new ArtistsController();
            $artist_id = $params[1];
            $controller->editArtist($artist_id);
            break;}
        else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
    case 'logout':
        if (isLogged()) {
            $controller = new UserController();
            $controller->logout();
            break;}
        else {
            header('Location: ' . BASE_URL . 'home');
            break;
        }
}
