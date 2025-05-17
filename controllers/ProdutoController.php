<?php

require_once '../public/render.php';



class ProdutoController{

    public $_prod_repo;
    
    public function __construct($prod_repo){
        $this->_prod_repo = $prod_repo;
    }


    public function index(){
        echo render('cadastro-usuario');
    }


    public function cadastrar($codigo, $nome, $descricao, $valor, $quantidade, $status_do_produto){
        $prod = new Produto(
            $codigo,
            $nome,
            $descricao,
            $valor,
            $quantidade,
            $status_do_produto
        );
        $this->_prod_repo->adicionarProduto($prod);
        echo render('home');
    }

    public function excluir($codigo){
        $this->_prod_repo->delete($codigo);
        echo render('home');
    }

}