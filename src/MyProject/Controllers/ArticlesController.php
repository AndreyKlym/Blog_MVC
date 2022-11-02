<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
// неймспейс для модели User

use MyProject\View\View;
use MyProject\Models\Users\UsersAuthService;

class ArticlesController extends AbstractController
//class ArticlesController
{

    //    // !!!!!!!   перенесли в AbstractController
    //    /** @var View */
    //    private $view;
    //
    //    /** @var User|null*/
    //    private $user;

    //    // !!!!!!!   перенесли в AbstractController
//        public function __construct()
//        {
//            $this->user = UsersAuthService::getUserByToken();
//            $this->view = new View(__DIR__ . '/../../../templates');
//            $this->view->setVar('user', $this->user);
//        }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            // $this->view->renderHtml('errors/404.php', [], 404);
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }


    public function edit(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
//            $this->view->renderHtml('errors/404.php', [], 404);
//            return;
            throw new NotFoundException();
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();

        // var_dump($article);
    }



    public function add(): void
    {

//         //   удалили старый шаблон для нового
//        $author = User::getById(2);
//
//        $article = new Article();
//        $article->setAuthor($author);
//
//        $article->setName('Новая статья');
//        $article->setText('Новый текст для новой статьи');
//        // $article->setCreatedAt(date("Y-m-d H:i:s"));
//
//        $article->save();
//        var_dump($article);
//
//        $article->delete();


        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /www/articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
    }


    public function create(): void
    {
        $article = new Article();

        $article->setName('Новая статья');
        $article->setText('Новый текст');
        $article->setAuthorId(2);
        $article->setCreatedAt(date("Y-m-d H:i:s"));

        $article->save();
        var_dump($article);
    }


    public function delete(int $id): void
        // public function delete(int $articleId): void
    {
        /** @var Article $article */
        $article = Article::getById($id);
        // $article = Article::getById($articleId);

        if ($article) {
            $article->delete();
            echo "Страница #$id удалена";
        }else{
            echo "Страница #$id не найдена";
        }
    }




}