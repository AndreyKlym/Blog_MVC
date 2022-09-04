<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/polimorfizm-v-php


echo '<pre>';

class A{
    public function sayHello(){
        return 'Hello, I am A';
    }
}

$a = new A();

var_dump($a instanceof A);



class B extends A {
    public function sayHello()
    {
        // return 'Hello, I am B';
        return parent::sayHello(). '. <br>'. 'It was a joke, I am B.';
    }
}


$b = new B();
var_dump($b instanceof B);
var_dump($b instanceof A);
var_dump($a instanceof B);

echo '<hr>';
echo $b->sayHello();

?>