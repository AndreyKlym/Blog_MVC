<?php

// Zadanie Junior PHP
// D:\Zadanie Junior PHP ru

$html = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim neque error voluptates harum laborum quaerat ipsum aut inventore, quasi ut! Possimus voluptatem incidunt, explicabo eaque quam aliquid quis voluptas doloremque!
Blanditiis mollitia numquam deserunt exercitationem ipsum ut explicabo dolores, repellendus adipisci veniam nulla distinctio accusantium recusandae ratione nihil in maxime? Voluptates, illum labore? Nihil unde cum similique corrupti sapiente beatae?
Cumque voluptates accusantium molestiae quis earum tempora exercitationem obcaecati animi ipsam sit soluta, officia, quod, recusandae non id iusto. Sint explicabo, eos quidem id distinctio nam similique nemo ex exercitationem";

$allergens = array("mollitia", "corrupti", "molestiae");

var_dump($html);
echo '<br>';
var_dump($allergens);

$items = explode(" ", $html ); 
// echo '<br>';
// var_dump($items);


function boldWords($html, $allergens) 
// function boldWords(string $html, array $allergens): string 
{ 
  $items = explode(" ", $html ); 
  foreach ($items as $item) { 
//   foreach ($items as &$item) { 
    foreach ($allergens as $allergen) { 
      if ( array_intersect($items, $allergen ) ) { 
    //   if ( substr_count($item , $allergen ) ) { 
        if ( ! preg_match( '#^<b>.+</b>$#', $item ))  
          $item = "<b>{$item}</b>"; 
      } 
    } 
  } 
  return implode( ' ', $items ); 
}

boldWords($html, $allergens);

