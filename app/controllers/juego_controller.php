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



function showPlataformas() {
    $plataformas = $this->model->getPlataformas();
    return $this->view->showPlataformas($plataformas);
}

// no funca 


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

    if (!isset($_POST['ID_plat']) || empty($_POST['ID_plat'])) {
        return $this->view->showError('Falta agregar una id de plataforma');
    }

    if (!isset($_POST['ID_cat']) || empty($_POST['ID_cat'])) {
        return $this->view->showError('Falta agregar una id de categoria');
    }

    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $descripción = $_POST['descripción'];
    $ID_usuario = $_SESSION['id_user'];
    $ID_plat = $_POST['ID_plat'];
    $ID_cat = $_POST['ID_cat'];


    $id = $this->model->crearJuego($nombre, $imagen, $descripción, $ID_usuario, $ID_plat, $ID_cat);

    // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
    header('Location: ' . BASE_URL);
}

public function showModifJuego($ID_juego){
    $juego = $this->model->getJuego($ID_juego);
    $categoria = $this->model->getCategorias();
    $plataforma = $this->model->getPlataformas();
    $this->view->showModifJuego($categoria, $plataforma, $juego);
}

public function modifJuego() {
    if (empty($_POST['ID_juego'])) {
        return $this->view->showError('No se ha seleccionado un juego');
    }

    // Asegurarnos de que todos los campos sean correctos
    $juegoModificado = [
        'ID_juego' => $_POST['ID_juego'],
        'nombre' => $_POST['nombre'],
        'ID_cat' => $_POST['ID_cat'],
        'ID_plat' => $_POST['ID_plat'], 
        'descripcion' => $_POST['descripcion'],  // Corregido 'descripción' a 'descripcion' para evitar errores
        'imagen' => $_POST['imagen'],
        'ID_usuario' => $_SESSION['ID_usuario']     // Aseguramos de incluir ID_usuario si es necesario
    ];

    if ($this->model->modifJuego($juegoModificado)) {
        header('Location: ' . BASE_URL . 'home');
    } else {
        return $this->view->showError('Error al modificar el juego');
    }
}

public function borrarJuego($ID_juego){
    $juego = $this->model->getJuego($ID_juego);

        if (!$juego) {
            return $this->view->showError("No existe el juego de id =$ID_juego");
        }

        $this->model->borrarJuego($ID_juego);

        header('Location: ' . BASE_URL);

} 

/* public function modifJuego(){
    if (empty($_POST['ID_juego'])) {
        return $this->view->showError('No se ha seleccionado un juego');
    }

    $juegoModificado = [
        'ID_juego' => $_POST['ID_juego'],
        'nombre' => $_POST['nombre'],
        'ID_cat' => $_POST['ID_cat'],
        'ID_plat' => $_POST['ID_plat'], 
        'descripcion' => $_POST['descripción'], 
        'imagen' => $_POST['imagen']
    ];

    if($this->model->modifJuego($juegoModificado['ID_juego'], $juegoModificado)){
        header('Location:' . BASE_URL . 'home');
    } else{
        return $this->view->showError('Error al modificar el juego');
    }

     
} */




}