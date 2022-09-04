<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/abstraktnye-klassy-v-php
// ДЗ   

echo '<pre>';

abstract class Human {
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreeting(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreeting() . '! ' .$this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}


class RussianHuman extends Human{

    public function getGreeting(): string
    {
        return "Привет";
    }

    public function getMyNameIs(): string
    {
        return "Меня зовут";
    }
}
class EnglishHuman extends Human{

    public function getGreeting(): string
    {
        return "Hi";
    }

    public function getMyNameIs(): string
    {
        return "My name is";
    }
}

$russian = new RussianHuman('Иван');
$english = new EnglishHuman('Sam');
echo $russian->introduceYourself();
echo '<br>';
echo $english->introduceYourself();


?>