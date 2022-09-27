<?php
namespace MyProject\Controllers;

// use MyProject\Services\Db;
use MyProject\Models\Articles\Article;
use MyProject\View\View;

class ArticlesController{

    /** @var View */
    private $view;

    // /** @var Db */
    // private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        // $this->db = new Db();
    }

    public function view(int $articleId): void {
    // public function view(int $articleId){
        // $result = $this -> db -> query(
        //     'SELECT * FROM articles INNER JOIN users ON articles.author_id = users.id WHERE articles.id = :id; ',
        //     // 'SELECT * FROM `articles` WHERE id = :id; ',
        //     [':id' => $articleId]
        // );
        // echo 'Здесь будет получение статьи и рендеринг шаблона' . '<hr>';
        // var_dump($result);

        $article = Article::getById($articleId);
        // $article = Article::getById($articleId)


        if ($article === null) {
        // if($result === []) {
            // в случае ошибки
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        // $this -> view -> renderHtml('articles/view.php', ['article' => $result[0]]);

        // $articleAuthor = User::getById($article->getAuthorId());

        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }
        
    public function edit(int $articleId): void {
        /** @var Article $article */
        $article = Article::getById($articleId);

        if($article === null){
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        var_dump($article);
    }

}