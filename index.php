<?php
require_once 'controllers/Controller.php';
require_once 'config/database.php';

$url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];

$controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'AuthController';
$method = $url[1] ?? 'register';
$params = array_slice($url, 2);

$controllerFile = "controllers/$controllerName.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        echo "⚠️ Method '$method' tidak ditemukan di $controllerName.";
    }
} else {
    echo "⚠️ Controller '$controllerName' tidak ditemukan.";
}
?>
