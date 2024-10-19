<?php
require_once "./app/models/user_model.php";
require_once "./app/views/auth_view.php";

class authController{
    private $model;
    private $view;

    function __construct(){
        $this->model= new userModel(); 
        $this->view= new authView();
    }

    public function showLogin(){
        return $this->view->showLogin(); 
    }

    public function login(){
        if((empty($_POST['usuario']))){
            return $this->view->showLogin('falta completar el nombre de usuario, intentelo de nuevo');
        }

        if((empty($_POST['password']))){
            return $this->view->showLogin('falta completar la contraseña, intentelo de nuevo');
        }

        $usuario= $_POST['usuario'];
        $password= $_POST['password'];

        $userAuthDB= $this->model->getUserByUsername($usuario);        
        if($userAuthDB && password_verify($password, $userAuthDB->password)){
            $_SESSION['id_user']= $userAuthDB->ID_usuario;
            $_SESSION['usuario']= $userAuthDB->usuario;
            $_SESSION['LAST_ACTIVITY']= time();

            header('Location: ' . BASE_URL);
            exit;
        } else{
            return $this->view->showLogin('Credenciales Incorrectas');
        }
    }

    function showSignup(){
        return $this->view->showSignup();
    }

    function signup(){
        if(!isset($_POST['usuario']) || (empty($_POST['usuario']))){
            return $this->view->showSignup('falta completar el nombre de usuario, intentelo de nuevo');
        }

        if(!isset($_POST['password']) || (empty($_POST['password']))){
            return $this->view->showSignup('falta completar la contraseña, intentelo de nuevo');
        }


        $usuario= $_POST['usuario'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);

        $userCreated = $this->model->createUser($usuario, $password);
        
        if ($userCreated) {
            header('Location: ' . BASE_URL . 'showLogin');
        } else {
            return $this->view->showSignup('Usuario ya registrado');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
        exit;
    }

}