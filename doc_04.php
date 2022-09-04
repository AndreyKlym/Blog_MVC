<?php
echo '<pre>';

$regularExp = '/\/(?P<controller>.+)\/(?P<id>[0-9]+)/';
$url = '/post/892';
preg_match($regularExp, $url, $matches);
var_dump($matches);
$controller = $matches['controller'];
$id = $matches['id'];
echo $controler;
echo '<br>';
echo $id;