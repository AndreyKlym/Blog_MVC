<?php

//рекурсия - вывод от 0 до заданого числа через запятую

function getRecurs($x){
    if($x == 0){
        return 0;
    }

    $x = getRecurs($x -1) . ', ' . $x;
    return $x;
}

echo getRecurs(5);


