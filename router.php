<?php
require_once './config/config.php';
require_once './libs/response.php';

require_once './app/middlewares/verify_auth_middleware.php';
require_once './app/middlewares/session_auth.php';
require_once './app/controllers/juego_controller.php';
require_once './app/controllers/categoria_controller.php';
require_once './app/controllers/plataforma_controller.php';
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
        $controller= new juegoController($res);
        $controller-> showHome();
        break;


    //funciones de Juegos
    case 'juego':
        sessionAuthMiddleware($res);
        if (isset($params[1])){
            $controller= new juegoController($res);
            $ID_juego= $params[1];
            $controller-> showJuego($ID_juego);
        }
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

    case 'showModifJuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new juegoController($res); 
        $ID_juego = $params[1];
        $controller->showModifJuego($ID_juego);
        break;
    case 'modifJuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new juegoController($res);
        $controller->modifJuego();
        break;

    case 'borrarJuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller= new juegoController($res);
            $ID_juego= $params[1];
            $controller-> borrarJuego($ID_juego);
        break;


    //funciones de sesion/usuarios
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


    //funciones de Plataformas
    case 'listaPlataforma':
        sessionAuthMiddleware($res);
        $controller = new platController($res);
        $controller->showPlataformas();
        break;
    case 'juegosPorPlataforma':
        sessionAuthMiddleware($res);
        if (isset($params[1])) {
            $controller = new platController($res);
            $ID_plataforma = $params[1];
            $controller->showJuegosPorPlataforma($ID_plataforma);
        }
        break;

    case 'showNuevaPlat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new platController($res);
        $controller->showNuevaPlat();
        break;
    case 'nuevaPlat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new platController($res);
        $controller->crearPlat();
        break;

    case 'showBorrarPlat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new PlatController($res);
        $ID_plataforma = $params[1];
        $controller->showBorrarPlat($ID_plataforma);
        break;
    case 'borrarPlat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new platController($res);
        $ID_plataforma = $params[1];
        $controller->borrarPlat($ID_plataforma);        
        break;

    case 'showModifPlat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new platController($res);
        $ID_plataforma = $params[1];
        $controller->showModifPlat($ID_plataforma);
        break;
    case 'modifPlat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new platController($res);
        $controller->modifPlat();
        break;


    //funciones de Categorias
    case 'listaCategoria':
        sessionAuthMiddleware($res);
        $controller = new catController($res);
        $controller->showCategorias();
        break;
    case 'juegosPorCategoria':
        sessionAuthMiddleware($res);
        if (isset($params[1])) {
            $controller = new catController($res);
            $ID_categoria = $params[1];
            $controller->showJuegosPorCategoria($ID_categoria);
        }
        break;

    case 'showNuevaCat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new catController($res);
        $controller->showNuevaCat();
        break;
    case 'nuevaCat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new catController($res);
        $controller->nuevaCat();
        break;

    case 'showModifCat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new catController($res);
        $ID_categoria = $params[1];
        $controller->showModifCat($ID_categoria);
        break;
    case 'modifCat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new catController($res);
        $controller->modifCat();
        break;

    case 'showBorrarCat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new catController($res);
        $ID_categoria = $params[1];
        $controller->showBorrarCat($ID_categoria);
        break;
    case 'borrarCat':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new catController($res);
        $ID_categoria = $params[1];
        $controller->borrarCat($ID_categoria);        
        break;
    echo "404 not found";
    break;
}

/* TABLA DE RUTEO:
inicio/home         ->  showHome; (muestra todo a la vez)
juego especifico    ->  showJuego; (muestra un juego en especifico)
mostrar lista plata ->  -
mostrar lista cate  ->   -
login en pagina     ->  showLogin; (muestra el inicio de sesion)
login               ->  login; (conecta con la base de datos y checkea si el usuario es el correcto)
logout              ->  -
mostrar signup      ->  showSignup; (muestra el signup)
crear usuario       ->  signup; (crea un usuario)
crear juego         ->  -
crear categoria     ->                
crear plataforma    ->               
borrar juego        ->  -
borrar categoria    ->
borrar plataforma   ->
modificar juego     ->  -
modificar categoria ->
modificar plataforma->
*/