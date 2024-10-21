<?php

require_once './app/models/roms_model.php';

class plataformaModel extends romsModel {
    
    public function showPlataformas() {
        $query = $this->db->prepare("SELECT * FROM plataformas");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getPlataforma($ID_plataforma){
        $query = $this->db->prepare('SELECT * FROM plataformas WHERE ID_plat = ?');
        $query->execute([$ID_plataforma]);
        $plataforma= $query->fetch(PDO::FETCH_OBJ);
        return $plataforma;
    }

    function getPlataformas() {
        $query = $this->db->prepare('SELECT * FROM plataformas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getJuegosPorPlataforma($ID_plataforma) {
        $query = $this->db->prepare('SELECT * FROM juegos WHERE ID_plat = ?');
        $query->execute([$ID_plataforma]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function crearPlat($consola) { 
        $query = $this->db->prepare('INSERT INTO plataformas(consola) VALUES (?)');
        $query->execute([$consola]);
        
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function borrarPlat($ID_plataforma) {
        $query = $this->db->prepare("DELETE FROM juegos WHERE ID_plat = ?");
        $query->execute([$ID_plataforma]);
        $query = $this->db->prepare("DELETE FROM plataformas WHERE ID_plat = ?");
        return $query->execute([$ID_plataforma]);
    }


    public function modifPlat($consolaModif) {
        if (!is_array($consolaModif)) {
            throw new Exception('Se esperaba un arreglo en lugar de una cadena u otro tipo de dato.');
        }
        
        $query = $this->db->prepare('UPDATE plataformas SET consola = ? WHERE ID_plat = ?');
        
        return $query->execute([
            $consolaModif['consola'],
            $consolaModif['ID_plat']
        ]);
    }
}