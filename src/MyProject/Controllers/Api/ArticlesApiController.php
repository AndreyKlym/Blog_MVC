<?php

namespace MyProject\Controllers\Api;

use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;   // неймспейс для модели User

class ArticlesApiController extends AbstractController
{
    public  function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if($article === null){
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'articles' => [$article]
        ]);
    }

    public function add()
    {
        //    вынесли функционал чтения входных данных в абстрактный контроллер:
        //        $input = json_decode(
        //            file_get_contents('php://input'),
        //            true
        //        );

        // php://input – это входной поток данных,из него мы и будем получать JSON из запроса.
        // file_get_contents – читает данные из указанного места, в нашем случае из входного потока.
        // json_decode декодирует json в структуру массива.

        $input=$this->getInputData();
        //        var_dump($input);

        $articleFromRequest = $input['articles'][0];

        $authorId = $articleFromRequest['author_id'];
        $author = User::getById($authorId);

        $article = Article::createFromArray($articleFromRequest, $author);
        $article->save();

        header('Location: /www/api/articles/' . $article->getId(),true, 302);

    }

}