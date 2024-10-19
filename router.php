<?php
require_once './config.php';
require_once './libs/response.php';

require_once './app/middlewares/verify_auth_middleware.php';
require_once './app/middlewares/session_auth.php';
require_once './app/controllers/juego_controller.php';
require_once './app/controllers/auth_controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res= new Response();

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);
    
switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $juegoController= new juegoController($res);
        $juegoController-> showHome();
        break;
    case 'juego':
        sessionAuthMiddleware($res);
        if (isset($params[1])){
            $juegoController= new juegoController($res);
            $ID_juego= $params[1];
            $juegoController-> showJuego($ID_juego);
        }
        break;
    case 'listaPlataforma':
        sessionAuthMiddleware($res);
        $juegoController = new juegoController($res);
        $juegoController->showPlataformas();
        break;
    case 'listaCategoria':
        sessionAuthMiddleware($res);
        $juegoController = new juegoController($res);
        $juegoController->showCategorias();
        break;
    case 'juegosPorPlataforma':
        sessionAuthMiddleware($res);
        if (isset($params[1])) {
            $juegoController = new juegoController($res);
            $ID_plataforma = $params[1];
            $juegoController->showJuegosPorPlataforma($ID_plataforma);
        }
        break;
    case 'juegosPorCategoria':
        sessionAuthMiddleware($res);
        if (isset($params[1])) {
            $juegoController = new juegoController($res);
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
        $controller = new authController();
        $controller->logout();
        break;
    case 'showNuevoJuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new juegoController($res);
        $controller->showCrearJuego();
        break;
    case 'nuevoJuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new juegoController($res);
        $controller->crearJuego();
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