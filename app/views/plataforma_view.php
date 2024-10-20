<?php
class plataformaView{
    private $user = null;
    public function __construct($user){
        $this->user = $user;
    }

    function showPlataformas($plataformas) {
        require_once "./template/plataformas.phtml";
    }

    function showJuegosPorPlataforma($juegos) {
        require_once "./template/juegosPorPlataforma.phtml";
    }

    function showCrearPlat(){
        require_once './template/form_showNuevaPlat.phtml';
    }

    public function showError($error) {
        require './template/error.phtml';
    }

}