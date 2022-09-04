<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/staticheskie-svoystva-i-metody-v-php


echo '<pre>';

class A {
    public static $x;

    public static function getX(){
    // public function getX(){
        return self::$x;
    }
}

A::$x = 54;

var_dump(A::$x);

$a = new A();

var_dump($a::$x);

var_dump($a->getX());



?>