<?php
    echo '<pre>';

    // get array template leters_to_numbers
$alphachar = array_merge(range('a', 'z'));
    echo 'Alphachar ='.'<br>';
  
$alfaNum = [];
$i = 2;
$count = 0;
$numbLoop = 3;
foreach ($alphachar as $element) {
    switch($i){
        case 7:
            $numbLoop = 4;
            break;       
        case 8:
            $numbLoop = 3;
            break;       
        case 9:
            $numbLoop = 4;
            break;       
    }
    if($count < $numbLoop){
        $j.= $i;
        $count +=1;
    }else{
        $i +=1;
        $j= $i;
        $count = 1;
    }
    $alfaNum[$element] = $j;
}

// add to array template leters_to_numbers spacebar
$alfaNum[' '] = 0;
    echo 'alfaNum = ';
    print_r($alfaNum);



$num_str = "6,666,5,0,5,2,22,555,33,222,9999,66,444,55";
// var_dump($num_str);
$pieces = explode(",", $num_str);
var_dump($pieces);


$result_str = '';
foreach ($pieces as $pieces_item) {
    foreach ($alfaNum as $key => $value ) {
        if ($pieces_item == $value) {
            $result_str = $result_str.$key;
        }
    }
}

echo $result_str;


?>
