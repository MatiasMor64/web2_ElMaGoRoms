<?php
class authView{
    public function showLogin($error = ''){
        require './template/form_login.phtml';
    }
}