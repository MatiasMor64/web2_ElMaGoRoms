<?php
require_once './libs/response.php';

require_once './app/middlewares/session_auth_middleware.php';
require_once './app/controllers/juego_controller.php';
require_once './app/controllers/auth_controller.php';
require_once './config.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res= new Response();

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

/* TABLA DE RUTEO:
inicio/home         ->  showHome; (muestra todo a la vez)
juego especifico    ->  showJuego; (muestra un juego en especifico)
mostrar lista plata ->
mostrar lista cate  ->
login en pagina     ->  showLogin; (muestra el inicio de sesion)
login               ->  login; (conecta con la base de datos y checkea si el usuario es el correcto)
logout              ->
mostrar signup      ->  showSignup; (muestra el signup)
crear usuario       ->  signup; (crea un usuario)
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
        $juegoController = new juegoController();
        $juegoController->showPlataformas();
        break;
    case 'listaCategoria':
        $juegoController = new juegoController();
        $juegoController->showCategorias();
        break;
    case 'juegosPorPlataforma':
        if (isset($params[1])) {
            $juegoController = new juegoController();
            $ID_plataforma = $params[1];
            $juegoController->showJuegosPorPlataforma($ID_plataforma);
        }
        break;
    case 'juegosPorCategoria':
        if (isset($params[1])) {
            $juegoController = new juegoController();
            $ID_categoria = $params[1];
            $juegoController->showJuegosPorCategoria($ID_categoria);
        }
        break;
    case 'showLogin':
        $controller= new authController();
        $controller-> showLogin();
        break;
    case 'login':
        $controller= new authController();
        $controller-> login();
        break;
    case 'showSignup':
        $controller= new authController();
        $controller-> showSignup();
        break;
    case 'signup':
        $controller= new authController();
        $controller-> signup();
        break;
    case 'logout':
    
        break;
    case 'nuevoJuego':
        sessionAuthMiddleware($res);
        break;
    case 'nuevaCat':
        sessionAuthMiddleware($res);
        break;
    case 'nuevaPlat':
        sessionAuthMiddleware($res);
        break;
    case 'borrarJuego':
        sessionAuthMiddleware($res);
        break;
    case 'borrarCat':
        sessionAuthMiddleware($res);
        break;
    case 'borrarPlat':
        sessionAuthMiddleware($res);
        break;
    case 'modifJuego':
        sessionAuthMiddleware($res);
        break;
    case 'modifCat':
        sessionAuthMiddleware($res);
        break;
    case 'modifPlat':
        sessionAuthMiddleware($res);
        break;
    default:
        echo "404 not found";
        break;
}