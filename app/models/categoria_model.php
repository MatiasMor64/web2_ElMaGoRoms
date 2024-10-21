<?php

require_once './app/models/roms_model.php';

class categoriaModel extends romsModel {

    public function showCategorias() {
        $query = $this ->db->prepare("SELECT * FROM categorias");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategoria($ID_categoria){
        $query = $this->db->prepare('SELECT * FROM categorías WHERE ID_cat = ?');
        $query->execute([$ID_categoria]);
        $categoria= $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categorías');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getJuegosPorCategoria($ID_categoria) {
        $query = $this->db->prepare('SELECT * FROM juegos WHERE ID_cat = ?');
        $query->execute([$ID_categoria]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Agregar una nueva categoría
    public function nuevaCat($categoria) {
        $query = $this->db->prepare("INSERT INTO categorías (categoría) VALUES (?)");
        $query->execute([$categoria]);
        
        $id = $this->db->lastInsertId();
        return $id;
    }

    // Actualizar una categoría
    public function updateCategoria($id_categoria, $nombre_categoria, $imagen_url) {
        $query = $this->db->prepare('UPDATE categorias SET categoría = ?, imagen_url = ? WHERE ID_cat = ?');
        return $query->execute([$nombre_categoria, $imagen_url, $id_categoria]);
    }

    public function modifCat($ID_categoria, $consola) {
        $query = $this->db->prepare('UPDATE categorías SET consola = ? WHERE ID_plat = ?');
        return $query->execute([$consola, $ID_categoria]);
    }

    public function borrarCat($ID_categoria) {
        $query = $this->db->prepare("DELETE FROM juegos WHERE ID_cat = ?");
        $query->execute([$ID_categoria]);
        $query = $this->db->prepare("DELETE FROM categorías WHERE ID_cat = ?");
        return $query->execute([$ID_categoria]);
    }
}
