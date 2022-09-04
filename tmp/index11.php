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




// $str = 234;
$str = "Hello friend";
if(!is_string($str)){
    echo "Attention! Enter string, please!  <br>";
}
$str = strtolower($str);
$arr = str_split($str);
    echo 'hello friend ='.'<br>';
    print_r($arr);


$result_num = '';
foreach ($arr as $arr_item) {
    foreach ($alfaNum as $key => $value ) {
        if ($arr_item == $key) {
            $result_num = $result_num.$value.',';
        }
    }
}
    // echo $result_num;
$result_num = substr($result_num, 0, -1); 
    echo $result_num;


?>
