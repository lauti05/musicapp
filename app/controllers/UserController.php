<?php
require 'app/views/UserView.php';
require 'app/models/UserModel.php';

class UserController{
    private $view;
    private $model;

    public function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();
    }



    public function showLogin($error){
        if ($error == ' ')
            $this->view->displayLogForm();
        else{
            $this->view->displayLogForm();
            $this->view->showError($error);
        }
    }

    public function authenticateUser(){
        $error = ' ';
        if (!empty($_POST['username']) && !empty($_POST['pass'])){
            if ($this->model->exists($_POST['username'])){
                //autenticar
                $userFromDb = $this->model->getUser($_POST['username']);
                if (password_verify($_POST['pass'],$userFromDb->user_password)){
                    session_start();
                    $_SESSION['USER_ID'] = $userFromDb->user_id;
                    $_SESSION['USERNAME'] = $userFromDb->user_name;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    header('Location: home'); 
                    return;
                }
                else
                    $error = "Wrong password";
            }else
                $error = "The user doesn't exist";       
        }else
            $error = "Fill the blanks"; //buscar sinonimos
        
        $this->showLogin($error);
    }

}