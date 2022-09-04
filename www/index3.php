<?php
echo '<pre>';
// Этот кусок кода называется фронт-контроллером.

// require __DIR__ . '/../src\MyProject\Models\Users\Users.php';
// require __DIR__ . '/../src\MyProject\Models\Articles\Article.php';

// function myAutoLoader(string $className){
spl_autoload_register(function (string $className){
    var_dump($className);
    // require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    require_once __DIR__ . '/../src/' . $className . '.php';
}
);

// spl_autoload_register('myAutoLoader');



$author = new \MyProject\Models\Users\User('Иван');
// $author = new User('Иван');
$article = new \MyProject\Models\Articles\Article('Заголовок', 'Текст', $author);
// $article = new Article('Заголовок', 'Текст', $author);

$controller = new \MyProject\Controllers\MainController();

if(!empty ($_GET['name'])) {
    $controller->sayHello($_GET['name']);
} else {
    $controller->main();
}

// $controller -> main();


var_dump($author);
var_dump($article);
var_dump($controller);