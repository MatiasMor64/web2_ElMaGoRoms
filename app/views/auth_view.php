<?php
class authView{
    public function showLogin($error = ''){
        require './template/form_login.phtml';
    }

    public function showSignup($error = ''){
        require './template/form_signup.phtml';
    }
}