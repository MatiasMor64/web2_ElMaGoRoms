<?php

require_once './app/models/roms_model.php';

class categoriaModel extends romsModel {

    public function showCategorias() {
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategoria($juego){
        $query = $this->db->prepare('SELECT * FROM categorías WHERE ID_cat = ?');
        $query->execute([$juego->ID_cat]);
        $categoria= $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categorías');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getJuegosPorCategoria($ID_categoria) {
        $query = $this->db->prepare('SELECT * FROM juegos WHERE ID_categoria = ?');
        $query->execute([$ID_categoria]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Agregar una nueva categoría
    public function addCategoria($nombre_categoria, $imagen_url) {
        $query = $this->db->prepare("INSERT INTO categorias (categoría, imagen_url) VALUES (?, ?)");
        return $query->execute([$nombre_categoria, $imagen_url]);
    }

    // Eliminar una categoría
    public function deleteCategoria($id_categoria) {
        $query = $this->db->prepare("DELETE FROM categorias WHERE ID_cat = ?");
        return $query->execute([$id_categoria]);
    }

    // Buscar categoría por ID
    public function getCategoriaById($id_categoria) {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE ID_cat = ?');
        $query->execute([$id_categoria]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Actualizar una categoría
    public function updateCategoria($id_categoria, $nombre_categoria, $imagen_url) {
        $query = $this->db->prepare('UPDATE categorias SET categoría = ?, imagen_url = ? WHERE ID_cat = ?');
        return $query->execute([$nombre_categoria, $imagen_url, $id_categoria]);
    }
}
