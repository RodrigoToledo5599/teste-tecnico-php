<?php 

require_once '../public/render.php';



class UserController{

    public function index(){
        echo render('cadastro-usuario');
    }

    public function cadastrar($nome, $email, $password){
        

    }


}