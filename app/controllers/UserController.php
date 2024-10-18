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

    public function showLogin(){
        $this->view->displayLogForm();
    }

    public function authenticateUser(){
        if (!empty($_POST['username']) && !empty($_POST['pass'])){
            if ($this->model->exists($_POST['username'])){
                //autenticar
                $userFromDb = $this->model->getUser($_POST['username']);
                if (password_verify($_POST['pass'],$userFromDb->user_password)){
                    session_start();
                    $_SESSION['USER_ID'] = $userFromDb->user_id;
                    $_SESSION['USERNAME'] = $userFromDb->user_name;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    header("Location: " . BASE_URL .  "home");
                    exit();
                }
                else{
                    echo "contraseña incorrecta"; //implementar vista
                }

            }else{
                echo 'el usuario no existe'; //implementar vista
            }
        }
        else{
            echo 'completa los campos faltantes'; //implementar vista
        }   
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "login-form");
        exit();
    }
}