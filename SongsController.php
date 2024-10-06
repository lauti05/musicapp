<?php

require 'SongsView.php';
require 'SongsModel.php';
class SongsController{
    private $view;
    private $model;

    public function __construct(){
        $this->view = new SongsView();
        $this->model = new SongsModel();
    }

    public function showSongs(){
        $songList = $this->model->getSongs();
        //$this->view->listSongs($songList);

    }
}