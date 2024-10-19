<?php

function sessionAuthMiddleware($res) {
        if(isset($_SESSION['id_user'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['id_user'];
            $res->user->usuario = $_SESSION['usuario'];
            return;
        }
    }