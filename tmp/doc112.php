<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/obektno-orientirovannyy-podhod-v-yazyke-php

echo '<pre>';

class User{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

class Cat
// class Cat extends User
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Article{
    private $title;
    private $text;
    private $author;

    public function __construct($title, $text, User $author){
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}

$author = new User('Sam');
$author2 = new User('Sam2');
$article = new Article('Resent news', 'There are a lot of news.', $author);

var_dump($article);

echo 'Имя автора: '. $article->getAuthor()->getName() . '<br>';
echo 'Название статьи: '. $article->getTitle() . '<br>';

$author = new User('Nick');
$cat = new Cat('Pushok');
$article = new Article('Заговолок', 'Текст', $author2);
// $article = new Article('Заговолок', 'Текст', $cat);


echo 'Имя автора: '. $article->getAuthor()->getName() . '<br>';
echo 'Название статьи: '. $article->getTitle() . '<br>';


class Admin extends User{

}

$author3 = new Admin('Petro');
$article = new Article('Заговолок', 'Текст', $author3);

echo 'Имя автора: '. $article->getAuthor()->getName() . '<br>';
echo 'Название статьи: '. $article->getTitle() . '<br>';

?>