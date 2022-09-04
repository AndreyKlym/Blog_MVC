<?php
namespace MyProject\Controllers;

use MyProject\View\View;

class MainController{

    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function main(){
        $articles = [
            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
            ['name' => 'Статья 3', 'text' => 'Текст статьи 3'],
        ];
        
        $this -> view -> renderHtml('main/main.php', ['articles' => $articles]);
        // include __DIR__ . '/../../../templates/main/main.php';
        // echo 'Главная страница'. '<hr>';
    }


    public function sayHello(string $name){
        $title = 'Страница приветствия';
        $this -> view -> renderHtml('main/hello.php', ['name' => $name, 'title' => $title]);
        // $this -> view -> renderHtml('main/hello.php', ['name' => $name]);
        // echo "Привет,  $name!  <hr>";
    }

    public function sayBay(string $name){
        $title = 'Страница прощания';
        $this -> view -> renderHtml('main/bye.php', ['name' => $name, 'title' => $title]);
        // $this -> view -> renderHtml('main/bye.php', ['name' => $name]);
        // echo "Пока, $name! <br>";
    }

    public function contacts(string $name){
        $title = 'Страница контактов';
        $this -> view -> renderHtml('main/contacts.php', ['name' => $name, 'title' => $title]);
        // $this -> view -> renderHtml('main/contacts, $title.php', ['name' => $name]);
    }

    public function about(string $name){
        $title = 'Страница про нас';
        $this -> view -> renderHtml('main/about.php', ['name' => $name, 'title' => $title]);
    }

}