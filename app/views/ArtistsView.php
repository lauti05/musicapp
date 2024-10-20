<?php
class ArtistsView{
    
    public function displayHome(){
        require_once 'templates/home.phtml';
    }
    public function showArtists($artists){
        require_once 'templates/show-artists.phtml';
    }
    public function addArtistForm($artist_name, $artist_img){
        require_once './templates/add-artist-form.phtml';
    }
    public function showArtistById($artistbyid, $songsbyArtist){
        require './templates/show-artist.phtml';  
    }
    public function showEditArtistForm($artist){ 
        require_once 'templates/edit-artist.phtml';
    }
    public function showError($errorMsg){
        require_once 'templates/error-page.phtml';
    }  
}
?>