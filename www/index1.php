<?php
echo '<pre>';

// require __DIR__ . '/../src\MyProject\Models\Users\Users.php';
// require __DIR__ . '/../src\MyProject\Models\Articles\Article.php';

// function myAutoLoader(string $className){
spl_autoload_register(function (string $className){
    var_dump($className);
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    // require_once__DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
}
);

// spl_autoload_register('myAutoLoader');



$author = new \MyProject\Models\Users\User('Иван');
$author2 = new \MyProject\Models\Users\User('Иван2');
// $author = new User('Иван');
$article = new \MyProject\Models\Articles\Article('Заголовок', 'Текст', $author);
// $article = new Article('Заголовок', 'Текст', $author);

var_dump($author);
var_dump($author2);
var_dump($article);