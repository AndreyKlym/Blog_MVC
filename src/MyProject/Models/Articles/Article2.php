<?php

namespace MyProject\Models\Articles;

// пространство имён – неймспейс – класс можно поместить в отдельное именованное пространство и в дальнейшем использовать его по этому полному имени:
// use MyProject\Models\Users\User;
use MyProject\Models\ActiveRecordEntity;
// use MyProject\Services\Db;

class Article extends ActiveRecordEntity{
// class Article{
    
    // /** @var int */
    // private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $text;

    /** @var int */
    private $authorId;

    /** @var string */
    private $createdAt;

    // public function __set($name, $value)
    // {
    //     // echo 'Пытаюсь задать для свойства ' . $name . ' значения ' . $value . '<br>';
    //     $camelCaseName = $this->undercsoreToCamelCase($name);
    //     $this -> $camelCaseName = $value;
    //     // $this -> $name = $value;
    // }

    // /**
    //  * @return int
    //  */
    // public function getId(): int {
    //     return $this -> id;
    // }

    /**
     * @return string
     */
    public function getName(): string {
        return $this -> name;
    }
    
    /**
     * @return string
     */
    public function getText(): string {
        return $this -> text;
    }

    // /**
    //  * @return Article[]
    //  */
    // public static function findAll(): array {
    //     $db = new Db();
    //     return $db -> query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    //     // return $db -> query('SELECT * FROM `articles`;', [], Article::class);
    // }

    private static function getTableNme():string{
        return 'articles';
    }

    // private function undercsoreToCamelCase(string $source): string{
    //     return lcfirst(str_replace('_', '', ucwords($source, '_')));
    // }
}

