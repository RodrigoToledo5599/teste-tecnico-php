<?php
session_start();

$request = $_SERVER['REQUEST_URI'];

define('BASE_PATH', dirname(__DIR__));
// Remove query string for clean routing
if (strpos($request, '?') !== false) {
    $request = strstr($request, '?', true);
}

// Routing logic
switch ($request) {
    case '/':
        require_once BASE_PATH . '/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

        case '/ff':
            require_once BASE_PATH . '/controllers/HomeController.php';
            $controller = new HomeController();
            $controller->indexos();
            break;

    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}