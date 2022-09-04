<?php
echo '<pre>';
class Product{
    public $name;
    public $price;

    public function __construct($name, $price)
		{
			$this->name = $name;
			$this->price  = $price;
		}
}

$product1 = new Product('apple', 20);
var_dump ($product1);


$product2 = $product1;
var_dump ($product2);

$product2 ->name = "bread";
$product2 ->price = 10;

var_dump ($product1);
var_dump ($product2);

$product3 = new Product('milk', 25);
var_dump ($product3);

echo $product3->name;
echo '<br>';
echo $product3->price;


?>