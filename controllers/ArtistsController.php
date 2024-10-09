<?php 
require 'views/ArtistsView.php';
require 'models/ArtistsModel.php';
class ArtistsController{ // Artists
    private $view;
    private $model;

    public function __construct(){
        $this->view = new ArtistsView();
        $this->model = new ArtistsModel();
    }
    public function showHome(){
        $this->view->displayHome();
    }
    public function showArtists(){ 
        $artistList = $this->model->getArtists();
        $this->view->listArtists($artistList);
    }
    public function showArtist($artist){
        if ($this->model->exists($artist)){
            $artist = $this->model->getArtistById($artist);
            $this->view->viewArtist($artist);
        }else{
            $this->view->showError("The artist you're trying to find does not exist");
        }
    }
}

?>