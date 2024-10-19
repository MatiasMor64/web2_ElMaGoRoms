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

/*    function getCategorias($juegos){
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
    } */

    function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categorías');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getPlataformas() {
        $query = $this->db->prepare('SELECT * FROM plataformas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getJuegosPorCategoria($ID_categoria) {
        $query = $this->db->prepare('SELECT * FROM juegos WHERE ID_categoria = ?');
        $query->execute([$ID_categoria]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function ObtenerProductosCategoria($ID_categoria){
     
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id=?');
        $query->execute([$ID_categoria]);
        $categoria = $query->fetch(PDO::FETCH_OBJ);

        $sentencia = $this->db->prepare('SELECT * FROM juegos WHERE ID_cat=?');
        $sentencia->execute([$categoria->ID_cat]);
        $juegos= $sentencia->fetchAll(PDO::FETCH_OBJ);
     return $juegos; 
    }

    function getJuegosPorPlataforma($ID_plataforma) {
        $query = $this->db->prepare('SELECT * FROM juegos WHERE ID_plataforma = ?');
        $query->execute([$ID_plataforma]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //crear, modificar y borrar juegos en la base de datos:

    public function crearJuego($nombre, $imagen, $descripción, $ID_usuario, $ID_plat, $ID_cat) { 
        $query = $this->db->prepare('INSERT INTO juegos(nombre, imagen, descripción, ID_usuario, ID_plat, ID_cat) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $imagen, $descripción, $ID_usuario, $ID_plat, $ID_cat]);
        
        $id = $this->db->lastInsertId();
        return $id;
    }
    

    function showCategories() {
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    // Agregar una nueva categoría
    function addCategory($nombre_categoria, $imagen_url) {
        $query = $this->db->prepare("INSERT INTO categorias (nombre, imagen_url) VALUES (?, ?)");
        $query->execute([$nombre_categoria, $imagen_url]);
    }

    // Eliminar una categoría
    function deleteCategory($id_categoria) {
        $query = $this->db->prepare("DELETE FROM categorias WHERE id_categoria = ?");
        return $query->execute([$id_categoria]);
    }

    // Buscar categoría por ID
    function getCategoryById($id_categoria) {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $query->execute([$id_categoria]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Actualizar una categoría
    function updateCategory($id_categoria, $nombre_categoria, $imagen_url) {
        $query = $this->db->prepare('UPDATE categorias SET nombre = ?, imagen_url = ? WHERE id_categoria = ?');
        return $query->execute([$nombre_categoria, $imagen_url, $id_categoria]);
    }

}

