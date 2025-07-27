<?php
require_once './Controller/BiographyController.php';
require_once './Controller/ContactController.php';
require_once './Controller/EducationController.php';
require_once './Controller/IndexController.php';
require_once './Controller/InterestsController.php';
require_once './Controller/PhotoController.php';
require_once './Controller/TestController.php';
require_once './Controller/TutctucController.php';

$page = $_GET['page'] ?? 'index';

$page = trim($page, '/');

if ($page === '') {
    $page = 'index';
}

$routes = [
    'index'      => ['controller' => 'IndexController', 'method' => 'index'],
    'biography'  => ['controller' => 'BiographyController', 'method' => 'index'],
    'contact'    => ['controller' => 'ContactController', 'method' => 'index'],
    'education'  => ['controller' => 'EducationController', 'method' => 'index'],
    'interests'  => ['controller' => 'InterestsController', 'method' => 'show'],
    'photo'      => ['controller' => 'PhotoController', 'method' => 'show'],
    'test'       => ['controller' => 'TestController', 'method' => 'index'],
    'tutctuc'    => ['controller' => 'TutctucController', 'method' => 'index']
];

if (!isset($routes[$page])) {
    header("HTTP/1.0 404 Not Found");
    echo "Страница не найдена";
    exit;
}

$route = $routes[$page];
$controllerName = $route['controller'];
$method = $route['method'];

$controller = new $controllerName();
$controller->$method();
