<?php
require_once "./app/models/juego_model.php";
require_once "./app/views/juego_view.php";

class juegoController{
private $model;
private $view;
function __construct($res){
    $this->model= new juegoModel(); 
    $this->view= new juegoView($res->user);
}

function showHome(){
    $juegos= $this->model->getJuegos();
/*    $categorias= $this->model->getCategorias($juegos);
    $plataformas= $this->model->getPlataformas($juegos); */
    return $this->view->showHome($juegos); //, $categorias, $plataformas); 
}

function showJuego($ID_juego){
    $juego= $this->model->getJuego($ID_juego);
    $categoria= $this->model->getCategoria($juego);
    $plataforma= $this->model->getPlataforma($juego);
    return $this->view->showDetail($juego, $categoria, $plataforma);
}

function showCategorias() {
    $categorias = $this->model->getCategorias();
    return $this->view->showCategorias($categorias);
}

function showPlataformas() {
    $plataformas = $this->model->getPlataformas();
    return $this->view->showPlataformas($plataformas);
}

function showJuegosPorCategoria($ID_categoria) {
    $juegos = $this->model->getJuegosPorCategoria($ID_categoria);
    return $this->view->showHome($juegos);
}

function showJuegosPorPlataforma($ID_plataforma) {
    $juegos = $this->model->getJuegosPorPlataforma($ID_plataforma);
    return $this->view->showJuegosPorPlataforma($juegos);
}

function showCrearJuego(){
    $categoria= $this->model->getCategorias();
    $plataforma= $this->model->getPlataformas();
    $this->view->showCrearJuego($categoria, $plataforma);
}

function crearJuego(){
    if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
        return $this->view->showError('Falta completar el título del juego');
    }

    if (!isset($_POST['imagen']) || empty($_POST['imagen'])) {
        return $this->view->showError('Falta agregar una url de Imagen');
    }

    if (!isset($_POST['descripción']) || empty($_POST['descripción'])) {
        return $this->view->showError('Falta agregar una descripcion');
    }

    if (!isset($_POST['ID_usuario']) || empty($_POST['ID_usuario'])) {
        return $this->view->showError('Falta agregar una id de usuario');
    }

    if (!isset($_POST['ID_plat']) || empty($_POST['ID_plat'])) {
        return $this->view->showError('Falta agregar una id de plataforma');
    }

    if (!isset($_POST['ID_cat']) || empty($_POST['ID_cat'])) {
        return $this->view->showError('Falta agregar una id de categoria');
    }

    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $descripción = $_POST['descripción'];
    $ID_usuario = $_POST['ID_usuario'];
    $ID_plat = $_POST['ID_plat'];
    $ID_cat = $_POST['ID_cat'];


    $id = $this->model->crearJuego($nombre, $imagen, $descripción, $ID_usuario, $ID_plat, $ID_cat);

    // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
    header('Location: ' . BASE_URL);

}

// Agregar una nueva categoría
function createCategory($name, $image_url) {
    $this->model->addCategory($name, $image_url);
    header('Location: /categories');
}

// Editar una categoría
function editCategory($id, $name, $image_url) {
    $this->model->updateCategory($id, $name, $image_url);
    header('Location: /categories');
}

// Eliminar una categoría
function deleteCategory($id) {
    $this->model->deleteCategory($id);
    header('Location: /categories');
}

// Mostrar formulario para editar
function showEditForm($id) {
    $category = $this->model->getCategoryById($id);
    require 'views/editCategoryForm.phtml';
}





}