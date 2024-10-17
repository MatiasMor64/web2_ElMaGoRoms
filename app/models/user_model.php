<?php

class userModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2_elmagoroms;charset=utf8', 'root', '');
    }

    function getUserByUsername($user){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$user]);
        
        $user= $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function createUser($user, $password){
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$user]);
        if ($query->fetch(PDO::FETCH_OBJ)) {
            return false;
        }

        // Insertar nuevo usuario
        $query = $this->db->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        return $query->execute([$user, $password]);
    }
    
}

