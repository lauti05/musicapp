<?php
require 'app/views/SongsView.php';
require 'app/models/SongsModel.php';

class SongsController
{
    private $view;
    private $model;
    private $artModel;

    public function __construct(){
        $this->view = new SongsView();
        $this->model = new SongsModel();
        $this->artModel = new ArtistsModel();
    }

    public function showSongs(){
        $songList = $this->model->getSongs();
        usort($songList, function ($a, $b) {
            return strcasecmp($a->song_name, $b->song_name);
        });
        $this->view->listSongs($songList);
    }

    public function showSong($id){
        if ($this->model->exists($id)) {
            $song = $this->model->getSongById($id);
            $artist = $this->artModel->getArtistById($song->artist_id);
            $this->view->viewSong($song, $artist);
        } else {
            $this->view->showError("The song you're trying to find does not exist");
        }
    }


    public function deleteSong($id){ 
        if ($this->model->exists($id)) {
            $this->model->removeSong($id);
            header('Location:' . BASE_URL . 'view-songs');
        } else {
            header('Location:' . BASE_URL . 'home');
        }
    }

    public function showEditSong($id){
        if ($this->model->exists($id)) {
            $song = $this->model->getSongById($id);
            $this->view->showEditForm($song);
            if (!empty($_POST['s_name']) && !empty($_POST['s_genre']) && !empty($_POST['s_year'])) {
                $newName = $_POST['s_name'];
                $newGenre = $_POST['s_genre'];
                $newYear = (int) $_POST['s_year'];
                $this->model->updateSong($id, $newName, $newGenre, $newYear);
                header('Location: ' . BASE_URL . 'view-song/' . $id);
            }  
        }
        else
            header('Location:' . BASE_URL . 'home');
    }

    public function showAddForm(){
        $this->view->displayAddForm($this->artModel->getArtists());
        if (!empty($_POST['artist']) && !empty($_POST['s_name']) && !empty($_POST['s_genre']) && !empty($_POST['s_year'])) {
            $newSong = new stdClass();
            $newSong->artistId = (int) $_POST['artist'];
            $newSong->name = htmlspecialchars(trim($_POST['s_name']));
            $newSong->genre = htmlspecialchars(trim($_POST['s_genre']));
            $newSong->year = (int) htmlspecialchars(trim($_POST['s_year']));
            $this->model->addSong($newSong);
            header('Location: ' . BASE_URL . 'view-songs');
        }
    }

}