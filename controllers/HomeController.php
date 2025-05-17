<?php

require_once '../public/render.php';


class HomeController{

    public $_prod_repo;
    
    public function __construct($prod_repo){
        $this->_prod_repo = $prod_repo;
    }

    public function index() {
        $prod = $this->_prod_repo->procurarTodos();
        // return $prod;
        echo render('home', ['produtos' => $prod]);
    }


    public function filtrarPorCodigo($codigo){
        $prod = $this->_prod_repo->procurarPorCodigo();
        echo render('home', ['produtos' => $prod]);

    }

    public function filtrarPorNome($nome){
        $prod = $this->_prod_repo->procurarPorNome($nome);
        echo render('home', ['produtos' => $prod]);
    }

    public function filtrarPorAtivos(){
        $prod = $this->_prod_repo->procurarPorAtivos();
        echo render('home', ['produtos' => $prod]);
    }

    public function filtrarPorInativos(){
        $prod = $this->_prod_repo->procurarPorInativos();
        echo render('home', ['produtos' => $prod]);
    }

}
