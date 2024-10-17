<?php

class juegoModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2_elmagoroms;charset=utf8', 'root', '');
    }

    function getJuegos(){
        $query = $this->db->prepare('SELECT * FROM juegos');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getJuego($ID_juego){
        $query = $this->db->prepare('SELECT * FROM juegos WHERE ID_juego = ?');
        $query->execute([$ID_juego]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

// Adquirir la consola y el genero de un juego especifico: 

    function getCategoria($juego){
        $query = $this->db->prepare('SELECT * FROM categorías WHERE ID_cat = ?');
        $query->execute([$juego->ID_cat]);
        $categoria= $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    function getPlataforma($juego){
        $query = $this->db->prepare('SELECT * FROM plataformas WHERE ID_plat = ?');
        $query->execute([$juego->ID_plat]);
        $plataforma= $query->fetch(PDO::FETCH_OBJ);
        return $plataforma;
    }

// Adquirir todas las consolas y plataformas para el menu de inicio: 

    function getCategorias($juegos){
        $query = $this->db->prepare('SELECT * FROM categorías');
        $query->execute();
        $categorias= $query->fetch(PDO::FETCH_OBJ);
        return $categorias;
    }

    function getPlataformas($juegos){
        $query = $this->db->prepare('SELECT * FROM plataformas');
        $query->execute();
        $plataformas= $query->fetch(PDO::FETCH_OBJ);
        return $plataformas;
    }
}

