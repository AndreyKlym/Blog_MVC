<?php
// lesson
// https://code.mu/ru/php/book/oop/passing-objects-by-parameter/

echo '<pre>';
class Employee
{
    private $name;
    private $salary;
    
    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getSalary()
    {
        return $this->salary;
    }
}


class EmployeesCollection
{
    private $employees = [];

    // Получаем всех работников в виде массива:
		public function get()
		{
			return $this->employees;
		}

    // Подсчитываем количество хранимых работников:
		public function count()
		{
			return count($this->employees);
		}
    
    public function add($employee)
    {
        $this->employees[] = $employee;
    }
    
    // Находим суммарную зарплату:
    public function getTotalSalary()
    {
        $sum = 0;
        
        // Перебираем работников циклом:
        foreach ($this->employees as $employee) {
            // echo $sum;
            // echo '<br>';
            $sum += $employee->getSalary(); // получаем з/п работника через метод getSalary()
        }
        return $sum;
    }
}



$employeesCollection = new EmployeesCollection;
	
$employeesCollection->add(new Employee('john', 100));
$employeesCollection->add(new Employee('eric', 200));
$employeesCollection->add(new Employee('kyle', 300));

echo $employeesCollection->getTotalSalary(); // выведет 600
echo '<br>';
echo $employeesCollection->get(); 
// var_dump( $employeesCollection->get()); 
echo '<br>';
echo $employeesCollection->count(); 


$user1 = new Employee('Jack', 300);
$user2 = new Employee('Nick', 320);



echo '<br>';
// var_dump($employeesCollection);
// var_dump($user1);
// var_dump($user2);



// echo $user1->getName();
// echo ' = ';
// echo $user1->getSalary();
// echo '<br>';
// echo $user2->getName();
// echo ' = ';
// echo $user2->getSalary();
// echo '<br>';


?>