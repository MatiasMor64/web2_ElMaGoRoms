<?php
class juegoView{
    function showHome($juegos/*, $categorias, $plataformas*/){
        require_once "./template/juegos.phtml";
    }

    function showDetail($juego, $categoria, $plataforma){
        require_once "./template/detalleJuego.phtml";
    }
}