<?php

class UserController{
    private $view;

    public function __construct(){
        $this->view = new UserView();
    }
    public function showLogin(){
        $this->view->displayLogForm();
    }

}