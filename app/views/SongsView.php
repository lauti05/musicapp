<?php
class SongsView {

    public function listSongs($songList){
        require_once 'templates/header.phtml';
        require_once 'templates/show-songs.phtml';
    }

    public function viewSong($song, $artist){
        require_once 'templates/header.phtml';
        require_once 'templates/show-details.phtml';
    }

    public function showError($errorMsg){
        require_once 'templates/header.phtml';
        require_once 'templates/error-page.phtml';
    }

    public function showEditForm($song){
        require_once 'templates/edit-song.phtml';
    }

    public function displayAddForm($artistList){
        require_once 'templates/add-song-form.phtml';
    }
}