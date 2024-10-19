<?php

class userModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2_elmagoroms;charset=utf8', 'root', '');
    }

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

