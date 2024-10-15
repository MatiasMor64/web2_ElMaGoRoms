<?php
class juegoView{
    function showHome($juegos){
        require_once "./template/juegos.phtml";
    }

    function showDetail($juego){
        require_once "./template/detalleJuego.phtml";
    }
}