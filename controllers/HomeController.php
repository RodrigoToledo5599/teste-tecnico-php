<?php


class HomeController{


    public function index() {
        require_once __DIR__.'./../public/views/login.php';
    
    }

    public function indexos() {
        require_once __DIR__.'./../public/views/create-user.php';
        
    }
}