<?php
// Zadanie 1 (PHP)

$str = $_GET['text'];
$num_str = $_GET['number']; 

// echo $str;
// echo $num_str;

class PhoneKeyboardConverter
{
    public function convertToNumeric($str, $alfaNum)
    {
        if(!is_string($str)){
            echo "!!!Attention! Enter string, please!!!  <br>";
        }
        $str = strtolower($str);
        $arr = str_split($str);
        
        $result_num = '';
        foreach ($arr as $arr_item) {
            foreach ($alfaNum as $key => $value ) {
                if ($arr_item == $key) {
                    $result_num = $result_num.$value.',';
                }
            }
        }
        $result_num = substr($result_num, 0, -1); 
        return $result_num;
    }
    
    public function convertToString($num_str, $alfaNum)
    {
        if(!is_string($num_str)){
            echo "!!!Attention! Enter number, please!!!  <br>";
        }
        $pieces = explode(",", $num_str);

        $result_str = '';
        foreach ($pieces as $pieces_item) {
            foreach ($alfaNum as $key => $value ) {
                if ($pieces_item == $value) {
                    $result_str = $result_str.$key;
                }
            }
        }
        return $result_str;
    }
}




// get array  leters_to_numbers_template
$alphachar = array_merge(range('a', 'z'));   
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


$getValue = new PhoneKeyboardConverter;

// $str = "Hello friend";
// $num_str = "6,666,5,0,5,2,22,555,33,222,9999,66,444,55";

?>

<h1>Zadanie 1 (PHP)</h1>

<img src="telephone-keypad.png" alt="telephone-keypad" style="position: fixed; width: 250px; left: 500px; top: 10px;" srcset="">

<form action="index.php" method="get">
    <div>
        <h2>Type text convert to number code</h3>
        <label for="text">Enter text:</label>    
        <input type="text" name="text" id="text">
    </div>
    <h4>
        <?php
            echo 'Result convert text to number code: ';
            echo $getValue->convertToNumeric($str, $alfaNum);
        ?>
    </h4>
    

    <div>
        <h2>Type number code convert to text</h3>
        <label for="number">Enter number code:</label>   
        <input type="text" name="number" id="number">
    </div>
    <h4>
        <?php
            echo 'Result convert number code to text: ';
            echo  $getValue->convertToString($num_str, $alfaNum);
        ?>
    </h4>

    <div>
        <input type="submit" name="submit" value="Сonvert data">
    </div>
    

</form>
