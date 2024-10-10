<?php
require 'app/views/SongsView.php';
require 'app/models/SongsModel.php';

class SongsController{
    private $view;
    private $model;
    private $artModel;
    private $genController;


    public function __construct(){
        $this->view = new SongsView();
        $this->model = new SongsModel();
        $this->artModel = new ArtistsModel();
        $this->genController = new GeneralController();
    }

    public function showSongs(){
        $this->genController->showHeader();
        $songList = $this->model->getSongs();
        $this->view->listSongs($songList);
    }

    public function showSong($id){
        $this->genController->showHeader();
        if ($this->model->exists($id)){
            $song = $this->model->getSongById($id);
            $artist = $this->artModel->getArtistById($song->artist_id);
            $this->view->viewSong($song, $artist);
        }else{
            $this->view->showError("The song you're trying to find does not exist");
        }
    }
}