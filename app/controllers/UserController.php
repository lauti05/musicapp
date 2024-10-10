<?php
require 'app/views/UserView.php';
require 'app/models/UserModel.php';

class UserController{
    private $view;
    private $model;
    private $genController;
    private $logged;

    public function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->genController = new GeneralController();
        $this->logged = false;
    }

    public function showLogin(){
        $this->genController->showHeader();
        $this->view->displayLogForm();
    }

    public function authenticateUser(){
        if (!empty($_POST['username']) && !empty($_POST['pass'])){
            if ($this->model->exists($_POST['username'])){
                //autenticar
                $user = $this->model->getUser($_POST['username']);
                if (password_verify($_POST['pass'],$user->user_password)){
                    $this->logged = true;
                    session_start();
                    $_SESSION['USER_ID'] = $user->user_id;
                    $_SESSION['USERNAME'] = $user->user_name;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    //header('Location: home');
                }
                else{
                    echo "contraseña incorrecta";
                }

            }else{
                echo 'el usuario no existe';
            }
        }
        else{
            echo 'completa los campos faltantes';
        }   
    }

    public function isLogged(){
        return $this->logged;
    }


}