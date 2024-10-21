<?php
class plataformaView{
    private $user = null;
    public function __construct($user){
        $this->user = $user;
    }

    function showPlataformas($plataformas) {
        require_once "./template/plataformas.phtml";
    }

    function showJuegosFP($juegos) {
        require_once "./template/juegosPorPlataforma.phtml";
    }

    function showNoJuegos($mensaje) {
        require_once('./template/showNoJuegos.phtml');
    }

    function showModifPlat($plataforma){
        require_once './template/form_showModifPlat.phtml';
    }

    function showNuevaPlat(){
        require_once './template/form_showNuevaPlat.phtml';
    }

    public function showBorrarPlat($plataforma) {
        require './template/alertaBorrarPlat.phtml';
    }

    public function showError($error) {
        require './template/error.phtml';
    }

}