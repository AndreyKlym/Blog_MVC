<?php
echo '<pre>';
// $array1 = array("a" => "green", "b" => "yellow", "c" => "blue", "red");
// $array2 = array("a" => "green", "c" => "yellow", "blue", "red");
// // $result_array = array_intersect_assoc($array1, $array2);
// $result = array_diff($array1, $array2);
// print_r($result);




$array1 = array("a" => "green", "red", "blue");
$array2 = array("b" => "green", "yellow", "red");
$result = array_intersect($array1, $array2);
print_r($result);


foreach ($array1 as $array1_perm) {
    foreach ($array2 as $key => $value ) {
        echo $array1_perm. '<br>';
        echo $key.'=>'. $value. '<br>';
    //     if (array_diff_assoc($all_perm, $role_perm)) {
    //         $all_perm['check'] = 1; 
    //     }
    }
}
echo '<br>';
$result_str = 'abcdef';
$result_str = substr($result_str, 0, -1); 
echo $result_str;



?>
