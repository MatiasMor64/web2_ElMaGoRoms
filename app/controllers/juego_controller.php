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
    return $this->view->showHome($juegos); 
}

function showJuego($id){
    echo "<h1>juego especifico</h1>";
}

}