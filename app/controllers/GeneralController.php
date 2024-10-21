<?php 
require 'app/views/GeneralView.php';

class GeneralController {
    private $view;

    public function __construct(){
        $this->view = new GeneralView();
    }

    public function showHeader(){
        $this->view->displayHeader();
    }

    public function showHome(){
        $this->view->displayHeader();
        $this->view->displayHome();
    }

    public function showFooter(){
        $this->view->displayFooter();
    }
    
}  