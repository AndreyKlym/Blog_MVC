<?php
echo '<pre>';

class Cat
{
    private $name;
    public $color;
    public $weight;

    public function sayHello(){
        echo 'Mjay';
    }
    public function sayHelloMe($name){
        echo "Hello, $name";
    }
    public function say_Hello(){
        echo "Hello, $this->name";
    }

    public function setName(string $name){
        $this->name = $name;
    }
    public function getName(){
    // public function getName(): string{
        return $this->name;
    }
}

$cat1 = new Cat();
$cat2 = new Cat();

// print_r($cat1);
var_dump($cat1);

// $cat1->name = 'Снежок';
$cat1->setName("Barsik");
echo '<hr>';
echo $cat1->getName();
echo '<hr>';
$cat1->color = 'white';
$cat1->weight = 3.5;
echo '<br>';
echo '<br>';
$cat1->sayHello();
echo '<br>';
$cat1->sayHelloMe('Dick');
echo '<br>';
$cat1->say_Hello();
echo '<br>';
echo '<br>';

// $cat2->name = 'Nick';
$cat2->setName('Tom');
$cat2->color = 'black';
$cat2->weight = 3.0;
echo '<hr>';
$cat2->sayHello();
echo '<br>';
$cat2->say_Hello();
echo '<hr>';

var_dump($cat1);
var_dump($cat2);
// echo $cat1->name;
echo '<br>';
$cat1->sayHello();
echo '<br>';
// echo $cat2->name;
echo '<br>';
$cat2->sayHello();
echo '<br>';



// получить список методов в классе 'Cat'

// $class_methods = get_class_methods('Cat');
// или
$class_methods = get_class_methods(new Cat());

foreach ($class_methods as $method_name) {
    echo "$method_name\n";
}


var_dump(method_exists('Cat','sayHello'));

// Через созданный объект класса вы можете получить его имя:

echo get_class($cat1);
echo '<hr>';
print_r(get_class_vars('Cat'));

?>