<?php

require_once './app/models/roms_model.php';

class juegoModel extends romsModel {

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
    
    function getPlataforma($juego){
        $query = $this->db->prepare('SELECT * FROM plataformas WHERE ID_plat = ?');
        $query->execute([$juego->ID_plat]);
        $plataforma= $query->fetch(PDO::FETCH_OBJ);
        return $plataforma;
    }

    function getPlataformas() {
        $query = $this->db->prepare('SELECT * FROM plataformas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
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

    public function modifJuego($juegoModificado) {
        if (!is_array($juegoModificado)) {
            throw new Exception('Se esperaba un arreglo en lugar de una cadena u otro tipo de dato.');
        }
    
        $query = $this->db->prepare('UPDATE juegos SET nombre = ?, imagen = ?, descripción = ?, ID_plat = ?, ID_cat = ? WHERE ID_juego = ?');
        
        return $query->execute([
            $juegoModificado['nombre'],
            $juegoModificado['imagen'],
            $juegoModificado['descripción'],
            $juegoModificado['ID_plat'],
            $juegoModificado['ID_cat'],
            $juegoModificado['ID_juego']
        ]);
    }

    public function borrarJuego($ID_juego) {
        $query = $this->db->prepare('DELETE FROM juegos WHERE ID_juego = ?');
        $query->execute([$ID_juego]);
    }
}

