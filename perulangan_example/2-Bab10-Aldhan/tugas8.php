<?php 

$ni = 2;
for($i = 0; $i < 5; $i++){
    for($j = 5; $j > $i; $j--){
        echo $ni ;
        $ni += 2;
    }
    $ni = 2;
    echo "<br>";
    for($j = 5; $j > $i; $j--){
        echo $ni ;
        $ni += 2;
    }
    $ni = 2;
    echo "<br>";
}
