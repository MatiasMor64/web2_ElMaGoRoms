<?php
require_once "./app/models/juego_model.php";
require_once "./app/views/juego_view.php";

class juegoController{
private $model;
private $view;

function __construct(){
    $this->model= new juegoModel(); 
    $this->view= new juegoView();
}

function showHome(){
    $juegos= $this->model->getJuegos();
    /*$categorias= $this->model->getCategorias($juegos);
    $plataformas= $this->model->getPlataformas($juegos); */
    return $this->view->showHome($juegos /*, $categorias, $plataformas*/); 
}

function showJuego($ID_juego){
    $juego= $this->model->getJuego($ID_juego);
    $categoria= $this->model->getCategoria($juego);
    $plataforma= $this->model->getPlataforma($juego);
    return $this->view->showDetail($juego, $categoria, $plataforma);
}

}