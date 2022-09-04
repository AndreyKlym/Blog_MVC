<?php
echo '<pre>';

/**
 * @param $a
 * @param $b
 * @return int
 */
function sum($a, $b)
{
    return $a + $b;
}

// Теперь создадим объект-рефлектор для неё:
$sumReflector = new ReflectionFunction('sum');

// узнать в каком файле объявлена функция:
echo $sumReflector->getFileName();
echo '<br>';

// или узнать строки её начала и конца:
echo $sumReflector->getStartLine();
echo '<br>';
echo $sumReflector->getEndLine();
echo '<br>';

// получить комментарий к функции в формате PHPDoc
echo $sumReflector->getDocComment();
