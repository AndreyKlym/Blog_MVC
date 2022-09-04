<?php
namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
// use MyProject\Services\Db;
use MyProject\View\View;

class MainController{

    /** @var View */
    private $view;

    // /** @var Db */
    // private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        // $this->db = new Db();
    }

    public function main(){
        // $articles = $this->db->query('SELECT * FROM articles INNER JOIN users ON articles.author_id = users.id;');
        // $articles = $this->db->query('SELECT * FROM `articles`;', [], Article::class);
        // $articles = $this->db->query('SELECT * FROM `articles`;');
        $articles = Article::findAll();
        // var_dump($articles);
        // return;
        $this -> view -> renderHtml('main/main.php', ['articles' => $articles]);
        
        // $this -> view -> renderHtml('main/main.php', ['articles' => $articles]);
        // include __DIR__ . '/../../../templates/main/main.php';
        // echo 'Главная страница'. '<hr>';
    }


    // public function sayHello(string $name){
    //     $title = 'Страница приветствия';
    //     $this -> view -> renderHtml('main/hello.php', ['name' => $name, 'title' => $title]);
    //     // $this -> view -> renderHtml('main/hello.php', ['name' => $name]);
    //     // echo "Привет,  $name!  <hr>";
    // }

    // public function sayBay(string $name){
    //     $title = 'Страница прощания';
    //     $this -> view -> renderHtml('main/bye.php', ['name' => $name, 'title' => $title]);
    //     // $this -> view -> renderHtml('main/bye.php', ['name' => $name]);
    //     // echo "Пока, $name! <br>";
    // }

    // public function contacts(string $name){
    //     $title = 'Страница контактов';
    //     $this -> view -> renderHtml('main/contacts.php', ['name' => $name, 'title' => $title]);
    //     // $this -> view -> renderHtml('main/contacts, $title.php', ['name' => $name]);
    // }

    // public function about(string $name){
    //     $title = 'Страница про нас';
    //     $this -> view -> renderHtml('main/about.php', ['name' => $name, 'title' => $title]);
    // }

}