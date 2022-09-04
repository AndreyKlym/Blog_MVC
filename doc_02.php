<?php
echo '<pre>';

$pattern = '/век/';
$string = 'человек';

preg_match($pattern, $string, $matches);

var_dump($matches);