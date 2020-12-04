<?php 

$tabungan = 5000000;
$bunga = 0.1;
$final = 8;

echo "awal : ".$tabungan."<br>";
for ($i=1; $i <= $final; $i++) {
    $tabungan += $tabungan*$bunga; 
    echo "tahun ke ".$i." : ".$tabungan."<br>";
}


?>