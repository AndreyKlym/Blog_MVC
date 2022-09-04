<?php

namespace MyProject\Models\Articles;

// пространство имён – неймспейс – класс можно поместить в отдельное именованное пространство и в дальнейшем использовать его по этому полному имени:
use MyProject\Models\Users\User;

class Article{
    private $title;
    private $text;
    private $author;

    // public function __construct($title, $text, User $author){
    // или если не указано    use MyProject\Models\Users\User;  (5)
    public function __construct($title, $text, \MyProject\Models\Users\User $author){
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    // public function getAuthor(): User
    // или если не указано    use MyProject\Models\Users\User;  (5)
    public function getAuthor(): \MyProject\Models\Users\User
    {
        return $this->author;
    }
}

