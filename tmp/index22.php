<?php
echo '<pre>';
$str = "Hello Friend";
$arr = str_split($str);
print_r($arr);
// var_dump($arr[5]);


foreach($arr as $k => $a){
    for($i = 0; $i < count($arr); $i++){
        echo "'$k = ' $k '$i = ' $i  '$a = ' $a <br>";
        // if($k != $i){

            // if($arr[$k]['chislo'] == $arr[$i]['summa']){
            //    $result[] = "chislo {$k} == summa {$i}";
            // }
        // }
    }
}



?>