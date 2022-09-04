<?php
echo '<pre>';

// https://php.zone/oop-v-php-prodvinutyj-kurs/front-kontroller-i-routing-v-php

// Этот кусок кода называется фронт-контроллером.

// require __DIR__ . '/../src\MyProject\Models\Users\Users.php';
// require __DIR__ . '/../src\MyProject\Models\Articles\Article.php';

// function myAutoLoader(string $className){
spl_autoload_register(function (string $className){
    // var_dump($className);   // MyProject\Controllers\MainController
    // require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    require_once __DIR__ . '/../src/' . $className . '.php';
}
);

// spl_autoload_register('myAutoLoader');

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

// unset($matches[0]);

var_dump($controllerAndAction);
echo '<hr>';
var_dump($matches);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];
$userName = $matches[1];

echo '<hr>';
var_dump($controllerName);
var_dump($actionName);

$controller = new $controllerName();
// $controller->$actionName($userName);
$controller->$actionName(...$matches);

// method(...$array) он передаст элементы массива в качестве аргументов методу в том порядке, в котором они находятся в массиве.

// $controller->$actionName($userName);
// !!!!!!  - без $userName не работает -  !!!!!!


// echo $route. '<hr>';

// $pattern = '~^hello/(.*)$~';

// preg_match($pattern, $route, $matches);

// if(!empty($matches)){
//     $controller = new \MyProject\Controllers\MainController();
//     $controller->sayHello($matches[1]);
//     return;
// }

// $pattern = '~^$~';

// preg_match($pattern, $route, $matches);

// if(!empty($matches)){
//     $controller = new \MyProject\Controllers\MainController();
//     $controller->main();
//     return;
// }

// var_dump($_GET['route']);
// var_dump($matches);
// echo 'Страница не найдена!';