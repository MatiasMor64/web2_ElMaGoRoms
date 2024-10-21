<?php
class categoriaView{
    private $user = null;
    public function __construct($user){
        $this->user = $user;
    }

    function showCategorias($categorias) {
        require_once "./template/categorias.phtml";
    }

    function showJuegosFC($juegos) {
        require_once "./template/juegosPorCategoria.phtml";
    }

    function showNoJuegos($mensaje) {
        require_once('./template/showNoJuegos.phtml');
    }

    function showModifCat($categoria){
        require_once './template/form_showModifCat.phtml';
    }

    function showNuevaCat(){
        require_once './template/form_showNuevaCat.phtml';
    }

    public function showBorrarCat($categoria) {
        require './template/alertaBorrarCat.phtml';
    }

    public function showError($error) {
        require './template/error.phtml';
    }
}