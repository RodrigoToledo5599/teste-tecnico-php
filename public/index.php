<?php
session_start();

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/repository/ProdutoRepository.php';
require_once BASE_PATH . '/repository/UserRepository.php';
require_once BASE_PATH . '/models/Database.php';

$database = new Database();

// $database->getConnection();

$prodRepo = new ProdutoRepository($database->getConnection());
// $userRepo = new UserRepository($database);

if (strpos($request, '?') !== false) {
    $request = strstr($request, '?', true);
}

switch ($request) {
    case '/':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $controller->index();
        break;

    case '/home':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $controller->index();
        break;
    
    case '/home-search-by-code':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $controller->filtrarPorCodigo();
        break;

    case '/home-search-by-name':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController($prodRepo);
        $controller->filtrarPorNome();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}