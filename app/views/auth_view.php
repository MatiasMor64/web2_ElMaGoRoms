<?php

class authView{
    private $user= null;

    public function showLogin($error = ''){
        require './template/form_login.phtml';
    }

    public function showSignup($error = ''){
        require './template/form_signup.phtml';
    }
}