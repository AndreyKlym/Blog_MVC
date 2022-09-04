<?php
echo '<pre>';

// https://php.zone/oop-v-php-prodvinutyj-kurs/front-kontroller-i-routing-v-php

// Этот кусок кода называется фронт-контроллером.


spl_autoload_register(function (string $className){
    require_once __DIR__ . '/../src/' . $className . '.php';
}
);

$route = $_GET['route'] ?? '';

$routes = require __DIR__ . '/../src/routes.php';

// var_dump($routes);

$isRouteFound = false;
foreach($routes as $pattern => $controllerAndAction){
    preg_match($pattern, $route, $matches);    
    if(!empty($matches)){
        $isRouteFound = true;
        break;
    }
}


if(!$isRouteFound){
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

var_dump($controllerAndAction);
echo '<hr>';
var_dump($matches);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];
$userName = $matches[1]; // для $controller->$actionName($userName);

echo '<hr>';
var_dump($controllerName);
var_dump($actionName);
echo '<hr>';
echo '<hr>';

$controller = new $controllerName();
// $controller->$actionName($userName);
$controller->$actionName(...$matches);

// var_dump(\MyProject\Services\Db::getInstancesCount());