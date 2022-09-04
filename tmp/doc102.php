<?php
echo '<pre>';

class Cat
{
    private $name;
    private $color;
    // public $weight;

    public function __construct(string $name, string $color){
        $this->name=$name;
        $this->color=$color;
    }

    public function sayHello(){
        echo "Hello, my name is $this->name\n";
        // echo '<br>';
        echo "My color is $this->color";
    }

    public function setName(string $name){
        $this->name = $name;
    }
    public function setColor(string $color){
        $this->color = $color;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getColor(): string{
        return $this->color;
    }
}

// $cat1 = new Cat();
$cat1 = new Cat('Tom', 'black');
$cat2 = new Cat('John', 'white');

// $cat1->color = 'black';
// $cat2->color = 'white';
echo '<br>';
echo $cat1->sayHello();
echo '<br>';
echo $cat2->sayHello();
echo '<br>';
echo '<br>';
echo $cat1->getName();
echo '<br>';
echo $cat1->getColor();
echo '<br>';
echo $cat2->getName();
echo '<br>';
echo $cat2->getColor();
echo '<br>';
$cat1->setColor('Red');
$cat2->setColor('Blue');
echo '<br>';

$cat3 = new Cat('Снежок', 'white');
$cat4 = new Cat('Барсик', 'braun');

echo $cat3->sayHello();
echo '<br>';
echo $cat4->sayHello();
echo '<br>';

var_dump($cat1);
var_dump($cat2);
var_dump($cat3);
var_dump($cat4);

?>