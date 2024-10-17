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
        if(!isset($_POST['user']) || (empty($_POST['user']))){
            return $this->view->showLogin('falta completar el nombre de usuario, intentelo de nuevo');
        }

        if(!isset($_POST['password']) || (empty($_POST['password']))){
            return $this->view->showLogin('falta completar la contraseña, intentelo de nuevo');
        }

        $user= $_POST['user'];
        $password= $_POST['password'];

        $userFromDB= $this->model->getUserByUsername($user);        
        if($userFromDB && password_verify($password, $userFromDB->password)){
            $_SESSION['ID_USER']= $userFromDB->ID_usuario;
            $_SESSION['USER']= $userFromDB->usuario;
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
        if(!isset($_POST['user']) || (empty($_POST['user']))){
            return $this->view->showSignup('falta completar el nombre de usuario, intentelo de nuevo');
        }

        if(!isset($_POST['password']) || (empty($_POST['password']))){
            return $this->view->showSignup('falta completar la contraseña, intentelo de nuevo');
        }


        $user= $_POST['user'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);

        $userCreated = $this->model->createUser($user, $password);
        
        if ($userCreated) {
            header('Location: ' . BASE_URL . 'showLogin'); // Redirigir al login después de registrarse
        } else {
            return $this->view->showSignup('Usuario ya registrado');
        }
    }

}