<?php 

$num1 = 0;
$num2 = 1;

echo "1, ";
while(true){
    if($num2 > 200){
        break;
    }
    $num3 = $num1+$num2;
    echo $num3.", ";
    $num1 = $num2;
    $num2 = $num3;
    
}

?>