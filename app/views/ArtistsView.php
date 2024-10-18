<?php
class ArtistsView{
    
    public function displayHome(){
        require_once 'templates/header.phtml';
        require_once 'templates/home.phtml';
    }
    public function listArtists($artists){
        require_once 'templates/show-artists.phtml';
    }
    public function viewArtist($artistbyid, $songsbyArtist){
        require_once 'templates/show-artist.phtml';
    }
    public function showEditArtistForm($artist){
        require './templates/edit-artist.phtml';
    }
    public function showError($errorMsg){
        require_once 'templates/error-page.phtml';
    }
}
?>