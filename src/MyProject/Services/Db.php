<?php

namespace MyProject\Services;

class Db
{
    // добавим классу статическое свойство $instancesCount, по умолчанию равное нулю.
    // private static $instancesCount = 0;

    // создадим в классе Db статическое свойство $instance, в котором будет храниться созданный объект
    private static $instance;
    
    /** @var \PDO */
    private $pdo;

    public function __construct()
    {
        // добавим классу статическое свойство $instancesCount, по умолчанию равное нулю.
        // self::$instancesCount++;

        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];

        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    // добавим публичный статический метод, который будет возвращать значение этого счётчика
    // public static function getInstancesCount(): int
    // {
    //     return self::$instancesCount;
    // }



    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    // public function query(string $sql, $params = []): ? array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
        // return $sth->fetchAll();
    }


    // добавим специальный статический метод, который будет делать следующее:
    // - проверять, что свойство $instance не равно null
    // - если оно равно null, будет создан новый объект класса Db, а затем помещён в это свойство
    public static function getInstance(): self 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // получаем id последней вставленной записи в базе (в рамках текущей сессии работы с БД) через метод lastInsertId()
    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }
    
}