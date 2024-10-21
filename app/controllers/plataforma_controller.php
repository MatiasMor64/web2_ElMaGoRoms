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
            return $this->view->showJuegosFP($juegos);
        } else {
            return $this->view->showNoJuegos("No hay juegos disponibles para esta plataforma.");
        }
    } 

    function showNuevaPlat(){
        $this->view->showNuevaPlat();
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
        $plataforma = $this->model->getPlataforma($ID_plataforma);
        $this->view->showModifPlat($plataforma);
    }

    public function modifPlat() {
        if (empty($_POST['ID_plat'])) {
            return $this->view->showError('No se ha seleccionado una consola');
        }

        $consolaModif = [
            'ID_plat' => $_POST['ID_plat'],
            'consola' => $_POST['consola']
        ]; 
        if($this->model->modifPlat($consolaModif)){
            header('Location: ' . BASE_URL . 'home');
        } else {
            return $this->view->showError('Error al modificar la consola');
        }
    }

    public function showBorrarPlat($ID_plataforma){
        $plataforma = $this->model->getPlataforma($ID_plataforma);
        $this->view->showBorrarPlat($plataforma);
    }

    public function borrarPlat($ID_plataforma) {
        $plataforma = $this->model->getPlataforma($ID_plataforma);

        if (!$plataforma) {
            return $this->view->showError("la categoria elegida es incorrecta");
        }

        $this->model->borrarPlat($ID_plataforma);

        header('Location: ' . BASE_URL);
    }
}