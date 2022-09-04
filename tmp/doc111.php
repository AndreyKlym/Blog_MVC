<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/staticheskie-svoystva-i-metody-v-php


echo '<pre>';

class Human {
    private static $count = 0;

    public function __construct()
    {
        self :: $count++;
    }

    public static function getCount(){
        return self::$count;
        // return $this -> count;
    }
}

echo 'Людей уже '. Human::getCount(). '<br>';
$human1 = new Human();
$human2 = new Human();
$human3 = new Human();
echo 'Людей уже '. Human::getCount(). '<br>';

?>