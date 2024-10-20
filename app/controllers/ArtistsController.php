<?php 
require 'app/views/ArtistsView.php';
require 'app/models/ArtistsModel.php';

class ArtistsController{
    private $view;
    private $model;
    private $songsmodel;

    public function __construct(){
        $this->view = new ArtistsView();
        $this->model = new ArtistsModel();
        $this->songsmodel = new SongsModel();
    }

    public function showArtists(){ 
        $artists = $this->model->getArtists();
        $this->view->showArtists($artists);
    }

    public function showArtistById($artist_id){
        $artistbyid = $this->model->getArtistById($artist_id);
        if (!$artistbyid) {
            header('Location: ' . BASE_URL . 'show-artists');
            exit();
        }
        $songsbyArtist = $this->songsmodel->songsbyArtist($artist_id);
        $this->view->showArtistById($artistbyid, $songsbyArtist);
    }

    function addArtist(){
        $artist_name = $_POST['artist_name'];
        $artist_img = $_POST['artist_img'];
    
        $this->model->insertArtist($artist_name, $artist_img);
        header("Location: " . BASE_URL . "view-artists");
        exit();
    }

    public function deleteArtist($artist_id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->deleteArtistById($artist_id);
            header("Location: " . BASE_URL . "view-artists");
            exit();
        }
    }

    public function editArtist($artist_id){
        $artist = $this->model->getArtistById($artist_id);

        if (!$artist) {
            header("Location: " . BASE_URL . "edit-artist");
            exit();
        }
        $this->view->showEditArtistForm($artist);
    }

    public function updateArtist(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $artist_id = $_POST['artist_id'];
            $artist_name = $_POST['artist_name'];
            $artist_img = $_POST['artist_img'];

            if ($artist_id && $artist_name && $artist_img) {
                $this->model->updateArtist($artist_id, $artist_name, $artist_img);
                header("Location: " . BASE_URL . "view-artists");
                exit();
            }
        }
        header("Location: " . BASE_URL . "view-artists");
        exit();
    }
}

?>