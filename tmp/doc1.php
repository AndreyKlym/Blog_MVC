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
	
	$test = $user; // и $test, и $user ссылаются на один и тот же объект 
	$test->name = 'eric'; // поменяли переменную $test - но $user также поменялась!
	
	// Проверим - выведем свойство name из переменной $user:
	echo $user->name; // выведет 'eric'!
    echo '<br>';
	echo $test->name; // выведет 'eric'!
?>