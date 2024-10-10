<?php
require 'app/views/SongsView.php';
require 'app/models/SongsModel.php';

class SongsController{
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
        $this->view->listSongs($songList);
    }

    public function showSong($id){
        if ($this->model->exists($id)){
            $song = $this->model->getSongById($id);
            $artist = $this->artModel->getArtistById($song->artist_id);
            $this->view->viewSong($song, $artist);
        }else{
            $this->view->showError("The song you're trying to find does not exist");
        }
    }
}