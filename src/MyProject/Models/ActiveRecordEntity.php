<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{

    // добавили protected-свойство ->id и public-геттер для него – у всех наших сущностей будет id,
    /** @var int */
    protected $id;
    // private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    public function __set(string $name, $value)
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
        $db = Db::getInstance();
        // $db = new Db();
        return $db -> query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
        // return $db -> query('SELECT * FROM `articles`;', [], Article::class);
    }



    /**
     * @param int $id
     * @return static|null
     */
    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        // $db = new Db();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
    // метод будет возвращать одну статью по id - вернёт либо один объект, если он найдётся в базе, либо null – что будет говорить об его отсутствии.

    
    // объявили абстрактный protected static метод getTableName(), который должен вернуть строку – имя таблицы. Так как метод абстрактный, то все сущности, которые будут наследоваться от этого класса, должны будут его реализовать.
    abstract protected static function getTableName(): string;

    // выведем массив, полученный с помощью этого метода в методе save()
    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        // var_dump($mappedProperties);
        if($this->id !== null){
            $this->update($mappedProperties);
        }else{
            $this->insert($mappedProperties);
        }
    }

    private function update(array $mappedProperties): void
    {
        //здесь мы обновляем существующую запись в базе
        $columns2params = [];
        $params2values = [];
        $index = 2;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index; // :param1
            $columns2params[] = $column . ' = ' . $param; // column1 = :param1
            $params2values[$param] = $value; // [:param1 => value1]
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstance();
        $db-> query($sql, $params2values, static::class);
        // var_dump($columns2params);
        // var_dump($sql);
        // var_dump($params2values);
    }

    private function insert(array $mappedProperties): void
    {
        //здесь мы создаём новую запись в базе
    }

    // напишем метод, который прочитает все свойства объекта и создаст массив вида   'название_свойства1' => значение свойства1,
    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
    
        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }
        // получили все свойства, и затем каждое имяСвойства привели к имя_свойства. После чего в массив $mappedProperties мы стали добавлять элементы с ключами «имя_свойства» и со значениями этих свойств
    
        return $mappedProperties;
    }
    
    // метод будет преобразовывать строки типа authorId в author_id
    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

}