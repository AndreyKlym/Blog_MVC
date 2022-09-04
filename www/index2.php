<?php
echo '<pre>';

use \MyProject\Models\Users\User;
use \MyProject\Models\Articles\Article;

// require __DIR__ . '/../src\MyProject\Models\Users\Users.php';
// require __DIR__ . '/../src\MyProject\Models\Articles\Article.php';

// function myAutoLoader(string $className){
spl_autoload_register(static function (string $class){
    // var_dump($className);
    var_dump($class);
    $class = str_replace('\\', '/', $class);
    var_dump($class);
    $file =  __DIR__ . '/../src/' .  $class. '.php';
    var_dump($file);
    // require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    // require_once__DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    if(file_exists($file)){
        echo 'file exist!' . $file . '<br>';
        echo '<hr>';
        require_once $file;
    }

}
);

// spl_autoload_register('myAutoLoader');



$author = new \MyProject\Models\Users\User('Иван');
// $author = new User('Иван');
$article = new \MyProject\Models\Articles\Article('Заголовок', 'Текст', $author);
// $article = new Article('Заголовок', 'Текст', $author);

var_dump($author);
var_dump($article);