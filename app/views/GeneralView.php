<?php 
class GeneralView {

    public function displayHeader(){
        require 'templates/header.phtml';
    }

    public function displayHome(){
        require 'templates/home.phtml';
    }
}