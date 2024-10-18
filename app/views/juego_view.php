<?php
class juegoView{
    function showHome($juegos){//, $categorias, $plataformas){
        require_once "./template/juegos.phtml";
    }

    function showDetail($juego, $categoria, $plataforma){
        require_once "./template/detalleJuego.phtml";
    }

    function showCategorias($categorias) {
        require_once "./template/categorias.phtml";
    }

    function showPlataformas($plataformas) {
        require_once "./template/plataformas.phtml";
    }

    function showJuegosPorCategoria($juegos) {
        require_once "./template/juegosPorCategoria.phtml";
    }

    function showJuegosPorPlataforma($juegos) {
        require_once "./template/juegosPorPlataforma.phtml";
    }
}