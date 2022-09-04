<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/interfeysy-v-php

echo '<pre>';

// интерфейс - это описание public методов, которые представляют собой только название метода, описание их аргументов и возвращаемый тип. 
interface CalcSquare{
    public function calcSquare(): float;
    // public function getId(): int;
}

// implements - обязывает класс реализовать этот интерфейс CalcSquare
class Rectangle{
// class Rectangle implements CalcSquare{    
    private $x;
    private $y;

    public function __construct(float $x, float $y){
        $this->x = $x;
        $this->y = $y;
    }
    
    public function calcSquare(): float {
        return $this->x * $this->y;
    }
}

// class Square{
class Square implements CalcSquare{
    private $x;

    public function __construct(float $x){
        $this->x = $x;
    }
    
    public function calcSquare(): float {
        return $this->x **2;
    }
}

// class Circle{
class Circle implements CalcSquare{
    const PI = 3.1416;
    private $r;

    public function __construct(float $r){
        $this->r = $r;
    }
    
    public function calcSquare(): float {
        // $pi = 3.1416;
        return ($this->r **2) * self::PI;
        // return ($this->r **2) * $pi;
        // self::PI  - для обращения в этом классе
    }
}

// Circle::PI  - для обращения в любом другом классе




$circle1 = new Circle(2.5);
// var_dump($circle1 instanceof Circle); // bool(true)
// var_dump($circle1 instanceof Rectangle);  // bool(false)
var_dump($circle1 instanceof CalcSquare);  // bool(true)

$objects = [
    new Rectangle(4, 6),
    new Square(5),
    new Circle(4)
];


// get_class — Возвращает имя класса, к которому принадлежит объект
foreach($objects as $object){
    if($object instanceof CalcSquare) {
        echo 'Обьект реализует интерфейс CalcSquare. Площадь: ' . $object->calcSquare() . '<br>';
        echo get_class($object) . '<br>';
        // Rectangle  // Square  // Circle
    } else {
        echo "Объект класса - " . get_class($object) . " не реализует интерфейс CalculateSquare. <br>" ;
    }
}




?>