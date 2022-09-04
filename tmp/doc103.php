<?php

// https://php.zone/oop-v-php-prodvinutyj-kurs/nasledovanie-v-php

echo '<pre>';

class Post{
    private $title;
    // protected $title;
    private $text;
    // protected $text;

    public function __construct($title, $text){
        $this->title = $title;
        $this->text = $text;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title): void{
        $this->title = $title;
    }
    public function getText(){
        return $this->text;
    }
    public function setText($text): void{
        $this->text = $text;
    }
}

class Lesson extends Post{
    private $homework;

    public function __construct($title, $text, $homework)
    {
        // $this->title = $title;
        // $this->text = $text;
        parent::__construct($title, $text);
        $this->homework = $homework;
    }

    public function setHomework($homework): void{
        $this->homework = $homework;
    }
    public function getHomework(): string{
        return $this->homework;
    }
    
}

class PaidLesson extends Lesson{
    private $price;

    public function __construct($title, $text, $homework, $price){
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function setPrice($price): void{
        $this->price = $price;
    }
    public function getPrice(): string{
        return $this->price;
    }
}

// заголовок: Урок о наследовании в PHP
// текст: Лол, кек, чебурек
// домашка: Ложитесь спать, утро вечера мудренее
// цена: 99.90

$cena = new PaidLesson('Урок о наследовании в PHP', 'Лол, кек, чебурек', 'Ложитесь спать, утро вечера мудренее', 99.90);
echo "Цена урока: " . $cena->getPrice() . " uah";
echo '<br>';
echo '<hr>';
var_dump($cena);
echo '<hr>';
echo $cena->getPrice();
$cena->setPrice(120.00);
echo '<hr>';
echo $cena->getPrice();


echo '<hr>';

$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');
// echo $lesson->getTitle();
echo "Название урока: ". $lesson->getTitle();
echo '<br>';
echo "Название урока: ". $lesson->getText();
echo '<br>';
echo "Название урока: ". $lesson->getHomework();
echo '<br>';
echo '<br>';
var_dump($lesson);


// $paidLesson = new Lesson('Name', 'My text', 'Home task');
// echo 'Название урока: '. $paidLesson->getTitle();
// echo '<br>';
// echo 'Название урока: '. $paidLesson->getText();
// echo '<br>';
// echo 'Название урока: '. $paidLesson->getHomework();
// echo '<br>';




?>