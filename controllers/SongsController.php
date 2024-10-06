<?php

require 'views/SongsView.php';
require 'models/SongsModel.php';
class SongsController{
    private $view;
    private $model;

    public function __construct(){
        $this->view = new SongsView();
        $this->model = new SongsModel();
    }

    public function showHome(){
        $this->view->displayHome();
    }

    public function showSongs(){
        $songList = $this->model->getSongs();
        $this->view->listSongs($songList);
    }

    public function showSong($id){
        if ($this->model->exists($id)){
            $song = $this->model->getSongById($id);
            $this->view->viewSong($song);
        }else{
            $this->view->showError("The song you're trying to find does not exist");
        }
    }
}