<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/staticheskie-svoystva-i-metody-v-php


echo '<pre>';

class A {
    public static function test(int $x)
    {
        return 'X = ' . $x;
    }
}

// echo A::test(5);
// echo '<br>';
// echo A::test(33);


class User {
    private $role;
    private $name;
    public function __construct($role, $name)
    {
        $this->role = $role;
        $this->name = $name;
    }

    public static function creatAdmin($name){
        return new self('admin', $name);
    }
}

// создать администратора без статичестких методов
// $admin = new User ('admin', 'Sam');

// создать администратора с статичестким методом (role - 'admin' уже задана) 
$admin = User ::creatAdmin('Nick');

var_dump($admin);

?>