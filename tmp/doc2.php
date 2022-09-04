<?php
	$user = 1;
	
	$test = $user; // в переменной $test теперь 1
	$test = 2;     // в переменной $test теперь 2, а в $user - по-прежнему 1 

    var_dump($user);
    echo '<br>';
    var_dump($test);
    echo '<br>';


    class User
	{
		public $name;
		public $age;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age  = $age;
		}
	}



	$user = new User('john', 30);
	
	$name = $user->name; // запишем в переменную $name текст 'john' 
    echo $name;
    echo '<br>';
	$name = 'eric'; // поменяли переменную $name, но $user->name не поменялось 
    echo $name;
	echo '<hr>';
    
	// Проверим - выведем свойство name из переменной $user:
	echo $user->name; // выведет 'john'
    echo '<br>';
    echo $name;


?>