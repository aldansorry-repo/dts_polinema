<?php 

$n = 100;

$hasil = 0;
for($i = 1 ; $i <= $n ; $i++){
    if(($i) % 2 == 0){
        $hasil += 1;
        echo $i."+1";
    }else{
        $hasil -= 1;
        echo $i."-1";
    }
    echo "/";
}

?>