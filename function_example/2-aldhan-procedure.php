<?php 
function operasi($operator,$nilai1,$nilai2)
{
    switch($operator){
        case "tambah":
        echo $nilai1." + ".$nilai2." = ".($nilai1+$nilai2);
        break;
        case "kurang":
        echo $nilai1." - ".$nilai2." = ".($nilai1-$nilai2);
        break;
        case "kali":
        echo $nilai1." x ".$nilai2." = ".($nilai1*$nilai2);
        break;
        case "bagi":
        echo $nilai1." : ".$nilai2." = ".($nilai1/$nilai2);
        break;
        

    }
}

echo operasi('kali',6,10);
?>