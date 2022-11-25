<?php

require __DIR__ . '/../vendor/autoload.php';

//echo $checkConect;

//use MyProject\Exceptions\CliException;
//use MyProject\Cli\AbstractCommand;

// Этот файл можно назвать фронт-контроллером для консольных команд, он как index.php в случае с клиент-серверным подходом будет создавать другие объекты и запускать весь процесс

// создает экземпляр нужного класса и передает ему аргументы

try{
    unset($argv[0]);

    // Регистрируем функцию автозагрузки
    // spl_autoload_register(function (string $className) {
    //     require_once __DIR__ . '/../src/' . $className . '.php';
    // });
    //    убрал функции автозагрузки после как композер создал файл с автозагрузкой для библиотек


    // Составляем полное имя класса, добавив нэймспейс
    $className = '\\MyProject\\Cli\\' . array_shift($argv);
    if (!class_exists($className)) {
        throw new \MyProject\Exceptions\CliException('Class "' . $className . '" not found');
    }


    // проверкa на то, что класс, указанный в качестве аргумента, является наследником класса AbstractCommand
    $checkClassAbstract = new  ReflectionClass($className);
//        if(!$checkClassAbstract->isSubclassOf(AbstractCommand::class)){
     if(!$checkClassAbstract->isSubclassOf(MyProject\Cli\AbstractCommand::class)){
        throw new \MyProject\Exceptions\CliException('Class "' . $className . '" is not subclass of AbstractCommand');
    }



    // Подготавливаем список аргументов
    $params = [];
    foreach ($argv as $argument) {
        preg_match('/^-(.+)=(.+)$/', $argument, $matches);
        if (!empty($matches)) {
            $paramName = $matches[1];
            $paramValue = $matches[2];

            $params[$paramName] = $paramValue;
        }
    }

    // Создаём экземпляр класса, передав параметры и вызываем метод execute()
    $class = new $className($params);
    $class->execute();

} catch (\MyProject\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}