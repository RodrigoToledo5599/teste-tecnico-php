<?php 

require_once '../public/render.php';



class UserController{

    public $_user_repo;
    
    public function __construct($user_repo){
        $this->_user_repo = $user_repo;
    }


    public function login(){
        echo render('login');
    }

    public function logar(){
        
    }

    public function index(){
        echo render('cadastro-usuario');
    }

    public function cadastrar($nome, $email, $password){
        

    }




}