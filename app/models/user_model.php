<?php

require_once './app/models/roms_model.php';

class userModel extends romsModel {

    function getUserByUsername($usuario){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
        $query->bindParam(':usuario', $usuario);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function createUser($usuario, $password){
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$usuario]);
        if ($query->fetch(PDO::FETCH_OBJ)) {
            return false;
        }

        // Insertar nuevo usuario
        $query = $this->db->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        return $query->execute([$usuario, $password]);
    }
    
}

