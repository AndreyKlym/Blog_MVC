<?php
echo '<pre>';

$re = '/Меняем автора статьи ([0-9]+) c "(.+)" на "(.+)"./m';
$str = 'Меняем автора статьи 123 c "Иван" на "Пётр".';

preg_match($re, $str, $matches);

// Print the entire match result
var_dump($matches);


$post_id = $matches[1];
$old_name = $matches[2];
$new_name = $matches[3];

echo '<br>';
echo 'not ' . $old_name .' write article #' . $post_id . ' but '. $new_name;
echo '<br>';

// (?P<имя_маски>содержимое)

$route = '/post/892';

// $route_scr = '~/\/(?P<controler>(.+))\/(?P<id>([0-9]+))~';
$route_scr = '~/(.*)/([0-9]+)~';

// $pattern = '~^hello/(.*)$~';


// $route_scr = "/https://php.zone/(.+)/([0-9]+)/m";
// $route_scr = "'/". $route . '/m';
echo $route;
echo '<br>';
echo $route_scr;
echo '<br>';

preg_match($route_scr, $route, $matches2);
// preg_match($re_scr, $route, $matches);
var_dump($matches2);
$controler = $matches2[1];
$id = $matches2[2];

echo $controler;
echo '<br>';
echo $id;




