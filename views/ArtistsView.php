<?php
class ArtistsView{
    public function displayHome(){
        require_once 'templates/home.phtml';
    }
    public function listArtists($artistList){
        require_once 'templates/show-artists.phtml';
    }
    public function viewArtist($artist){
        require_once 'templates/show-details.phtml';
    }
    public function showError($errorMsg){
        require_once 'templates/error-page.phtml';
    }
}
?>