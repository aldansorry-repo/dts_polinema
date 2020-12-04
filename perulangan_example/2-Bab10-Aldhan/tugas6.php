<?php
    $n = 5;
    $h = 1;
    for ($i=1; $i <=$n ; $i++) { 
        $h = $i;
        for ($j=0; $j <= $i-1; $j++) { 
           if($j==0){
               echo $h;
           }else{
               $h = $h +(10-($n+$j));
               echo $h;
           }
        }
        echo "<br>";
    }

?>