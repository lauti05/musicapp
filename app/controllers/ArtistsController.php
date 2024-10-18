<?php 
require 'app/views/ArtistsView.php';
require 'app/models/ArtistsModel.php';

class ArtistsController{
    private $view;
    private $model;

    public function __construct(){
        $this->view = new ArtistsView();
        $this->model = new ArtistsModel();
    }

    public function showArtists(){ //obtengo desde el model
        $artists = $this->model->getArtists();
        $this->view->listArtists($artists);
    }

    public function showArtistbyID($artist_id){ //obtengo un artista solo
        $artistbyid = $this->model->getArtistById($artist_id);
        if (!$artistbyid){
            $this->view->showError("The artist you're trying to find does not exist");
            die(); //podría ser return; (?
        }else{
            $songsbyArtist = $this->model->getSongsbyArtist($artist_id);
            $this->view->viewArtist($artistbyid, $songsbyArtist);
        }
    }

    function addArtist(){ //son necesarias las verificaciones acá?
        $artist_name = $_POST['artist_name'];
        $artist_img = $_POST['artist_img'];

        $this->model->insertArtist($artist_name, $artist_img);
        header("Location: " . BASE_URL . "view-artists");
        die();
    }

    public function deleteArtist($artist_id){ //verifico el método y borro en la bdd
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->deleteArtistById($artist_id);
            header("Location: " . BASE_URL . "view-artists");
            die();
        }
    }

    public function editArtist($artist_id){ //accedo al model, compruebo que no esté vacío y llamo a la vista
        $artist = $this->model->getArtistById($artist_id);
        
        if (!$artist) {
            header("Location: " . BASE_URL . "view-artists");
            die();
        }
        $this->view->showEditArtistForm($artist);
    }

    public function updateArtist(){ //compruebo que el método sea post, guardo variables, pregunto si existen y actualizo en la bdd y luego llamo a la vista
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $artist_id = $_POST['artist_id'];
            $artist_name = $_POST['artist_name'];

            if ($artist_id && $artist_name) {
                $this->model->updateArtist($artist_id, $artist_name);
                header("Location: " . BASE_URL . "view-artists");
                exit();
            }
        }
        header("Location: " . BASE_URL . "view-artists");
        die();
    }
}
?>