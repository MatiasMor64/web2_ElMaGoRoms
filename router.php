<?php
require_once './app/controllers/juego_controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

/* TABLA DE RUTEO:
inicio/home         ->  showHome; (muestra todo a la vez)
juego especifico    ->  showJuego; (muestra un juego en especifico)
mostrar lista plata ->
mostrar lista cate  ->
login               ->
logout              ->
crear usuario       ->
crear juego         ->
crear categoria     ->               
crear plataforma    ->               
borrar juego        ->
borrar categoria    ->
borrar plataforma   ->
modificar juego     ->
modificar categoria ->
modificar plataforma->
*/

$params = explode('/', $action);
    
switch ($params[0]) {
    case 'home':
        $juegoController= new juegoController();
        $juegoController-> showHome();
        break;
    case 'juego':
        if (isset($params[1])){
            $juegoController= new juegoController();
            $ID_juego= $params[1];
            $juegoController-> showJuego($ID_juego);
        }
        break;
    case 'listaPlataforma':
        
        break;
    case 'listaGenero':
        
        break;
    case 'login':
    
        break;
    case 'logout':
    
        break;
    case 'nuevoUser':
    
        break;
    case 'nuevoJuego':
    
        break;
    case 'nuevaCat':
    
        break;
    case 'nuevaPlat':
    
        break;
    case 'borrarJuego':
    
        break;
    case 'borrarCat':

        break;
    case 'borrarPlat':
        
        break;
    case 'modifJuego':
        
        break;
    case 'modifCat':
        
        break;
    case 'modifPlat':
        
        break;
    default:
        echo "404 not found";
        break;
}