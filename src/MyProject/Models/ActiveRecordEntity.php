<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{

    // добавили protected-свойство ->id и public-геттер для него – у всех наших сущностей будет id,
    /** @var int */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    public function __set($name, $value)
    {
        // echo 'Пытаюсь задать для свойства ' . $name . ' значения ' . $value . '<br>';
        $camelCaseName = $this->undercsoreToCamelCase($name);
        $this -> $camelCaseName = $value;
        // $this -> $name = $value;
    }

    // перенесли метод underscoreToCamelCase(), так как он используется внутри метода __set()
    private function undercsoreToCamelCase(string $source): string{
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**
     * @return Static[]
     */
    // public-метод findAll() будет доступен во всех классах-наследниках
    public static function findAll(): array {
        $db = new Db();
        return $db -> query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
        // return $db -> query('SELECT * FROM `articles`;', [], Article::class);
    }

    // объявили абстрактный protected static метод getTableName(), который должен вернуть строку – имя таблицы. Так как метод абстрактный, то все сущности, которые будут наследоваться от этого класса, должны будут его реализовать.
    abstract protected static function getTableName(): string;


    /**
     * @param int $id
     * @return static|null
     */
    public static function getById(int $id): ?self
    {
        $db = new Db();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
    // метод будет возвращать одну статью по id - вернёт либо один объект, если он найдётся в базе, либо null – что будет говорить об его отсутствии.

}