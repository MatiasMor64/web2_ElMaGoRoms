<?php

class userModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2_elmagoroms;charset=utf8', 'root', '');
    }

    function getJuegos(){
        $query = $this->db->prepare('SELECT * FROM juegos');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getUserByUsername($user){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$user]);
        
        $user= $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    
}

