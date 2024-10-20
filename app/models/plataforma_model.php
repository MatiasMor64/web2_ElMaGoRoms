<?php

require_once './app/models/roms_model.php';

class plataformaModel extends romsModel {
    
    public function showPlataformas() {
        $query = $this->db->prepare("SELECT * FROM plataformas");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getPlataforma($juego){
        $query = $this->db->prepare('SELECT * FROM plataformas WHERE ID_cat = ?');
        $query->execute([$juego->ID_cat]);
        $plataforma= $query->fetch(PDO::FETCH_OBJ);
        return $Plataforma;
    }

    function getPlataformas() {
        $query = $this->db->prepare('SELECT * FROM plataformas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getJuegosPorPlataforma($ID_plataforma) {
        $query = $this->db->prepare('SELECT * FROM juegos WHERE ID_Plataforma = ?');
        $query->execute([$ID_plataforma]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function crearPlat($consola) { 
        $query = $this->db->prepare('INSERT INTO plataformas(consola) VALUES (?)');
        $query->execute([$consola]);
        
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function deletePlataforma($ID_plataforma) {
        $query = $this->db->prepare("DELETE FROM plataformas WHERE ID_cat = ?");
        return $query->execute([$ID_plataforma]);
    }

    public function getPlataformaById($ID_plataforma) {
        $query = $this->db->prepare('SELECT * FROM plataformas WHERE ID_cat = ?');
        $query->execute([$ID_plataforma]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function updatePlataforma($ID_plataforma, $nombre_plataforma, $imagen_url) {
        $query = $this->db->prepare('UPDATE plataformas SET plataformas = ?, imagen_url = ? WHERE ID_cat = ?');
        return $query->execute([$nombre_plataforma, $imagen_url, $ID_plataforma]);
    }
}