<?php

require_once './app/models/categoria_model.php';   
require_once './app/views/categoria_view.php';   

class catController {

    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new categoriaModel();
        $this->view = new categoriaView($res->user);
    }

    function showCategorias() {
        $categorias= $this->model->getCategorias();
        return $this->view->showCategorias($categorias);
    }

    function showJuegosPorCategoria($ID_categoria) {
        $juegos = $this->model->getJuegosPorCategoria($ID_categoria);
        if($juegos){
            return $this->view->showJuegosFC($juegos);
        } else {
            return $this->view->showNoJuegos("No hay juegos disponibles para esta categoria.");
        }
    }
    
    function showNuevaCat(){
        $this->view->showNuevaCat();
    }

    public function nuevaCat() {
        if (!isset($_POST['categoria']) || empty(trim($_POST['categoria']))) {
            return $this->view->showError('Falta completar el nombre de la categoría.');
        }

        $categoria = $_POST['categoria'];
        $this->model->nuevaCat($categoria);

        header('Location: ' . BASE_URL . 'listaCategoria');
        exit();
    }
    

    public function showModifCat($ID_categoria) {
        $categoria = $this->model->getCategoria($ID_categoria);
        $this->view->showModifCat($categoria);
    }

    public function modifCat($ID_categoria) {
        if (!isset($_POST['consola']) || empty(trim($_POST['consola']))) {
            return $this->view->showError('Falta completar el nombre de la categoría.');
        }

        $consola = $_POST['consola'];
        $this->model->modifCat($ID_categoria, $consola);

        header('Location: '. BASE_URL. 'listaCategoria');
        exit();
    }

    public function showBorrarCat($ID_categoria){
        $categoria = $this->model->getCategoria($ID_categoria);
        $this->view->showBorrarCat($categoria);
    }

    public function borrarCat($ID_categoria) {

        $categoria = $this->model->getCategoria($ID_categoria);

        if (!$categoria) {
            return $this->view->showError("la categoria elegida es incorrecta");
        }

        $this->model->borrarCat($ID_categoria);

        header('Location: ' . BASE_URL);
    }
}