<?php
session_start();

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/repository/ProdutoRepository.php';
require_once BASE_PATH . '/repository/UserRepository.php';
// require_once BASE_PATH . '/controllers/';
require_once BASE_PATH . '/models/Database.php';

$database = new Database();

$connection = $database->getConnection();

$prodRepo = new ProdutoRepository($connection);
$userRepo = new UserRepository($connection);

if (strpos($request, '?') !== false) {
    $request = strstr($request, '?', true);
}

switch ($request) {
    case '/':
        require_once BASE_PATH . '/controllers/UserController.php';
        $controller = new UserController($userRepo);
        $controller->login();
        break;

    case '/produto-cadastro':
        require_once BASE_PATH . '/controllers/ProdutoController.php';
        $controller = new UserController($userRepo);
        $controller->index();
        break;  
    
    case '/produto-cadastrar':
        require_once BASE_PATH . '/controllers/ProdutoController.php';
        $controller = new ProdutoController($prodRepo);

        $codigo = $_POST['codigo'] ?? null;
        $nome = $_POST['nome'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $valor = $_POST['valor'] ?? null;
        $quantidade = $_POST['quantidade'] ?? null;
        $status_do_produto = $_POST['status_do_produto'] ?? null;
        
        $controller->cadastrar($codigo, $nome, $descricao, $valor, $quantidade, $status_do_produto);
        break;

    case '/produto-deletar':
        require_once BASE_PATH . '/controllers/ProdutoController.php';
        $controller = new ProdutoController($prodRepo);

        $codigo = $_POST['codigo'] ?? null;
        $controller->excluir($codigo);
        break;
    
    case '/usuario-cadastro':
        require_once BASE_PATH . '/controllers/UserController.php';
        $controller = new UserController($userRepo);
        $controller->index();
        break;
    
    case '/usuario-cadastrar':
        require_once BASE_PATH . '/controllers/UserController.php';
        $controller = new UserController($userRepo);
        $nome = $_POST['nome'] ?? null;
        $password = $_POST['password'] ?? null;
        $email = $_POST['email'] ?? null;
        $controller->cadastrar($nome,$email,$password);
        break;

    case '/home':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $controller->index();
        break;
    
    case '/home-search-by-code':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $code = $_GET['codigo'] ?? null; 
        $controller->filtrarPorCodigo($code);
        break;

    case '/home-search-by-name':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $name = $_GET['name'] ?? null; 
        $controller->filtrarPorNome($name);
        break;
    
    case '/home-ativos':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $controller->filtrarPorAtivos();
        break;
    
    case '/home-inativos':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $controller->filtrarPorInativos();
        break;
    

    
    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}