<?php
$controllers = [
    'BiographyController',
    'ContactController',
    'EducationController',
    'IndexController',
    'InterestsController',
    'PhotoController',
    'TestController',
    'TutctucController'
];

foreach ($controllers as $controller) {
    require_once __DIR__ . "/Controller/{$controller}.php";
}

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
