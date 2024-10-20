<?php

require_once './app/models/plataforma_model.php';   
require_once './app/views/plataforma_view.php';   

class platController {

    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new plataformaModel();
        $this->view = new plataformaView($res->user);
    }

    function showPlataformas() {
        $plataformas= $this->model->getPlataformas();
        return $this->view->showPlataformas($plataformas);
    }

    function showJuegosPorPlataforma($ID_plataforma) {
        $juegos = $this->model->getJuegosPorPlataforma($ID_plataforma);
        if($juegos){
            return $this->view->showJuegos($juegos);
        }
    }

    function showCrearPlat(){
        $this->view->showCrearPlat();
    }

    public function crearPlat() {
        if (!isset($_POST['consola']) || empty(trim($_POST['consola']))) {
            return $this->view->showError('Falta completar el nombre de la plataforma.');
        }

        $consola = $_POST['consola'];
        $this->model->crearPlat($consola);

        header('Location: ' . BASE_URL . 'listaPlataforma');
        exit();
    }

    public function showModifPlat($ID_plataforma) {
        $plataforma = $this->model->getPlat($ID_plataforma);
        if ($plataforma) {
            $this->view->modifPlat($plataforma);
        } else {
            $this->view->showError('Plataforma no encontrada.');
        }
    }

    public function modifPlat($ID_plataforma) {
        if (!isset($_POST['consola']) || empty(trim($_POST['consola']))) {
            return $this->view->showError('Falta completar el nombre de la plataforma.');
        }

        $id = $_POST['id'];
        $consola = $_POST['consola'];
        $this->model->modifPlat($id, $consola);

        header('Location: '. BASE_URL. 'listaPlataforma');
        exit();
    }

    public function borrarPlat($ID_plataforma) {
        $this->model->borrarPlat($ID_plataforma);
        header('Location: '. BASE_URL. 'listaPlataforma');
        exit();
    }
}