<?php

class UserView {

    public function displayLogForm(){
        require_once 'templates/header.phtml';
        require_once 'templates/login-form.phtml';
    }

    public function showError($errMsg){
        require 'templates/login-error.phtml';
    }

}