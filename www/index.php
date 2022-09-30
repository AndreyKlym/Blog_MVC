<?php
// обработаем наше исключение. Для этого нам требуется поймать исключение уже с типом DbException. Так как ошибка при работе с базой данных – это критичная ошибка, которая наверняка не позволит выполняться программе дальше, нам стоит ловить её на самом низком уровне нашего приложения – во фронт-контроллере.
// Обернем в блок try-catch код фронт-контроллера.
try{
    spl_autoload_register(
        function (string $className){
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
//         echo 'Страница не найдена!';
//         return;
        throw new \MyProject\Exceptions\NotFoundException();
    }

    unset($matches[0]);

    // var_dump($controllerAndAction);
    // echo '<hr>';
    // var_dump($matches);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];
//    $userName = $matches[1]; // для $controller->$actionName($userName);

    // echo '<hr>';
    // var_dump($controllerName);
    // var_dump($actionName);
    // echo '<hr>';
    // echo '<hr>';

    $controller = new $controllerName();
//     $controller->$actionName($userName);
    $controller->$actionName(...$matches);
} catch (\MyProject\Exceptions\DbException $e) {
//     echo $e->getMessage();
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (\MyProject\Exceptions\NotFoundException $e) {
    // echo $e->getMessage();
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('404.php', ['error' => $e->getMessage()], 404 );
}

// var_dump(\MyProject\Services\Db::getInstancesCount());