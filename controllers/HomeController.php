<?php


class HomeController{

    public $_prod_repo;
    
    public function __construct($prod_repo){
        $this->_prod_repo = $prod_repo;
    }

    public function index() {
        require_once __DIR__.'./../views/login.php';
    
    }



    public function fetchProdutos(){
        // $prods = json_encode($this->_prod_repo->all());
        $prods = $this->_prod_repo->all();
        // var_dump($prods);
        return $prods;

    }
}