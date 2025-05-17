<?php


class HomeController{

    public $_prod_repo;
    
    public function __construct($prod_repo){
        $this->_prod_repo = $prod_repo;
    }

    public function index() {
        require_once __DIR__.'./../public/views/login.php';
    
    }

    public function indexos() {
        require_once __DIR__.'./../public/views/create-user.php';
        
    }


    public function fetchProdutos(){
        

    }
}