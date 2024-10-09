<?php
class SongsView {

    public function displayHome(){
        require_once 'templates/home.phtml';
    }
    public function listSongs($songList){
        require_once 'templates/show-songs.phtml';
    }

    public function viewSong($song, $artist){
        require_once 'templates/show-details.phtml';

    }

    public function showError($errorMsg){
        require_once 'templates/error-page.phtml';
    }
}