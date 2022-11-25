<?php

// echo 2 + 2;

// var_dump($argv);

// unset($argv[0]);

// $sum = 0;

// foreach ($argv as $item) {
//     $sum += $item;
// }

// echo $sum;


unset($argv[0]);

$params = [];

foreach ($argv as $argument) {
    preg_match('/^-(.+)=(.+)$/', $argument, $matches);
    if (!empty($matches)) {
        $paramName = $matches[1];
        $paramValue = $matches[2];

        $params[$paramName] = $paramValue;
    }
}

var_dump($params);