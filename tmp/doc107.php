<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/abstraktnye-klassy-v-php

echo '<pre>';

abstract class AbsClass {

    abstract public function getValue();

    public function printValue(){
        echo "Значение: " . $this->getValue();
    }
    
}

// $object = new AbsClass();
// Fatal error:  Uncaught Error: Cannot instantiate abstract class AbsClas

class ClassA extends AbsClass{
    private $value;

    public function __construct(string $value) {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
    
}

$objectA = new ClassA('kek');
$objectA -> printValue();

?>