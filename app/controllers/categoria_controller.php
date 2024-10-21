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

    public function modifCat() {
        if (empty($_POST['ID_cat'])) {
            return $this->view->showError('No se ha seleccionado una categoría');
        }

        $generoModif = [
            'ID_cat' => $_POST['ID_cat'],
            'categoría' => $_POST['categoría']
        ]; 
        
        if($this->model->modifCat($generoModif)){
            header('Location: ' . BASE_URL . 'listaCategoria');
        } else {
            return $this->view->showError('Error al modificar la categoría');
        }
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